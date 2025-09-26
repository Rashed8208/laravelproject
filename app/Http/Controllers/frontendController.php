<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\item;

class frontendController extends Controller
{
    function home() {
        $items=item::get();
        return view('home',compact('items'));
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
     function cart(){
        return view('cart');
    }
}
