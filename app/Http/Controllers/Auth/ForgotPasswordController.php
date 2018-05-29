<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Mail;
use App\User;
use Illuminate\Support\Facades\DB;

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

        $validateData = $request->validate([
            'username' => 'required',
            'email' => 'required'
        ]);

        $user = User::where('username',$request->username)->where('email',$request->email)->first();
        if($user == null)
            return redirect('/');
        $userId = $user->id;
        $token = str_random(40);
        $token = hash("sha256",$token);
        $user->password_token = $token;
        $user->save();

        Mail::send(['html'=>'partials.password_mail','email'=>'$user->email'],['name','LBAW1712','token'=>$token], function($message) {
            global $user;
            $message->to($user->email, $user->name)->subject('Password Recovery');
            $message->from('lbaw1712@gmail.com','LBAW1712');
        });

        return redirect('/');
    }

    public function resetPassword(/*Request $request*/ $token){
        $user = User::where('password_token',$token)->first();
        // dd($user->username);

        return view('auth.passwords.reset', ['user'=>$user, 'token'=>$token]);
    }

    public function updatePassword(Request $request){
        if($request->pass1 != $request->pass2){
            dd('passes diferentes');
        }
        $user = User::where('username',$request->username)->first();
        $user->password = bcrypt($request->pass1);
        $user->password_token = null;
        $user->save();

        return redirect('/');
    }
}

