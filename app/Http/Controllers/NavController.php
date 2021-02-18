<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Good;
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

    public function showGoods($id){
        $goods = Good::where('category_id', $id)->get();
        return view('goods', ['goods' => $goods]);
    }

    public function showGoodItem($id){
        $item = Good::find($id);
        return view('goodItem', ['item' => $item]);
    }
}
