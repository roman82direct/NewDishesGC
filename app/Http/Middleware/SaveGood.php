<?php

namespace App\Http\Middleware;

use App\Models\Category;
use App\Models\Good;
use Closure;
use Illuminate\Http\Request;

class SaveGood
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
        $id = $request->post('id');
        $model = $id ? Good::find($id) : new Good();
        $urlArray = [];
        foreach ($request->files as $key => $file) {
            $request->file($key)->storePubliclyAs('public/img/good', $_FILES[$key]['name']);
            $url = \Storage::url('img/good/' . $_FILES[$key]['name']);
            $urlArray[$key] = $url;
        }
        if (array_key_exists('file', $urlArray)){
            $url = $urlArray['file'];
        } else {
            $url = $id ? Good::find($id)->img : '/storage/img/good/write.png';
        }
        if (array_key_exists('file1', $urlArray)){
            $url1 = $urlArray['file1'];
        } else {
            $url1 = $id ? Good::find($id)->img1 : '/storage/img/good/write.png';
        }
        if (array_key_exists('file2', $urlArray)){
            $url2 = $urlArray['file2'];
        } else {
            $url2 = $id ? Good::find($id)->img2 : '/storage/img/good/write.png';
        }

        try {
            $model->fill([
                "art" => $request->post('art'),
                "name" => $request->post('name'),
                "category_id" => Category::whereName($request->post('category'))->value('id'),
                "description" => $request->post('text'),
                "collection" => $request->post('collection'),
                "brand" => $request->post('brand'),
                "arrival" => $request->post('arrival'),
                "img" => $url,
                "img1" => $url1,
                "img2" => $url2
            ])->save();
            $message = 'Данные сохранены';
        } catch (\Exception $exception){
            $message = "Error: " .$exception->getMessage();
        }
        app()->instance('message', $message);
        return $next($request);
    }
}
