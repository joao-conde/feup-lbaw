<?php

namespace App\Http\Controllers;

use App\User;
use App\Ban;
use App\Report;
use App\Warning;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class UserController extends Controller
{
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
