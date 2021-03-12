<?php

namespace App\Http\Middleware;

use App\Models\Category;
use App\Models\Good;
use Closure;
use Illuminate\Http\Request;

class FileUpload
{
    /**
     * Handle an incoming request.
     *
     * Сохраняем файл на диске
     * если файл не выбран, возвращаем тестовый фал для парсинга
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (is_file($request->file('file'))) {
            $newFileName = date("d-m-y_H-i_") . $_FILES['file']['name'];
            $request->file('file')->storePubliclyAs('public/parse', $newFileName);    //сохраняем в Storage/parse
            $request->file('file')->move("../public", $newFileName);               //перемещаем в корневую папку, т. к. парсим только .xlsx из корневой папки
        } else {
            $newFileName = 'test.xlsx';
        }
        app()->instance('file', $newFileName);  //передаем экземпляр в контейнер, чтобы извлечь в контроллере

        return $next($request);
    }
}
