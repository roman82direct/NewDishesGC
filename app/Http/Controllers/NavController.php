<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Collection;
use App\Models\Comment;
use App\Models\Favorite;
use App\Models\Good;
use App\Models\Like;
use App\Models\Maincategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use function PHPUnit\Framework\isNull;

class NavController extends Controller
{
    public function main(){
        return view('menu.main',
            ['categories' => (Category::count() > 0) ? Category::get()->random(6) : null,
             'collections' => (Collection::count() > 0) ? Collection::whereRender('1')->get() : null,
             'goodsByLikes' => Good::getByLikes(20),
             'comments' => Comment::whereIsModerate(true)->orderByDesc('created_at')->get(),
             ]);
    }

    public function catalog(){

        return view('menu.catalog');
    }

    public function showByMaincategory($id){
        $categories = Category::whereCategory1Id($id)->get()->sortBy('group_id');
        $goods = Good::whereMaincategoryId($id)->get();
        $collections = Good::getCollections($goods);
        $groups = Good::getGroups($goods);

        return view('menu.category', ['goods'=>$goods, 'categories'=>$categories, 'collections'=>$collections, 'groups'=>$groups, 'id'=>$id]);
    }

    public function showGoods($id){
        $goods = Good::where('category_id', $id)->get();

        return view('goods', ['goods' => $goods, 'collections' => Good::getCollections($goods), 'id' => $id]);
    }

    public function showGoodItem($id){
        $is_like = (Auth::user()) ? (new Like())->getId($id, Auth::user()->id) : null;
        $is_favorite = (Auth::user()) ? (new Favorite())->getId($id, Auth::user()->id) : null;

        return view('goodItem', ['item' => Good::find($id), 'is_like'=>$is_like, 'is_favorite'=>$is_favorite, 'imgs'=>Good::getImgs($id)]);
    }

    public function showCollectionItem($id){

        return view('collectionItem', ['item' => Collection::find($id), 'imgs'=>Collection::getImgs($id), 'goods'=>Good::whereCollectionId($id)->get()]);
    }

    public function showAdminPanel(){
        return view('admin.panel', ['count' => Good::count()]);
    }
}
