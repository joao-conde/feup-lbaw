<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeedController extends Controller
{
    public function getPosts(){
    	return view('pages.feed');
    }

    public function search(){
    	return view('pages.search');
    }
}
