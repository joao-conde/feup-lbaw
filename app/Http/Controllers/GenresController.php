<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Genre;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\DB;

class GenresController extends Controller
{

    /**
     * Shows all genres.
     *
     * @return Response
     */
    public function list()
    {
      if (!Auth::check()) return redirect('/');

      //$this->authorize('list', Genre::class);

        $query = 'SELECT * from genre WHERE isActive = TRUE';
        $genres = DB::select($query);

        return view('admin.genres', ['genres' => $genres]);
      }

    /**
     * Creates a new genre.
     *
     * @return Genre The genre created.
     */
    public function create(Request $request)
    {
      $query = 'SELECT * FROM genre WHERE name = ?';
      $s = DB::select($query,[$request->input('genre')]);
      if(!empty($s)){
        $genre = Genre::find($s[0]->id);
        $genre->isactive = 'true';
        $genre->save();
        return response($s[0]->id,200);
      }
      else{
        $genre = new Genre();

        //$this->authorize('create', $genre);

        $genre->name = $request->input('genre');
        $genre->creatingadminid = Auth::user()->id;

        $genre->save();
        return response($genre->id,200);
      }

    }

    public function delete(Request $request, $id)
    {
      $genre = Genre::find($id);

     // $this->authorize('delete', $genre);

      //$genre->name = $request->input('genre');
      //$genre->creatingadminid = Auth::user()->id;      
      $genre->isactive = 'false';

      $genre->save();

      return response('',200);
    }

  }
