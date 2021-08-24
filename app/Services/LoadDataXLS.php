<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Collection;
use App\Models\Good;
use App\Models\Group;
use App\Models\Maincategory;
use Illuminate\Database\Eloquent\Model;

class LoadDataXLS {

    public $source = [
        'https://www.galacentre.ru/download/yml/posuda.xml',
        'https://www.galacentre.ru/download/yml/textile.xml'
    ];

    public function loadXLS(){
        ini_set('max_execution_time', 180);
        $file = app()->make('file');            //извлекаем переданные из посредника в контейнер данные
        try {
            (new Maincategory)->fillFromXLS($file);
            (new Group)->fillFromXLS($file);
            (new Category)->fillFromXLS($file);
            (new Collection)->fillFromXLS($file);
            (new Good)->fillFromXLS($file);
            foreach (ParseGalaCentre::parse($this->source) as $item_gc){
                Good::whereArt($item_gc['art'])->update(['url_gc' => $item_gc['url']]);
            }
            $message = 'New data from file: '.$file.' loaded successfully';
        } catch (\Exception $exception){
            $message = "Error: " .$exception->getMessage();
        }
        return $message;
    }
}
