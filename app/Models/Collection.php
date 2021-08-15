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
 * @property string|null $render
 * @property string|null $img3
 * @property string|null $img4
 * @property string|null $img5
 * @property string|null $img6
 * @method static \Illuminate\Database\Eloquent\Builder|Collection whereImg3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Collection whereImg4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Collection whereImg5($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Collection whereImg6($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Collection whereRender($value)
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
                    'img' => file_exists(public_path().'/storage/img/good/collections/small/'.$line['art'].'.jpg') ? '/storage/img/good/collections/small/'.$line['art'].'.jpg' : null,
                    'img1' => file_exists(public_path().'/storage/img/good/collections/big/'.$line['art'].'.jpg') ? '/storage/img/good/collections/big/'.$line['art'].'.jpg' : null,
                    'img2' => file_exists(public_path().'/storage/img/good/collections/big/'.$line['art'].'_1.jpg') ? '/storage/img/good/collections/big/'.$line['art'].'_1.jpg' : null,
                    'img3' => file_exists(public_path().'/storage/img/good/collections/big/'.$line['art'].'_2.jpg') ? '/storage/img/good/collections/big/'.$line['art'].'_2.jpg' : null,
                    'img4' => file_exists(public_path().'/storage/img/good/collections/big/'.$line['art'].'_3.jpg') ? '/storage/img/good/collections/big/'.$line['art'].'_3.jpg' : null,
                    'img5' => file_exists(public_path().'/storage/img/good/collections/big/'.$line['art'].'_4.jpg') ? '/storage/img/good/collections/big/'.$line['art'].'_4.jpg' : null,
                    'img6' => file_exists(public_path().'/storage/img/good/collections/big/'.$line['art'].'_5.jpg') ? '/storage/img/good/collections/big/'.$line['art'].'_5.jpg' : null,
                ]);
            } else return null;
        });
    }
}
