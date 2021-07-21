<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Collection;
use App\Models\Good;
use App\Models\Group;
use App\Models\Maincategory;
use Illuminate\Database\Eloquent\Model;

class SaveDataXLS {
    public static function downloadXLS($items){
        $list = collect([]);
        foreach ($items as $item){
            $list->push([
                'Артикул' => $item->art,
                'Наименование' => $item->name,
                'Группа 1-го уровня' => Maincategory::whereId($item->maincategory_id)->value('name'),
                'Группа 2-го уровня' => Category::whereId($item->category_id)->value('name'),
                'Бренд' => $item->brand,
                'Коллекция' => Collection::whereId($item->collection_id)->value('name'),
                'Упаковка' => $item->pack,
                'Дата прихода' => date('d.m.Y', strtotime($item->arrival)),
                'Ссылка на товар' => 'https://cookwaregc.ru/good'.$item->good_id
            ]);
        }
        return $list;
    }
}
