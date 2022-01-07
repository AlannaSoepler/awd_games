<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//This is a new contaoller made in the comand line php artissan make:controller PageController
class PageController extends Controller
{
    //This controller is handaling the two static pages (that everyone can view)
    //This function willretun the user to the welcome view (this function is being called in web.php)
    public function welcome(){
        return view('welcome');
    }

    //This controller is handaling the two static pages (that everyone can view)
    //This function willretun the user to the about view (this function is being called in web.php)
    public function about()
    {
        return view('about');
    }
}
