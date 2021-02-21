<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Rap2hpoutre\FastExcel\FastExcel;

/**
 * App\Models\Category
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $img Path to the main img of the category
 * @property string $img1
 * @property string $img2
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereImg1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereImg2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'img',
        'img1',
        'img2',
    ];

    public function fillFromXLS($file)
    {
        return (new FastExcel)->import($file, function ($line) {
            $exists = Category::query()
                ->where('name', $line['category'])
                ->exists();
            if (!$exists) {
                return Category::create([
                    'name' => $line['category'],
                    'description' => $line['category_description'],
                ]);
            } else return null;
        });
    }
}
