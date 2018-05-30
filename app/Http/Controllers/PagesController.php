<?php

namespace App\Http\Controllers;

use App\User;
use App\Band;
use App\Content;
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

        $pattern = Content::patternToTSVector($text);

        $searchResultUsers = User::getUsersByPattern(Auth::user()->id, $pattern);
        $searchResultBands = Band::getBandsByPattern(Auth::user()->id, $pattern);
        $searchResultBandsByGenre = Band::getBandsByGenre(Auth::user()->id, $pattern);
        $searchResultUsersBySkill = User::getUsersBySkill(Auth::user()->id, $pattern);

    	return view('pages.search.page', [
            'searchResultUsers' => $searchResultUsers,
            'searchResultBands' => $searchResultBands, 
            'searchResultBandsByGenre' => $searchResultBandsByGenre, 
            'searchResultUsersBySkill' => $searchResultUsersBySkill, 
            'text' => $text
        ]);
    }

    
}
