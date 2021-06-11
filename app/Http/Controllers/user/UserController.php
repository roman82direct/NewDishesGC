<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
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

    public function createLike(Request $request){
        $is_like = (new Like())->getId($request->input('id'), Auth::user()->id);
        if (!$is_like){
            Like::insert(['user_id'=>Auth::user()->id, 'good_id'=>$request->input('id')]);
            $good = Good::find($request->input('id'));
            $good->likes++;
            $good->save();
            $message = 'Your Like accepted';
        } else
            $message = 'Like is already exists';
        return response()->json(['success'=>$message], 202);
    }

    public function search(Request $request){
        $search = $request->input('search');

        $result = Good::where('art', 'like', "%$search%")
            ->orWhere('name', 'like', "%$search%")
            ->get();

        return view('layouts.searchresult')->with('searchgoods', $result);
    }
}
