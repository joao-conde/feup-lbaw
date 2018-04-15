<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Genre;

class GenresController extends Controller
{
    /**
     * Shows the genre for a given id.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
      $genre = Genre::find($id);

      //$this->authorize('show', $genre);

      return view('admin.genres', ['genre' => $genre]);
    }

    /**
     * Shows all genres.
     *
     * @return Response
     */
    public function list()
    {
      //if (!Auth::check()) return redirect('/');

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

      $this->authorize('create', $genre);

      $genre->name = $request->input('name');
      $genre->creatingadminid = Auth::user()->id;
      $genre->save();

      return $genre;
    }

    public function delete(Request $request, $id)
    {
      $genre = Genre::find($id);

      $this->authorize('delete', $genre);
      $genre->delete();

      return $genre;
    }

}
