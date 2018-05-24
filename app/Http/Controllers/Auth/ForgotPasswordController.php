<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Mail;
use App\User;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function emailForm(){
        return view('auth.passwords.email', []);
    }

    public function sendEmail(Request $request){

        // verificar se email e username coincidem para 1 utilizador não poder recuperar a password de outro utilizador
        // $user = DB::table('mb_user')->where('username',$request->username)->where('email',$request->email)->get();

        Mail::send(['text'=>'partials.mail'],['name','LBAW1712'], function($message) {
            global $request;
            // dd($request->email);
            $message->to($request->email, 'Danny')->subject('Cenas');
            $message->from('lbaw1712@gmail.com','LBAW1712');
        });

        return redirect('/');
    }
}

