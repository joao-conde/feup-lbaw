<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class FeedController extends Controller
{

    
    public function getPosts(){
        if (!Auth::check()) return redirect('/login');

    	return view('pages.feed');
    }

    
}
