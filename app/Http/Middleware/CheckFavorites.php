<?php

namespace App\Http\Middleware;

use App\Models\Favorite;
use App\Models\Good;
use App\Models\Like;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckFavorites
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $is_favorite = (new Favorite())::getId($request->input('id'), Auth::user()->id);
        if (!$is_favorite){
            Favorite::insert(['user_id'=>Auth::user()->id, 'good_id'=>$request->input('id')]);
        } else
            abort(208, 'This item already added to Favorites');

        return $next($request);
    }
}
