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

    public function createLike($id){
        $is_like = (new Like())->getId($id, Auth::user()->id);
        if (!$is_like){
            Like::insert(['user_id'=>Auth::user()->id, 'good_id'=>$id]);
            $good = Good::find($id);
            $good->likes++;
            $good->save();
//            Good::find($id)->increment('likes'); // Не работает на HOST
        }
        return redirect()->back()->with('is_like',$is_like);
    }
}
