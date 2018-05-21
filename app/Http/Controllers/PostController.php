<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{

    /**
     * Creates a new post.
     * 
     * @return Post The post created.
     */
    public function createUserPost(Request $request){
        $post = new Post();
        $post.insertUserPost($request->input('text'), $request->input('creatorId'), $request->input('private'));            
    }

}
