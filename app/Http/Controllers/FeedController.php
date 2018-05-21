<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class FeedController extends Controller
{
    public function getPosts(){
        if (!Auth::check()) return redirect('/login');

        $query = 'SELECT * from content WHERE 
                    content.creatorid=?;';

        $posts = DB::select($query, [Auth::user()->id]);


        return view('pages.feed', ['posts' => $posts]);
    }

    /**
	 * Creates a new post.
	 *
	 * @return Post The post created.
	 */
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
        
        return response(json_encode(['content' => $request->content]), 200);
	}

}