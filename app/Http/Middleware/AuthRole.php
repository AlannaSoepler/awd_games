<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
//If the user has a specific role. If they are the right role they are allowed to go to the next part
class AuthRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    //...$roles can be a string or an array
    public function handle(Request $request, Closure $next, ...$roles)
    {
        //If the user does not exist
        //If user exist then check the users role 
        //If the user does not have the wanted role then redirect to home
        //I use the AuthorizeRoles becouse it checks an array
        //This should make it opssible that a user can have many roles and see multiple view 
        if(!$request->user() || !$request->user()->authorizeRoles($roles)){
            return redirect()->route('home');
        }
        return $next($request);
    }
}
