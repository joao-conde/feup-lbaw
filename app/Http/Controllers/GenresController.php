<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Genre;
use Illuminate\Support\Facades\Auth; 

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

      $genres = Genre::all();

      return view('admin.genres', ['genres' => $genres]);
    }

    /**
     * Creates a new genre.
     *
     * @return Genre The genre created.
     */
    public function create(Request $request)
    {

      $genre = new Genre();

      //$this->authorize('create', $genre);

      $genre->name = $request->input('genre');
      $genre->creatingadminid = Auth::user()->id;


      $genre->save();

      return response('',200);
    }

    public function delete(Request $request, $id)
    {
      $genre = Genre::find($id);

      $this->authorize('delete', $genre);
      $genre->delete();

      return $genre;
    }

}
