<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Rap2hpoutre\FastExcel\FastExcel;

/**
 * App\Models\MainCategory
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Maincategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Maincategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Maincategory query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string $img Path to the main img of the category
 * @property string $img1
 * @property string $img2
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Maincategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Maincategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Maincategory whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Maincategory whereImg1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Maincategory whereImg2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Maincategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Maincategory whereUpdatedAt($value)
 */
class Maincategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'img',
        'img1',
        'img2',
    ];

    public function fillFromXLS($file)
    {
        Maincategory::truncate();
        return (new FastExcel)->import($file, function ($line) {
            $exists = Maincategory::query()
                ->where('name', $line['category1'])
                ->exists();
            if (!$exists) {
                return Maincategory::create([
                    'name' => $line['category1'],
                    'img' => '/storage/img/good/'.$line['art'].'.jpg',
                    'img1' => '/storage/img/good/'.$line['art'].'_1.jpg',
                    'img2' => '/storage/img/good/'.$line['art'].'_2.jpg',
                ]);
            } else return null;
        });
    }
}
