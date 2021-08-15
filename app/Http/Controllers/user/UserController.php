<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentsRequest;
use App\Http\Requests\ShareGoodMailRequest;
use App\Mail\ShareGood;
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
use Illuminate\Support\Facades\Mail;

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

        return (new \Rap2hpoutre\FastExcel\FastExcel($list))->download('Все новинки посуды и текстиля Гала-Центра.xlsx');
    }

    public function downloadFavorites(){
        $favorites = Good::getFavorites(Auth::id());
        $list = SaveDataXLS::downloadXLS($favorites);

        return (new \Rap2hpoutre\FastExcel\FastExcel($list))->download('Мои избранные новинки Гала-Центра.xlsx');
    }

    public function downloadCollection($id){
        $goods = Good::whereCollectionId($id)->get();
        $list = SaveDataXLS::downloadXLS($goods);

        return (new \Rap2hpoutre\FastExcel\FastExcel($list))->download('Товары из коллекции '.Collection::find($id)->name.'.xlsx');
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

    public function sendGoodMail(ShareGoodMailRequest $request)
    {
        $good = Good::findOrFail($request->input('good_id'));
        Mail::to($request->input('email'))->send(new ShareGood($good));

        return response()->json(true, 200);
    }

    public function search(Request $request){
        $search = $request->input('search');
        $result = Good::where('art', 'like', "%$search%")
            ->orWhere('name', 'like', "%$search%")
            ->get();

        return view('layouts.searchresult')->with('searchgoods', $result);
    }
}
