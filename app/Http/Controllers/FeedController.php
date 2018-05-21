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
        $post = new Post();
        
        $post->id = $request->input('id');
        $post->private = $request->input('private');
        
        //$post->text = $request->input('post');
        
        //$post->save();
        
        return response($post->id, 200);
	}

}
