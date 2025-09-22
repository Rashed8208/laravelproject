<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class front extends Controller
{
    function welcome() {
        return view('welcome');
    }
    function about(){
        return view('about');
    }
    function electronic(){
        return view('electronic');
    }
     function cloth(){
        return view('cloth');
    }
    function furniture(){
        return view('furniture');
    }
}
