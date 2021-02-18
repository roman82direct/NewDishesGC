<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NavController extends Controller
{
    public function index(Request $request){
        return view('menu.catalog');
    }

    public function contact(){
        return view('menu.contacts');
    }

    public function showNews(){
        return view('menu.news');
    }

    public function test(){
        dd('This is test');
    }
}
