<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Band;
use App\User;
use App\Report;
use App\Ban;
use App\City;
use App\Genre;
use App\Content;
use App\Concert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class BandController extends Controller
{

    public function listBannedBands()
    {   

        $bans = Band::join('ban','band.id','=','ban.bandid')->where('ban.isactive','true')->orderBy('band.id')->get();

        return view('admin.banned_bands', ['bans' => $bans]);
    }

    public function listReportedBands(Request $request)
    {
        if (!Auth::check()) return redirect('/');

        if($request->input('page') == null)
            $currentPage = 1;
        else
            $currentPage = $request->input('page');
        
        $lastPage = DB::table('report')->where('reporttype','band_report')->count();
        $itemsPerPage = 3;
        $lastPage = ceil($lastPage/$itemsPerPage);
        $offset = $itemsPerPage*($currentPage-1);

        $query = 'SELECT reports.band_id as band_id, reports.name as band_name, reports.sum as number_of_reports, warnings.total as number_of_warnings FROM (SELECT band_id, name,sum(total) FROM (SELECT band.id as band_id, band.name as name, count(*) as total FROM report JOIN band ON band.id = report.reportedBandId WHERE report.seen = false GROUP BY band.id UNION ALL SELECT band.id as band_id, band.name as name, count(*) as total FROM report JOIN content ON content.id = report.reportedContentId LEFT JOIN post ON post.contentId = content.id JOIN band ON post.bandId = band.id WHERE report.seen = false GROUP BY band.id) as total_reported GROUP BY total_reported.band_id, total_reported.name) as reports LEFT JOIN (SELECT band.id as band_id, band.name as name, count(*) as total FROM warning JOIN band ON band.id = warning.bandId GROUP BY band.id) AS warnings on warnings.band_id = reports.band_id ORDER BY number_of_reports DESC, number_of_warnings DESC LIMIT 3 OFFSET ?';

        $reports = DB::select($query, [$offset]);
        return view('admin.reported_bands', ['reports' => $reports, 'current_page' => $currentPage, 'last_page' => $lastPage]);
    }

    public function listBandReports(Request $request){
        if (!Auth::check()) return redirect('/');

        $band_id = $request->input('id');
        $offset = 0;
        $band_name = Band::find($band_id);
        $band_name = $band_name['name'];

        $query = "SELECT * FROM (SELECT report.id as reportId, report.date as date, band.id as band_id, band.name as reportedBand, report.text as text, users2.name as reporterUser, 'na' as contentText, 0 as postId, 'non-content' as report_type FROM report JOIN band ON report.reportedBandId = band.id JOIN mb_user as users2 ON users2.id = report.reporterUserId WHERE report.seen = false UNION ALL SELECT report.id as reportId, report.date as date, band.id as band_id,band.name as reportedBand, report.text as text, users2.name as reporterUser,  content.text as contentText, post.id as postId, 'content' as report_type FROM report JOIN content ON content.id = report.reportedContentId LEFT JOIN post ON post.contentId = content.id LEFT JOIN message ON message.contentId = content.id JOIN band ON post.bandId = band.id JOIN mb_user as users2 ON users2.id = report.reporterUserId WHERE report.seen = false) as reports WHERE reports.band_id = ? ORDER BY contentText LIMIT 10 OFFSET ?;";

        $reports = DB::select($query, [$band_id,$offset]);

        return view('admin.band_reports', ['reports' => $reports, 'band_name' => $band_name, 'band_id' => $band_id]);
    }

    /**
     * Ban a band
     *
     */
    public function banBand(Request $request){

        $ban = new Ban();

        $ban->reason = $request->reason;
        $ban->bandid = $request->id;
        $ban->adminid = Auth::user()->id;
        $ban->save();

        $report = Report::find($request->reportId);
        $report->seen = true;
        $report->save();

        return response(200);
    }

    /**
     * Lift a ban
     *
     */
    public function liftBan(Request $request){

        $ban = Ban::find($request->banId);

        $ban->isactive = false;
        $ban->save();

        return response(200);
    }

    /**
     * Ignore a report
     *
     */
    public function ignoreReport(Request $request){

        $report = Report::find($request->reportId);
        $report->seen = true;
        $report->save();

        return response(200);
    }

    /**
     * Warn a user due to a report
     *
     */
    public function warnBand(Request $request){

        $warning = new Warning();

        $warning->reason = $request->reason;
        $warning->bandid = $request->id;
        $warning->adminid = Auth::user()->id;
        $warning->contentid = DB::table('report')->where('id',$request->reportId)->value('reportedcontentid');
        $warning->save();

        $report = Report::find($request->reportId);
        $report->seen = true;
        $report->save();

        return response(200);
    }

    /**
     * Remove content due to a report
     *
     */
    public function removeContentDueToReport(Request $request){

        $report = Report::find($request->reportId);
        $report->seen = true;
        $report->save();
        $content = DB::table('content')->where('id',$report->reportedcontentid)->update(['isactive' => false]);

        return response(200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genres = Genre::allActives();

        return view('pages.newband.page', ['genres' => $genres]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $band = new Band();

    //   $this->authorize('create', $band);

        $band->name = $request->input('name');
        $band->bio = $request->input('bio');
        $band->save();

        $insertQuery = "INSERT INTO band_membership (bandId, userId, isOwner)VALUES(?,?,true);";

        DB::insert($insertQuery, [$band->id, Auth::user()->id]);        
        

        if($request->__isset('selectNewMember')){

            foreach ($request->input('selectNewMember') as $userId) {
                Band::sendInvitation($userId, $band->id);
            }
        }

        if($request->__isset('genres')){
            
            foreach ($request->input('genres') as $genreId) {

                $bandGenreQuery = "INSERT INTO band_genre (bandId, genreId)VALUES(?,?);";
                DB::insert($bandGenreQuery, [$band->id, $genreId]);
            }
        }

        if($request->__isset('band_img')){

            $picture = $request->file('band_img');
            // $picture = $_FILES['band_img'];
            $profileSize = Image::make($picture)->resize(UserController::PICTURE_PROFILE_SIZE,UserController::PICTURE_PROFILE_SIZE)->encode('jpg');
            $iconSize = Image::make($picture)->resize(UserController::PICTURE_ICON_SIZE,UserController::PICTURE_ICON_SIZE)->encode('jpg');

            print_r($band->pathToProfilePicture());

            Storage::put($band->pathToProfilePicture(), $profileSize->__toString());
            Storage::put($band->pathToIconPicture(), $iconSize->__toString());
        }




        return redirect()->route('band_profile', ['id' => $band->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        if (!Auth::check()) return redirect('/login');

        $band = Band::find($id);

        //$members = $band->membersSQL();
        $members = $band->getMembersAndPending();
        $rate = floatval($band->rate());
        
        $decimal = (($rate * 10) % 10) / 10;
        $whole = floor($rate);

        $roundedRate = round($rate,1);

        $cities = City::getAll();
        $location = $band->locationCity();

        if($location != '') {
            $location = $location->name;
            $country = $band->locationCountry()->name;
        }

        else {
            $location = '';
            $country = '';
        }

        $founders = $band->founders();
        $posts = $band->posts(0);

        $genres = $band->genres();


        $band['founders'] = $founders;
        $band['posts'] = $posts;
        $band['genres'] = $genres;


        $followers = $band->followers();

        $isFounder = false;
        
        foreach($founders as $founder){
            if($founder->userid == Auth::user()->id){
                $isFounder = true;
                break;
            }
        }


        $concerts = Concert::getBandConcerts($id);
        
        return view('pages.band.profile',
            ['isFounder' => $isFounder,
            'band' => $band, 
            'members' => $members,
            'wholeRate'=> $whole, 
            'decimalRate'=> $decimal,
            'roundedRate'=> $roundedRate,
            'location'=> $location,
            'country'=> $country,
            'cities' => $cities,
            'concerts' => $concerts
            ]);
    }

    public function getNewMemberPartial(Request $request){

        return view('pages.newband.new_member', [
            'img_url' => User::find($request->id)->getIconPicturePath(),
            'id' => $request->id, 
            'name' => $request->name
        ]);
    }

    public function getNewGenrePartial(Request $request){
        return view('pages.newband.new_genre', ['name' => $request->name]);
    }

    // public function getNewMemberProfilePartial(Request $request){
    //     return view('pages.band.band_members', ['name' => $request->name]);
    // }


    public function getGenres(Request $request){
    
        $string = Content::patternToTSVector($request->pattern);    
    
        $genresQuery = "SELECT genre.id, genre.name as name 
                        FROM genre 
                        WHERE to_tsvector('simple', genre.name) @@ to_tsquery('simple', ?) 
                        ORDER BY name ASC;";
        
    
        $genresResult = DB::select($genresQuery, [$string]);
    
        $result = json_encode($genresResult);
        return response($result,200);
    }

    public function getMorePosts(Request $request, $bandId) {

        if (!Auth::check()) return response('No user logged',500);

        $band = Band::find($bandId);

        if($request->__isset('offset')) $offset = $request->offset;

        $posts = $band->posts($offset);

        $response = "";

        for($i = 0; $i < count($posts); $i++) {
            $response = $response.view('partials.post',['post' => $posts[$i]]);
        }

        return response(json_encode(["postViews" => $response, "numberOfPosts" => count($posts)]),200);

    }

    public function startFollowing($bandId, $userId) {

        if (!Auth::check()) return response('No user logged',500);

        $verifyQuery = 'SELECT * FROM band_follower 
                        WHERE band_follower.bandid = ?
                        AND band_follower.userId = ?';

        $updateQuery = 'UPDATE band_follower
                        SET isActive = true
                        WHERE band_follower.bandid = ?
                        AND band_follower.userid = ?';

        $insertQuery = 'INSERT INTO band_follower(bandid, userid, isActive)
                        VALUES (?,?,?)';

        $alreadyExists = DB::select($verifyQuery, [$bandId, $userId]);

        if(count($alreadyExists) == 0) {
            DB::insert($insertQuery, [$bandId, $userId, true]);
            return response('',200);
        }
            
        else if(count($alreadyExists) == 1) {
            DB::update($updateQuery, [$bandId, $userId]);
            return response('',200);
        }

        else
            return response(count($alreadyExists),500);

    }   

    public function stopFollowing($bandId, $userId) {

        if (!Auth::check()) return response('No user logged',500);

        $verifyQuery = 'SELECT * FROM band_follower 
                        WHERE band_follower.bandid = ?
                        AND band_follower.userId = ?';

        $updateQuery = 'UPDATE band_follower
                        SET isActive = false
                        WHERE band_follower.bandid = ?
                        AND band_follower.userid = ?';

         $alreadyExists = DB::select($verifyQuery, [$bandId, $userId]);
    
        if(count($alreadyExists) == 1) {
            DB::update($updateQuery, [$bandId, $userId]);
            return response('',200);
        }
        else
            return response('',500);

    }


    public function inviteMember($bandId, $userId){
        Band::sendInvitation($userId, $bandId);

        $userName = User::where('id', $userId)->first()->name;
        
        return response(json_encode(["userId" => $userId, "name" => $userName, "picPath" => User::getUserIconPicturePath($userId)]), 200);
    }

    public function updateInvitation($bandId, $userId, $status){
        $verifyQuery = "SELECT * FROM band_invitation
                        WHERE bandid = ? AND userId = ? AND status = 'pending'";

        $updateQuery = 
            "UPDATE band_invitation
            SET status = ?
            WHERE bandId = ? AND userId = ? AND status = 'pending'";

        $alreadyExists = DB::select($verifyQuery, [$bandId, $userId]);
        
        if(count($alreadyExists) > 0){
            
            DB::update($updateQuery, [$status, $bandId, $userId]);
            return response($updateQuery,200);
        }
        else
            return response('',500);  
        
        
        return response($alreadyExists,200);


    }

    public function removeBandMembership($bandId, $userId){

        $verifyQuery = 
            "SELECT * FROM band_membership
            WHERE bandid = ? AND userId = ? AND ceaseDate IS NULL";

        $updateQuery = 
            "UPDATE band_membership
            SET ceaseDate = now()
            WHERE bandId = ? AND userId = ? AND ceaseDate IS NULL";

        $alreadyExists = DB::select($verifyQuery, [$bandId, $userId]);
        
        if(count($alreadyExists) == 1){
            
            DB::update($updateQuery, [$bandId, $userId]);
            return response($updateQuery,200);
        }
        else
            return response('',500);  
        
        
        return response($alreadyExists,200);
    }

    public function removeBandInvitation($bandId, $userId){

        $verifyQuery = 
            "SELECT * FROM band_invitation
            WHERE bandid = ? AND userId = ? AND status='pending'";

        $updateQuery = 
            "UPDATE band_invitation
            SET laststatusdate = now(),
            status='canceled'
            WHERE bandId = ? AND userId = ? AND status='pending'";

        $exists = DB::select($verifyQuery, [$bandId, $userId]);
        
        if(count($exists) == 1){
            
            DB::update($updateQuery, [$bandId, $userId]);
            return response($updateQuery,200);
        }
        else
            return response('',500);  
        
        return response($exists,200);

    }

    public function concertDate(Request $request){    
        return response('',200);
    }

    public function scheduleConcert(Request $request){
        
        $concert = new Concert();
        $concert->bandid = $request->bandId;
        $concert->description = $request->description;
        $concert->locationid = City::where('name', $request->cityName)->pluck('id')[0];
        $concert->concertdate = $request->date;
        $concert->save();


        return view('partials.concert',['concert'=>$concert,'']);
    }

    public function removeConcert(Request $request, $bandId, $concertId){

        $concert = Concert::find($concertId);
        $concert->isactive = false;
        $concert->save();

        return response('',200);
    }

    public function reportBand(Request $request){

        $reportId = DB::select("select id from report order by date desc limit 1;");

        $report = new Report();
        $report->id = $reportId[0]->id+1;
        $report->text = str_random(10);
        $report->reportedbandid = $request->reportedBandId;
        $report->reporteruserid = Auth::user()->id;
        $report->reporttype = 'band_report';
        $report->save();

        return response('',200);
    }

}
