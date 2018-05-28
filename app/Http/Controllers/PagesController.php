<?php

namespace App\Http\Controllers;

use App\User;
use App\Band;
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

        $searchResultUsers = User::getUsersByPattern(Auth::user()->id, $text.':*');
        $searchResultBands = Band::getBandsByPattern(Auth::user()->id, $text.':*');
        $searchResultBandsByGenre = Band::getBandsByGenre(Auth::user()->id, $text.':*');
        $searchResultUsersBySkill = User::getUsersBySkill(Auth::user()->id, $text.':*');

    	return view('pages.search.page', [
            'searchResultUsers' => $searchResultUsers,
            'searchResultBands' => $searchResultBands, 
            'searchResultBandsByGenre' => $searchResultBandsByGenre, 
            'searchResultUsersBySkill' => $searchResultUsersBySkill, 
            'text' => $text
        ]);
    }
}
