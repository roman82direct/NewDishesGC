<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class NavController extends Controller
{
    public function index(Request $request){
        $categories = Category::all();
//        foreach ($categories as $item){
//            dump($item->name);
//        }
        return view('menu.catalog', ['categories' => $categories]);
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
