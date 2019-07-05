<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;

class adminmiddleware
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
        if(Auth::user()->status == 1){
            return $next($request);
        }else{
            return redirect('/');
        }// end inner if


        }else{

            return redirect('/login');

        }// end 1st if
        
    }
}
