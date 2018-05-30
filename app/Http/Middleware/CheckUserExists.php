<?php

namespace App\Http\Middleware;
use App\User;
use App\Ban;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Closure;

class CheckUserExists
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $user = User::where('username',$request->username)->first();

        if($user->email != $request->email){
            $errors->has('username') ? ' has-error' : '';
        }

        return $errors;
    }
}
