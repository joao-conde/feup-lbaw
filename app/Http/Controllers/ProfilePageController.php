<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;


use App\User;

class ProfilePageController extends Controller

{

    const PICTURE_PROFILE_SIZE = 500;
    const PICTURE_ICON_SIZE = 90;
    
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
            return response('',500);

    }

    public function editUser(Request $request) {

        if (!Auth::check()) return response('No user logged',500);

        $user = User::find($request->id);

        if($request->__isset('name')) $user->name = $request->name;
        if($request->__isset('bio')) $user->bio = $request->bio;

        $user->save();

        return response('',200);

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

}
