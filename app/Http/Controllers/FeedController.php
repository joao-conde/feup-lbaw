<?php

namespace App\Http\Controllers;

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

}
