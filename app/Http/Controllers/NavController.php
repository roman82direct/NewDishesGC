<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Good;
use Illuminate\Http\Request;

class NavController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('menu.catalog', ['categories' => $categories]);
    }

    public function contact(){
        return view('menu.contacts');
    }

    public function showGoods($id){
//        dump(\Storage::files('app/public'));
        $goods = Good::where('category_id', $id)->get();
        return view('goods', ['goods' => $goods, 'id' => $id]);
    }

    public function showGoodItem($id){
        $item = Good::find($id);
        return view('goodItem', ['item' => $item]);
    }

    public function showAdminPanel(){
        return view('admin.panel');
    }
}
