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
 * @property int $price
 * @property int $collection_id
 * @method static \Illuminate\Database\Eloquent\Builder|Good whereCollectionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Good wherePrice($value)
 * @property string $pack
 * @property int $maincategory_id
 * @property int $group_id
 * @property string|null $img3
 * @property string|null $img4
 * @property string|null $img5
 * @property string|null $img_pack
 * @method static \Illuminate\Database\Eloquent\Builder|Good whereGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Good whereImg3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Good whereImg4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Good whereImg5($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Good whereImgPack($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Good whereMaincategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Good wherePack($value)
 */
class Good extends Model
{
    use HasFactory;

    protected $fillable = [
        'art',
        'name',
        'description',
        'price',
        'pack',
        'brand',
        'maincategory_id',
        'collection_id',
        'category_id',
        'group_id',
        'arrival',
        'img',
        'img1',
        'img2',
        'img3',
        'img4',
        'img5',
        'img_pack',
        'likes',
        'dislikes',
    ];

    /**
     * Парсится только .xlsx!!!
     * @param $file
     * @return \Illuminate\Support\Collection
     * @throws \Box\Spout\Common\Exception\IOException
     * @throws \Box\Spout\Common\Exception\UnsupportedTypeException
     * @throws \Box\Spout\Reader\Exception\ReaderNotOpenedException
     */
    public function fillFromXLS($file)
    {
        Like::truncate();
        Good::truncate();
        return (new FastExcel)->import($file, function ($line){
            return Good::create([
                'art' => $line['art'],
                'name' => $line['name'],
                'description' => $line['description'],
                'price' => $line['price'],
                'pack' => $line['pack'],
                'brand' => $line['brand'],
                'collection_id' => Collection::whereName($line['collection'])->value('id'),
                'category_id' => Category::where('name', $line['category2'])->value('id'),
                'maincategory_id' => Maincategory::where('name', $line['category1'])->value('id'),
                'group_id' => Group::whereName($line['group'])->value('id'),
                'arrival' => $line['arrival'],
                'img' => file_exists(public_path().'/storage/img/good/'.$line['art'].'.jpg') ? '/storage/img/good/'.$line['art'].'.jpg' : null,
                'img1' => file_exists(public_path().'/storage/img/good/'.$line['art'].'_1.jpg') ? '/storage/img/good/'.$line['art'].'_1.jpg' : null,
                'img2' => file_exists(public_path().'/storage/img/good/'.$line['art'].'_2.jpg') ? '/storage/img/good/'.$line['art'].'_2.jpg' : null,
                'img3' => file_exists(public_path().'/storage/img/good/'.$line['art'].'_3.jpg') ? '/storage/img/good/'.$line['art'].'_3.jpg' : null,
                'img4' => file_exists(public_path().'/storage/img/good/'.$line['art'].'_4.jpg') ? '/storage/img/good/'.$line['art'].'_4.jpg' : null,
                'img5' => file_exists(public_path().'/storage/img/good/'.$line['art'].'_5.jpg') ? '/storage/img/good/'.$line['art'].'_5.jpg' : null,
                'img_pack' => file_exists(public_path().'/storage/img/good/'.$line['art'].'_pack.jpg') ? '/storage/img/good/'.$line['art'].'_pack.jpg' : null,
            ]);
        });
    }
    /**
     * Выбираем ТОПы на главную
     *@param $count
     * количество товаров
    */
    public static function getByLikes($count){
        return Good::query()->orderByDesc('likes')
            ->limit($count)
            ->get();
    }

    /**
     * создаем массив ссылок на "живые" фото на страницу товара
     * @param $id
     * @return array
     */
    public static function getImgs($id)
    {
        $imgs = Good::where('id', $id)->select(['img', 'img1', 'img2', 'img3', 'img4', 'img5'])->get()->toArray();
        $true_imgs = [];
        foreach ($imgs[0] as $item) {
            if ($item) {
                $true_imgs[] = $item;
            }
        }
        return $true_imgs;
    }

    /**
     * ToDo переделать без foreach через DB::join
     * @param $goods
     * @return \Illuminate\Support\Collection
     */
    public static function getCollections($goods){
        $collections = collect([]);
        foreach ($goods as $item){
            $collections->push(Collection::whereId($item->collection_id)->select(['id', 'name'])->get());
        }

        return $collections->flatten()->unique();
    }

    public static function getGroups($goods){
        $groups = collect([]);
        foreach ($goods as $item){
            $groups->push(Group::whereId($item->group_id)->select(['id', 'name'])->get());
        }

        return $groups->flatten()->unique();
    }

    static function getFavorites($user_id)
    {
        return Good::leftJoin('favorites', 'goods.id', '=', 'favorites.good_id')
            ->where('favorites.user_id', $user_id)
            ->orderBy('goods.collection_id')
            ->get();
    }
}
