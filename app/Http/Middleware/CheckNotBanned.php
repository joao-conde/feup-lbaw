<?php

namespace App\Http\Middleware;
use App\User;
use App\Ban;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Closure;

class CheckNotBanned
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
        if($user != null){
            $isBanned = Ban::where('userid',$user->id)->where('isactive','true')->first();
            if($isBanned != null)
                return redirect('/403');
        }

        return $next($request);
    }
}
