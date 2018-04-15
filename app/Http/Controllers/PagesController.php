<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function about(){
    	return view('pages.about');
    }

    public function faq(){
    	return view('pages.faq');
    }

    public function adminUsers(){
    	return view('layouts.admin.users');
    }

    public function adminReportedUsers(){
    	return view('layouts.admin.user_reports');
    }

    public function adminReportedBands(){
    	return view('layouts.admin.band_reports');
    }

    public function adminGenres(){
    	return view('layouts.admin.genres');
    }

    public function adminSkills(){
    	return view('layouts.admin.skills');
    }
}
