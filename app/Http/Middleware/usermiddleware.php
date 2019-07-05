<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;

class usermiddleware
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
       //chech if auth
       if(Auth::check()){

        //check if user, then redirect
    if(Auth::user()->status == 0){
        return $next($request);
    }else{
        return redirect('/dashhboard');
    }// end inner if


    }else{

        return redirect('/login')->with('success', 'Access Denied!');

    }// end 1st if
    
}
}
