<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Band;
use App\User;
use App\Report;
use App\Ban;
use App\City;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

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
        return view('pages.newband');

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
      $band->save();

      return redirect()->route('band_page', ['bandId' => $band->id]);
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
        $members = $band->membersSQL();
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
        
        return view('pages.band',
            ['band' => $band, 
            'members' => $members,
            'wholeRate'=>$whole, 
            'decimalRate'=>$decimal,
            'roundedRate'=>$roundedRate,
            'location'=> $location,
            'country'=>$country,
            'cities' =>$cities]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getMorePosts(Request $request, $bandId) {

        $band = Band::find($bandId);

        if($request->__isset('offset')) $offset = $request->offset;

        $posts = $band->posts($offset);

        return response(json_encode($posts,200));

    }


}
