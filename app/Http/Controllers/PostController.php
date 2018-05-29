<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Post;

class PostController extends Controller
{
    public function showPost($userId, $postId) {

        $post = Post::getPost($userId, $postId);

        return view('pages.post', ['post' => $post]);
    }
    public function createPost(Request $request) {    
        
        DB::beginTransaction();
        DB::statement('SET TRANSACTION ISOLATION LEVEL REPEATABLE READ');

        if (!Auth::check()) return response('No user logged',500);

        $mediaURL = $request->__isset('mediaURL') ? $request->mediaURL : "" ;

        $bandId = $request->__isset('bandId') ? $request->bandId : null;
        
        if (strlen(trim($request->content)) == 0 && strlen(trim($mediaURL)) == 0)
            return response('No content',500);
        

        $insertContent = "INSERT INTO content (text, creatorId)
                                VALUES (?, ?)";

        $insertPost = "INSERT INTO post (private, contentId, bandId, mediaURL)
                                VALUES (?, currval('content_id_seq'), ?, ?)";

        DB::insert($insertContent, [$request->content, Auth::user()->id]);
        DB::insert($insertPost, [$request->private, $bandId, $mediaURL]);

        $postId = DB::select("SELECT currval('post_id_seq')")[0]->currval;
        DB::commit();

        $post = Post::getPost(Auth::user()->id, $postId);

        return response(view('partials.post', ['post'=> $post]), 200);

    }
    
    public function editPost(Request $request, $userId, $postId){

        if (!Auth::check()) return response('No user logged',500);

        if (Auth::user()->id != $userId)
            return response('Not Authorized',403);

        if(!$request->__isset('text'))
            return response('No Text',500);

        $text = $request->text;

        
        $update = 'UPDATE content 
                   SET text = ? 
                   WHERE id = (SELECT contentid FROM post where id = ?)';

        DB::update($update,[$text,$postId]);


        return response(200);
    }

    public function deletePost($userId, $postId) {

        if (!Auth::check()) return response('No user logged',500);

        if (Auth::user()->id != $userId)
            return response('Not Authorized',403);

        $update = 'UPDATE content 
                    SET isactive = false 
                    WHERE id = (SELECT contentid FROM post where id = ?)';
        
        DB::update($update,[$postId]);

        return response(200);
    }

    

}
