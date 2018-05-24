<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Band;


class BandController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.newband.page');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $band = new Band();

    //   $this->authorize('create', $band);

        $band->name = $request->input('name');
        $band->save();

        foreach ($request->input('selectNewMember') as $userId) {
            Band::sendInvitation($userId, $band->id);
        }

        return redirect()->route('band_page', ['bandId' => $band->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('pages.band')->with($id);
    }

    public function getNewMemberPartial(Request $request){
        return view('pages.newband.new_member', ['url_img' => $request->id, 'name' => $request->name]);
        // TODO: user_img
    }

    public function getNewGenrePartial(Request $request){
        return view('pages.newband.new_genre', ['name' => $request->name]);
    }


    public function getGenres(Request $request){
    
            
        $words = explode(" ", trim($request->pattern));
        $genresResult = array();
    
        if(count($words) && $words[0] == ""){
            return response($genresResult,200);
        }
        $string = "";
        foreach ($words as $word) {
            
            $string = $string.$word.":* & ";            
        }
        $string = trim($string, "& ");
    
    
        $genresQuery = "SELECT genre.id, genre.name as name 
                        FROM genre 
                        WHERE to_tsvector('simple', genre.name) @@ to_tsquery('simple', ?) 
                        ORDER BY name ASC;";
        
    
        $genresResult = DB::select($genresQuery, [$string]);
    
        $result = json_encode($genresResult);
        return response($result,200);
    }
}
