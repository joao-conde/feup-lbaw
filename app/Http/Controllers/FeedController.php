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
        
        return response(json_encode(['name' => Auth::user()->name,'content' => $request->content, 'date'=>date("d/m/Y")]), 200);
	}

}