<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class frontendController extends Controller
{
    function welcome() {
        return view('welcome');
    }
    function about(){
        return view('about');
    }
     function product(){
        return view('product');
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
    function blog(){
        return view('blog');
    }
}
