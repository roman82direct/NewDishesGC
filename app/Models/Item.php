<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Item
 *
 * @property int $id
 * @property string $art
 * @property string $name
 * @property string $description
 * @property string $category
 * @property string $brand
 * @property string $collection
 * @property int $category_id
 * @property string $img Path to the main img of the good
 * @property string $img1
 * @property string $img2
 * @property int|null $likes
 * @property int|null $dislikes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Item newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Item newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Item query()
 * @method static \Illuminate\Database\Eloquent\Builder|Item whereArt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Item whereBrand($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Item whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Item whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Item whereCollection($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Item whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Item whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Item whereDislikes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Item whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Item whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Item whereImg1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Item whereImg2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Item whereLikes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Item whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Item whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Item extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'art',
        'collection',
        'category',
        'brand',
        'description',
        'category_id',
        'arrival',
        'img',
        'img1',
        'img2',
        'likes',
        'dislikes',
    ];
}
