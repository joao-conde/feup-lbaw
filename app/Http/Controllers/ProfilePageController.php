<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class ProfilePageController extends Controller
{
    
    public function show($id) {

        $user = User::find($id);

        return view('pages.profile', ['user' => $user]);

    } 

}
