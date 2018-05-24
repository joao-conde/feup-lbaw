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

    public function do_search(Request $request){
        $text = $request->input('text');

        Session::put('searchData', ['text' => $text]);
        return redirect()->route('search');
    }

    public function search(){
        $text = Session::get('searchData')['text'];

        $searchQueryUsers = "SELECT mb_user.id, mb_user.name as name, city.name || ', ' || country.name as complement, user_follower.isActive as isFollowing
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

        $searchQueryBandsByGenre = "SELECT genre.name as complement, band.id, band.name as name, band_follower.isActive as isFollowing
                                    FROM genre
                                    JOIN band_genre ON band_genre.genreId = genre.id
                                    JOIN band ON band.id = band_genre.bandId
                                    LEFT JOIN band_follower
                                    ON band_follower.bandId = band.id AND band_follower.userId = ?
                                    WHERE to_tsvector('simple', genre.name) @@ to_tsquery('simple', ?)
                                    ORDER BY isFollowing ASC";
        
        $searchQueryUsersBySkill = "SELECT user_skill.level as stars, skill.name as complement, mb_user.id, mb_user.name as name, user_follower.isActive as isFollowing
                                    FROM mb_user
                                    LEFT JOIN user_skill ON user_skill.userId = mb_user.id
                                    JOIN skill ON skill.id = user_skill.skillId
                                    LEFT JOIN user_follower
                                    ON user_follower.followedUserId = mb_user.id AND user_follower.followingUserId = ?
                                    WHERE to_tsvector('simple', skill.name) @@ to_tsquery('simple', ?)
                                    ORDER BY isFollowing ASC, user_skill.level DESC";

        $searchResultUsers = DB::select($searchQueryUsers, [Auth::user()->id, $text.':*']);
        $searchResultBands = DB::select($searchQueryBands, [Auth::user()->id, $text.':*']);
        $searchResultBandsByGenre = DB::select($searchQueryBandsByGenre, [Auth::user()->id, $text.':*']);
        $searchResultUsersBySkill = DB::select($searchQueryUsersBySkill, [Auth::user()->id, $text.':*']);

    	return view('pages.search.page', [
            'searchResultUsers' => $searchResultUsers,
            'searchResultBands' => $searchResultBands, 
            'searchResultBandsByGenre' => $searchResultBandsByGenre, 
            'searchResultUsersBySkill' => $searchResultUsersBySkill, 
            'text' => $text
        ]);
    }
}
