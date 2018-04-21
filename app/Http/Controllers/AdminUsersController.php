<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\User;

class AdminUsersController extends Controller
{
    public function list()
	{
		if (!Auth::check()) return redirect('/');

	  //$this->authorize('list', Genre::class);

			// $query = 'SELECT * from skill WHERE isActive = TRUE';
			// $skills = DB::select($query);

			$users = User::all();

			return view('admin.users', ['users' => $users]);
		}
}
