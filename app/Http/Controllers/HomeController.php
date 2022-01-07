<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        //Gets Authenticated user
        $user = Auth::user();
        //Craeting a string that is quil to home
        $home = 'home';
        //Checks if this user has an admin role else if the user has a user role
        if($user->hasRole('admin')){
            //Now i want the string above to change to admin.home
            $home = 'admin.home';
        }else if($user->hasRole('user')){
            //Chenges the string above to user.home
            $home = 'user.home';
        }
        //Redirect to whatever the update value of home is
        return redirect()->route($home);
    }
}
