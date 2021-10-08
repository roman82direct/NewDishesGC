<?php


namespace App\Services;


use App\Models\Good;

class ParseGalaCentre {

    /**
     * Парсим YML Гала-Центра для получения ссылок на товары на сайте в наличии
     * @param $sources
     * @return \Illuminate\Support\Collection|\Tightenco\Collect\Support\Collection
     */
    public static function parse($sources){
        $gc_items = collect([]);
        foreach ($sources as $source){
            try {
                $xml = simplexml_load_file($source);
                foreach ($xml->shop->offers->offer as $offer) {
                    $gc_items->push([
                        'art' => $offer->xpath('param[@name="Артикул"]')[0]->__toString(),
                        'url' => $offer->url->__toString()
                    ]);
                }
            } catch (\Exception $e) {
                dd($e);
            }
        }
        return $gc_items;
    }

}
