<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Rap2hpoutre\FastExcel\FastExcel;

/**
 * App\Models\Group
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Group newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Group newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Group query()
 *  * @method static \Illuminate\Database\Eloquent\Builder|Group whereName($value)
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereUpdatedAt($value)
 */
class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function fillFromXLS($file)
    {
        Group::truncate();
        return (new FastExcel)->import($file, function ($line) {
            $exists = Group::query()
                ->where('name', $line['group'])
                ->exists();
            if (!$exists) {
                return Group::create([
                    'name' => $line['group'],
                ]);
            } else return null;
        });
    }
}
