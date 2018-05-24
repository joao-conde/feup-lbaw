<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class PagesController extends Controller
{
    public function about(){
    	return view('pages.about');
    }

    public function faq(){
    	return view('pages.faq.page');
    }

    // public function adminUsers(){
    // 	return view('admin.users');
    // }

    public function adminReportedUsers(){
    	return view('admin.user_reports');
    }

    public function adminReportedBands(){
    	return view('admin.band_reports');
    }

    public function do_search(Request $request){
        $text = $request->input('text');

        Session::put('searchData', ['text' => $text]);
        return redirect()->route('search');
    }

    public function search(){
        $text = Session::get('searchData')['text'];

        $searchQueryUsers = "SELECT mb_user.id, mb_user.name as name, city.name as city, country.name as country, user_follower.isActive as isFollowing
                            FROM mb_user
                            LEFT JOIN city ON city.id = mb_user.location 
                            LEFT JOIN country ON city.countryId = country.id
                            LEFT JOIN user_follower 
                            ON user_follower.followedUserId = mb_user.id AND user_follower.followingUserId = ?
                            WHERE to_tsvector('simple', mb_user.name) @@ to_tsquery('simple', ?)
                            ORDER BY isFollowing ASC";
        
        $searchQueryBands = "SELECT band.id, band.name as name, band_follower.isActive as isFollowing
                            FROM band
                            LEFT JOIN band_follower 
                            ON band_follower.bandId = band.id AND band_follower.userId = ?
                            WHERE to_tsvector('simple', band.name) @@ to_tsquery('simple', ?)
                            ORDER BY isFollowing ASC";
        
        $searchResultUsers = DB::select($searchQueryUsers, [Auth::user()->id, $text.':*']);
        $searchResultBands = DB::select($searchQueryBands, [Auth::user()->id, $text.':*']);

    	return view('pages.search.page', [
            'searchResultUsers' => $searchResultUsers,
            'searchResultBands' => $searchResultBands, 
            'text' => $text
        ]);
    }
}
