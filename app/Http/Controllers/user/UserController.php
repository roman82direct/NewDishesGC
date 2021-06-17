<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentsRequest;
use App\Models\Comment;
use App\Models\Favorite;
use App\Models\Good;
use App\Models\Like;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        $user = \Auth::user();

        return view('user.profile', ['user' => $user]);
    }

    public function downloadExcel(){
        $goods = Good::all();

        return (new \Rap2hpoutre\FastExcel\FastExcel($goods))->download('goods.xlsx');
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
//        return response()->json(['success'=>'Your comment is accepted'], 202);
    }

    public function search(Request $request){
        $search = $request->input('search');
        $result = Good::where('art', 'like', "%$search%")
            ->orWhere('name', 'like', "%$search%")
            ->get();

        return view('layouts.searchresult')->with('searchgoods', $result);
    }
}
