<?php

namespace App\Http\Controllers;

use App\User;
use App\Ban;
use App\Report;
use App\Warning;
use App\City;
use App\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller {
    
    const PICTURE_PROFILE_SIZE = 500;
    const PICTURE_ICON_SIZE = 90;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listUserPermissions()
    {       
        $users = User::orderBy('admin','DESC')->orderBy('name','ASC');
        $users = $users->simplePaginate(6);
        
        return view('admin.users', ['users' => $users]);
    }

    public function listBannedUsers()
    {   

        $bans = User::join('ban','mb_user.id','=','ban.userid')->where('ban.isactive','true')->orderBy('mb_user.id')->get();

        return view('admin.banned_users', ['bans' => $bans]);
    }

    public function permissions(Request $request){

        $user = User::find($request->input('id'));

        if($user->admin)
            $user->admin = 'false';
        else
            $user->admin = 'true';

        $user->save();

        return response('',200);
    }

    public function listReportedUsers(Request $request)
    {
        if (!Auth::check()) return redirect('/');

        if($request->input('page') == null)
            $currentPage = 1;
        else
            $currentPage = $request->input('page');

        $lastPage = DB::table('report')->where('reporttype','user_report')->count();
        $itemsPerPage = 7;
        $lastPage = ceil($lastPage/$itemsPerPage);
        $offset = $itemsPerPage*($currentPage-1);
        $string = 'band_report';
        $query = 'SELECT reports.user_id as user_id, reports.name as name,reports.sum as number_of_reports, COALESCE(warnings.total,0) as number_of_warnings FROM (SELECT user_id, name,sum(total) FROM (SELECT mb_user.id as user_id, mb_user.name as name, count(*) as total FROM report JOIN mb_user ON mb_user.id = report.reportedUserId WHERE report.reportType <> ? AND report.seen = false GROUP BY mb_user.id UNION ALL SELECT mb_user.id as user_id, mb_user.name as name, count(*) as total FROM report JOIN content ON content.id = report.reportedContentId JOIN mb_user ON content.creatorId = mb_user.id WHERE report.seen = false GROUP BY mb_user.id) as total_reported GROUP BY total_reported.user_id, total_reported.name) as reports LEFT JOIN  (SELECT mb_user.id as user_id, mb_user.name as name, count(*) as total FROM warning JOIN mb_user ON mb_user.id = warning.userId GROUP BY mb_user.id) AS warnings on warnings.user_id = reports.user_id ORDER BY number_of_reports DESC, number_of_warnings DESC LIMIT ? OFFSET ?;';

        $reports = DB::select($query, [$string, $itemsPerPage, $offset]);
        return view('admin.reported_users', ['reports' => $reports, 'current_page' => $currentPage, 'last_page' => $lastPage]);
    }

    public function listUserReports(Request $request){
        if (!Auth::check()) return redirect('/');

        $na = 'na';
        $nc = 'non-content';
        $c = 'content';
        $user_id = $request->input('id');
        $offset = 0;
        $user_name = User::find($user_id);
        $user_name = $user_name['name'];

        $query = 'SELECT * FROM (SELECT report.id as reportId, report.date as date, mb_user.id as user_id, mb_user.name as reportedUser, report.text as text, users2.name as reporterUser, ? as contentText, 0 as postId, 0 as messageId, 0 as commentId, ? as report_type FROM report JOIN mb_user ON report.reportedUserId = mb_user.id JOIN mb_user as users2 ON users2.id = report.reporterUserId WHERE report.seen = false UNION ALL SELECT report.id as reportId, report.date as date, mb_user.id as user_id,mb_user.name as reportedUser, report.text as text, users2.name as reporterUser, content.text as contentText, post.id as postId, message.id as messageId, comment.id as commentId, ? as report_type FROM report JOIN content ON content.id = report.reportedContentId LEFT JOIN post ON post.contentId = content.id LEFT JOIN message ON message.contentId = content.id LEFT JOIN comment ON comment.contentId = content.id JOIN mb_user ON content.creatorId = mb_user.id JOIN mb_user as users2 ON users2.id = report.reporterUserId WHERE report.seen = false) as reports WHERE reports.user_id = ? ORDER BY contentText LIMIT 10 OFFSET ?;';

        $reports = DB::select($query, [$na,$nc,$c,$user_id,$offset]);

        return view('admin.user_reports', ['reports' => $reports, 'user_name' => $user_name, 'user_id' => $user_id]);
    }

    /**
     * Ban a user
     *
     */
    public function banUser(Request $request){

        $ban = new Ban();

        $ban->reason = $request->reason;
        $ban->userid = $request->id;
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
    public function warnUser(Request $request){

        $warning = new Warning();

        $warning->reason = $request->reason;
        $warning->userid = $request->id;
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
    
    public function show($id) {

        if (!Auth::check()) return redirect('/login');

        $user = User::find($id);
        $followedUsers = Auth::user()->followedUsers();
        $skills = $user->skills();

        $isFollowing = false;

        foreach($followedUsers as $friend) {

            if($friend->id == $id) {
                
                $isFollowing = ($friend->isactive == true);
                break;
                    
            }

        }

        $timestamp = strtotime($user->dateofbirth); 
        $dateOfBirthString = date('d/m/Y', $timestamp);

        $cities = City::getAll();
        $location = $user->locationCity();

        if($location != '') {
            $location = $location->name;
            $country = $user->locationCountry()->name;
        }

        else {
            $location = '';
            $country = '';
        }
          
        return view('pages.profile', ['country' => $country, 'location' => $location, 'cities' => $cities,'user' => $user, 'isFollowing' => $isFollowing, 'dateOfBirthString' => $dateOfBirthString, 'skills' => $skills]);

    } 

    public function startFollowing($userToFollowId) {

        if (!Auth::check()) return response('No user logged',500);

        $verifyQuery = 'SELECT * FROM user_follower 
                        JOIN mb_user as users ON users.id = user_follower.followedUserId
                        WHERE user_follower.followingUserId = ?
                        AND user_follower.followedUserId = ?';

        $updateQuery = 'UPDATE user_follower
                        SET isActive = true
                        WHERE user_follower.followingUserId = ?
                        AND user_follower.followedUserId = ?';

        $insertQuery = 'INSERT INTO user_follower(followingUserId, followedUserId, isActive)
                        VALUES (?,?,?)';

        $alreadyExists = DB::select($verifyQuery, [Auth::user()->id, $userToFollowId]);

        if(count($alreadyExists) == 0) {
            DB::insert($insertQuery, [Auth::user()->id, $userToFollowId, true]);
            return response('',200);
        }
            
        else if(count($alreadyExists) == 1) {
            DB::update($updateQuery, [Auth::user()->id, $userToFollowId]);
            return response('',200);
        }

        else
            return response(count($alreadyExists),500);

    }

    public function stopFollowing($userToFollowId) {

        if (!Auth::check()) return response('No user logged',500);

        $verifyQuery = 'SELECT * FROM user_follower 
                        WHERE user_follower.followingUserId = ?
                        AND user_follower.followedUserId = ?';

        $updateQuery = 'UPDATE user_follower
                        SET isActive = false
                        WHERE user_follower.followingUserId = ?
                        AND user_follower.followedUserId = ?';


        $alreadyExists = DB::select($verifyQuery, [Auth::user()->id, $userToFollowId]);
    
        if(count($alreadyExists) == 1) {
            DB::update($updateQuery, [Auth::user()->id, $userToFollowId]);
            return response('',200);
        }

        else
            return response('',500);

    }

    public function editUser(Request $request) {

        if (!Auth::check()) return response('No user logged',500);

        $user = User::find($request->id);

        if($request->__isset('name')) $user->name = $request->name;
        if($request->__isset('bio')) $user->bio = $request->bio;
        if($request->__isset('birthdate')) $user->dateofbirth = $request->birthdate;
        if($request->__isset('locationId')) $user->location = $request->locationId;

        $user->save();

        return response(200);

    }

    public function editPost(Request $request){
        


        return response(json_encode(["text" => "Comment text"]), 200);
    }

    public function editUserPicture(Request $request) {

        $user = User::find($request->id);

        //if($request->hasFile('picture')) {

            $picture = $request->file('picture');
            $profileSize = Image::make($picture)->resize(ProfilePageController::PICTURE_PROFILE_SIZE,ProfilePageController::PICTURE_PROFILE_SIZE)->encode('jpg');
            $iconSize = Image::make($picture)->resize(ProfilePageController::PICTURE_ICON_SIZE,ProfilePageController::PICTURE_ICON_SIZE)->encode('jpg');

            Storage::put($user->pathToProfilePicture(), $profileSize->__toString());
            Storage::put($user->pathToIconPicture(), $iconSize->__toString());

            return response('',200);

        //}

        //return response('No picture',500);
    }

    public function validatePassword(Request $request) {

        if (!Auth::check()) return response('No user logged',500);

        if($request->__isset('pwd')) {

            if (Hash::check($request->pwd, Auth::user()->password)) {

                return response('',200);

            }

            else {
                return response('Not authorized',403);
            }
            
        }

        return response('No password detected',500);
    }

    public function addSkill(Request $request, $skillId) {

        if (!Auth::check()) return response('No user logged',500);

        if(!$request->__isset('level'))
            return response('',400);

        $verifyQuery = 'SELECT * FROM user_skill
                        WHERE user_skill.skillId = ?
                        AND user_skill.userId = ?';

        $updateQuery = 'UPDATE user_skill
                        SET isActive = true,
                            level = ?
                        WHERE user_skill.skillId = ?
                        AND user_skill.userId = ?';

        $insertQuery = 'INSERT INTO user_skill(skillId, userId, level)
                    VALUES (?,?,?)';

        $alreadyExists = DB::select($verifyQuery, [$request->skillId, Auth::user()->id]);


        if(count($alreadyExists) == 0) {
            DB::insert($insertQuery, [$request->skillId,Auth::user()->id,$request->level]);
            return response('',200);
        }
            

        else if(count($alreadyExists) == 1) {
            DB::update($updateQuery, [$request->level,$request->skillId, Auth::user()->id]);
            return response('',200);
        }

        else
            return response(count($alreadyExists),500);

    }

    public function deleteSkill(Request $request, $skillId) {

        if (!Auth::check()) return response('No user logged',500);

        $updateQuery = 'UPDATE user_skill
                        SET isActive = false
                        WHERE user_skill.skillId = ?
                        AND user_skill.userId = ?';

        DB::update($updateQuery, [$request->skillId, Auth::user()->id]);

        return response(200);
    }

    public function deleteLocation() {

        if (!Auth::check()) return response('No user logged',500);

        $delete = 'UPDATE mb_user
                   SET location = NULL
                   WHERE id = ?';

        DB::update($delete, [Auth::user()->id]);

        return response(200);

    }

    public function getMorePosts(Request $request, $userId) {

        if (!Auth::check()) return response('No user logged',500);

        $user = User::find($userId);

        if($request->__isset('offset')) $offset = $request->offset;
        if($request->__isset('type')) $type = $request->type;

        $posts = $type == 'profile' ? $user->posts($offset) : $user->feedPosts($offset);

        $response = "";

        for($i = 0; $i < count($posts); $i++) {
            $response = $response.view('partials.post',['post' => $posts[$i]]);
        }

        return response($response,200);

    }

    public function getFeedPosts(){

        if (!Auth::check()) return redirect('/login');

        $posts = Post::feedPosts(Auth::user()->id,0);
        
        return view('pages.feed', ['posts' => $posts]);
    }

    public function createPost(Request $request) {    
        
        DB::beginTransaction();
        DB::statement('SET TRANSACTION ISOLATION LEVEL REPEATABLE READ');

        $insertContent = "INSERT INTO content (text, creatorId)
                                VALUES (?, ?)";

        $insertPost = "INSERT INTO post (private, contentId)
                                VALUES (?, currval('content_id_seq'))";

        DB::insert($insertContent, [$request->content, Auth::user()->id]);
        DB::insert($insertPost, [$request->private]);
        $postid = DB::select("SELECT currval('post_id_seq')")[0]->currval;
        DB::commit();

        return response(json_encode(['postid'=>$postid, 'name' => Auth::user()->name,'content' => $request->content, 'date'=>date("d/m/Y")]), 200);
    }
    
    public function deletePost(Request $request){

        $getContentId = "SELECT post.contentid FROM post WHERE post.id = ?";
        $content = DB::select($getContentId, [$request->postid]);
        $contentid = $content[0]->contentid;
        
        DB::beginTransaction();
        DB::statement('SET TRANSACTION ISOLATION LEVEL REPEATABLE READ');
        
        $deletePost = "DELETE FROM post WHERE post.id=?";
        $deleteContent = "DELETE FROM content WHERE content.id=?";

        DB::delete($deletePost, [$request->postid]);
        DB::delete($deleteContent, [$contentid]);
        
        DB::commit();
        
        return response(json_encode(['postid'=>$request->postid]), 200);
    }

}
