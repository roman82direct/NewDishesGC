<?php

namespace App\Http\Middleware;

use App\Models\Good;
use App\Models\Like;
use Closure;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckLike
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
        $is_like = (new Like())::getId($request->input('id'), Auth::user()->id);
        if (!$is_like){
            Like::insert(['user_id'=>Auth::user()->id, 'good_id'=>$request->input('id')]);
            $good = Good::find($request->input('id'));
            $good->likes++;
            $good->save();
        } else
            abort(208, 'Like already exists');

        return $next($request);
    }
}
