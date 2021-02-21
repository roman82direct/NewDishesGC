<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Rap2hpoutre\FastExcel\FastExcel;

/**
 * App\Models\Good
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $category_id
 * @property string $img Path to the main img of the good
 * @property string $img1
 * @property string $img2
 * @property int|null $likes
 * @property int|null $dislikes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Good newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Good newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Good query()
 * @method static \Illuminate\Database\Eloquent\Builder|Good whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Good whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Good whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Good whereDislikes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Good whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Good whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Good whereImg1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Good whereImg2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Good whereLikes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Good whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Good whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $art
 * @property string $brand
 * @property string $collection
 * @property string|null $arrival
 * @method static \Illuminate\Database\Eloquent\Builder|Good whereArrival($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Good whereArt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Good whereBrand($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Good whereCollection($value)
 */
class Good extends Model
{
    use HasFactory;

    protected $fillable = [
        'art',
        'name',
        'description',
        'brand',
        'collection',
        'category_id',
        'arrival',
        'img',
        'img1',
        'img2',
        'likes',
        'dislikes',
    ];

    /**
     * TODO реализовать приведение 0-х значений в столбце 'arrival' к формату DATETIME
     * @param $file
     * @return \Illuminate\Support\Collection
     * @throws \Box\Spout\Common\Exception\IOException
     * @throws \Box\Spout\Common\Exception\UnsupportedTypeException
     * @throws \Box\Spout\Reader\Exception\ReaderNotOpenedException
     */
    public function fillFromXLS($file){
        return (new FastExcel)->import($file, function ($line){
            return Good::create([
                'art' => $line['art'],
                'name' => $line['name'],
                'description' => $line['description'],
                'brand' => $line['brand'],
                'collection' => $line['collection'],
                'category_id' => Category::where('name', $line['category'])->value('id'),
                'arrival' => $line['arrival'],
                'img' => 'storage/img/good/'.$line['art'].'.jpg',
                'img1' => 'storage/img/good/'.$line['art'].'_1.jpg',
                'img2' => 'storage/img/good/'.$line['art'].'_2.jpg',
            ]);
        });
    }

}
