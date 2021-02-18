<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
 */
class Good extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'categoty_id',
        'img',
        'img1',
        'img2',
        'likes',
        'dislikes',
    ];
}
