<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentsRequest;
use App\Models\Brand;
use App\Models\Collection;
use App\Models\Comment;
use App\Models\Favorite;
use App\Models\Good;
use App\Models\Like;
use App\Models\User;
use App\Services\SaveDataXLS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        $user = \Auth::user();

        return view('user.profile', ['user' => $user]);
    }

    public function showFavorites(){
        $favorites = Good::getFavorites(Auth::id());

        return view('user.favorites', ['favorites'=>$favorites, 'collections' => Good::getCollections($favorites)]);
    }

    public function delFromFavorites($id){
        Favorite::destroy($id);

        return redirect()->back()->with('success', 'Товар удален из избранных');
    }

    public function delAllFavorites(){
        Favorite::whereUserId(Auth::id())->delete();

        return redirect()->back()->with('success', 'Товары удалены из избранных');
    }

    public function downloadAll(){
        $goods = Good::all();
        $list = SaveDataXLS::downloadXLS($goods);

        return (new \Rap2hpoutre\FastExcel\FastExcel($list))->download('все новинки.xlsx');
    }

    public function downloadFavorites(){
        $favorites = Good::getFavorites(Auth::id());
        $list = SaveDataXLS::downloadXLS($favorites);

        return (new \Rap2hpoutre\FastExcel\FastExcel($list))->download('мои избранные.xlsx');
    }

    public function createLike(){
        return response()->json(['success'=>'Your Like accepted'], 202);
    }

    public function addToFavorites(){
        return response()->json(['success'=>'Added to Favorites'], 202);
    }

    public function commentGood(CommentsRequest $request){
        $comment = Comment::create($request->all());

        return response()->json($comment, 201);
    }

    public function search(Request $request){
        $search = $request->input('search');
        $result = Good::where('art', 'like', "%$search%")
            ->orWhere('name', 'like', "%$search%")
            ->get();

        return view('layouts.searchresult')->with('searchgoods', $result);
    }
}
