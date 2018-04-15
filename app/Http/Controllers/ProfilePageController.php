<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


use App\User;

class ProfilePageController extends Controller
{
    
    public function show($id) {

        if (!Auth::check()) return redirect('/login');

        $user = User::find($id);
        $followedUsers = Auth::user()->followedUsers();

        $isFollowing = false;

        foreach($followedUsers as $friend) {

            if($friend->id == $id) {
                
                $isFollowing = ($friend->isactive == true);
                break;
                    
            }

        }

        return view('pages.profile', ['user' => $user, 'isFollowing' => $isFollowing]);

    } 

    public function startFollowing($userToFollowId) {

        if (!Auth::check()) return redirect('/login');

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
            return response('',500);

    }

    public function stopFollowing($userToFollowId) {

        if (!Auth::check()) return redirect('/login');

        $verifyQuery = 'SELECT * FROM user_follower 
                        JOIN mb_user as users ON users.id = user_follower.followedUserId
                        WHERE user_follower.followingUserId = ?
                        AND user_follower.followedUserId = ?';

        $updateQuery = 'UPDATE user_follower
                        SET isActive = false
                        WHERE user_follower.followingUserId = ?
                        AND user_follower.followedUserId = ?';

        $insertQuery = 'INSERT INTO user_follower(followingUserId, followedUserId, isActive)
                        VALUES (?,?,?)';

        $alreadyExists = DB::select($verifyQuery, [Auth::user()->id, $userToFollowId]);
    
        if(count($alreadyExists) == 1) {
            DB::update($updateQuery, [Auth::user()->id, $userToFollowId]);
            return response('',200);
        }

        else
            return response('',200);

    }

}
