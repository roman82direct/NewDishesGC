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
 * @property int $category1_id
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCategory1Id($value)
 * @property int $group_id
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereGroupId($value)
 */
class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category1_id',
        'group_id',
        'img',
        'img1',
        'img2',
    ];

    /**
     * Для показа рандомных фото в карточке категории на странице Каталог
     * выбираем 3 случайных строки из таблицы Good category_id = id текущей категории
     * и формируем массив из ссылок на фото
     *
     * @param $id
     * @param $n - количество картинок в карусели
     * @return \Illuminate\Support\Collection
     */
    public function getRandomImg($id, $n){
        return Good::whereCategoryId($id)
            ->get()
            ->random($n)
            ->pluck('img');
    }

    /**
     * Парсится только .xlsx!!!
     * @param $file -
     * @return \Illuminate\Support\Collection
     * @throws \Box\Spout\Common\Exception\IOException
     * @throws \Box\Spout\Common\Exception\UnsupportedTypeException
     * @throws \Box\Spout\Reader\Exception\ReaderNotOpenedException
     */
    public function fillFromXLS($file)
    {
        Category::truncate();
        return (new FastExcel)->import($file, function ($line) {
            $exists = Category::query()
                ->where('name', $line['category2'])
                ->exists();
            if (!$exists) {
                return Category::create([
                    'name' => $line['category2'],
                    'category1_id' => Maincategory::where('name', $line['category1'])->value('id'),
                    'group_id' => Group::whereName($line['group'])->value('id'),
                    'img' => '/storage/img/good/'.$line['art'].'_catalog.jpg',
                    'img1' => '/storage/img/good/main/'.$line['art'].'_1.jpg',
                    'img2' => '/storage/img/good/main/'.$line['art'].'_2.jpg'
                ]);
            } else return null;
        });
    }
}
