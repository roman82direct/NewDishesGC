<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request){
        $user = \Auth::user();
//        dd($user);
        return view('user.profile', ['user' => $user]);
    }

    public function downloadExcel(){
        $users = User::all();
        return (new \Rap2hpoutre\FastExcel\FastExcel($users))->download('users.xlsx');
    }
}
