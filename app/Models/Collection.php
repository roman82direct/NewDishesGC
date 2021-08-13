<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Rap2hpoutre\FastExcel\FastExcel;

/**
 * App\Models\Collection
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $img Path to the main img of the collection
 * @property string $img1
 * @property string $img2
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Collection newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Collection newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Collection query()
 * @method static \Illuminate\Database\Eloquent\Builder|Collection whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Collection whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Collection whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Collection whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Collection whereImg1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Collection whereImg2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Collection whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Collection whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Collection extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'render',
        'img',
        'img1',
        'img2',
        'img3',
        'img4',
        'img5',
        'img6'
    ];

    public function fillFromXLS($file)
    {
        Collection::truncate();
        return (new FastExcel)->import($file, function ($line) {
            $exists = Collection::query()
                ->where('name', $line['collection'])
                ->exists();
            if (!$exists) {
                return Collection::create([
                    'name' => $line['collection'],
                    'description' => $line['collection_description'],
                    'render' => $line['collection_render'],
                    'img' => '/storage/img/good/collections/small/'.$line['art'].'.jpg',
                    'img1' => '/storage/img/good/collections/big/'.$line['art'].'.jpg',
                    'img2' => '/storage/img/good/collections/big/'.$line['art'].'_1.jpg',
                    'img3' => '/storage/img/good/collections/big/'.$line['art'].'_2.jpg',
                    'img4' => '/storage/img/good/collections/big/'.$line['art'].'_3.jpg',
                    'img5' => '/storage/img/good/collections/big/'.$line['art'].'_4.jpg',
                    'img6' => '/storage/img/good/collections/big/'.$line['art'].'_5.jpg',
                ]);
            } else return null;
        });
    }
}
