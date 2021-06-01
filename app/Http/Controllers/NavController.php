<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Good;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $is_like = (Auth::user()) ? (new Like())->getId($id, Auth::user()->id) : null;
        return view('goodItem', ['item' => $item, 'is_like'=>$is_like]);
    }

    public function showAdminPanel(){
        return view('admin.panel', ['count' => Good::count()]);
    }
}
