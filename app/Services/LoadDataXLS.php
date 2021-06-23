<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Collection;
use App\Models\Good;
use App\Models\Maincategory;
use Illuminate\Database\Eloquent\Model;

class LoadDataXLS {
    public function loadXLS(){
        $file = app()->make('file');            //извлекаем переданные из посредника в контейнер данные
        try {
            (new Maincategory)->fillFromXLS($file);
            (new Category)->fillFromXLS($file);
            (new Collection)->fillFromXLS($file);
            (new Good)->fillFromXLS($file);
            $message = 'New data from file: '.$file.' loaded successfully';
        } catch (\Exception $exception){
            $message = "Error: " .$exception->getMessage();
        }
        return $message;
    }
}
