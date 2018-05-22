<?php

namespace App\Http\Controllers;

use \Datetime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class FeedController extends Controller
{
    public function getPosts(){

        if (!Auth::check()) return redirect('/login');


        $query = 'SELECT * from mb_user, content, post WHERE content.creatorid=? 
                    AND post.contentid=content.id AND mb_user.id=creatorid
                    ORDER BY post.id DESC';

        $posts = DB::select($query, [Auth::user()->id]);

        foreach($posts as $post){
            $dt = new DateTime($post->date);
            $post->date = date("d/m/Y", $dt->getTimestamp());
        }
        
        return view('pages.feed', ['posts' => $posts]);
    }


	public function createPost(Request $request)
	{    
        
        DB::beginTransaction();
        DB::statement('SET TRANSACTION ISOLATION LEVEL REPEATABLE READ');

        $insertContent = "INSERT INTO content (text, creatorId)
                                VALUES (?, ?)";

        $insertPost = "INSERT INTO post (private, contentId)
                                VALUES (?, currval('content_id_seq'))";

        DB::insert($insertContent, [$request->content, Auth::user()->id]);
        DB::insert($insertPost, [$request->private]);
        DB::commit();

        $posts = DB::table('post')->get();
        $postid = $posts[0]->id;

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