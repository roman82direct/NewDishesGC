<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Favorite;
use App\Models\Good;
use App\Models\Like;
use App\Models\Maincategory;
use http\Url;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class NavController extends Controller
{
    public function main(){
        return view('menu.main',
            ['categories' => Category::get()->random(6),
             'goodsByLikes' => Good::getByLikes(20),
             'comments' => Comment::whereIsModerate(true)->orderByDesc('created_at')->get()
             ]);
    }

    public function catalog(){
        session()->flash('url.intended', \url()->current());
        return view('menu.catalog');
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
        $is_like = (Auth::user()) ? (new Like())->getId($id, Auth::user()->id) : null;
        $is_favorite = (Auth::user()) ? (new Favorite())->getId($id, Auth::user()->id) : null;

        return view('goodItem', ['item' => Good::find($id), 'is_like'=>$is_like, 'is_favorite'=>$is_favorite]);
    }

    public function showAdminPanel(){
        return view('admin.panel', ['count' => Good::count()]);
    }
}
