<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    public function __construct(){
        //Checks if the person is veryfied/Logged in
        $this->middleware('auth');
        //After creating a custom middleware
        //The user must have the role admin
        $this->middleware('role:admin');
    }

    //@return \Illuminate\Contracts\Support\Renderable
    //The Route if calling for this function
    //It will retun the user to the admin.home page 
    public function index(){
        return view('admin.home'); 
    }
}
