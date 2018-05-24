<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listUserPermissions()
    {       
        //$users = DB::table('mb_user')->paginate(10);
        $users = User::orderBy('admin','DESC')->orderBy('name','ASC');
        $users = $users->paginate(10);
        
        return view('admin.users', ['users' => $users]);
    }

    public function permissions(Request $request){
        //$user = User::where('username', $request->input('username'));

        $user = User::find($request->input('id'));

        if($user->admin)
            $user->admin = 'false';
        else
            $user->admin = 'true';

        $user->save();

        return response('',200);
    }

    public function readNotifications(){

        $userId = Auth::user()->id;

        $updateQuery = "UPDATE user_notification SET visualizedDate = now() WHERE user_notification.id IN (".User::queryNotifications().")";

        Log::info($updateQuery);

    }

    public function getFollowing(Request $request){

        
        $words = explode(" ", trim($request->pattern));
        $followingUsersResult = array();

        if(count($words) && $words[0] == ""){
            return response($followingUsersResult,200);
        }
        $string = "";
        foreach ($words as $word) {
            
            $string = $string.$word.":* & ";            
        }
        $string = trim($string, "& ");


        $followingUsersQuery = "SELECT mb_user.id, mb_user.name as name
                        FROM mb_user
                        JOIN user_follower
                        ON user_follower.followedUserId = mb_user.id AND user_follower.followingUserId = ?
                        WHERE to_tsvector('simple', mb_user.name) @@ to_tsquery('simple', ?)
                        ORDER BY name ASC;";
        

        $followingUsersResult = DB::select($followingUsersQuery, [Auth::user()->id, $string]);

        $result = json_encode($followingUsersResult);
        return response($followingUsersResult,200);
    }

    public function getFollowingAll(Request $request){

        $followingUsersQuery = "SELECT mb_user.id, mb_user.name as name
                        FROM mb_user
                        JOIN user_follower
                        ON user_follower.followedUserId = mb_user.id AND user_follower.followingUserId = ?
                        ORDER BY name ASC;";

        $followingUsersResult = DB::select($followingUsersQuery, [Auth::user()->id]);

        $result = json_encode($followingUsersResult);
        return response($followingUsersResult,200);
    }

}
