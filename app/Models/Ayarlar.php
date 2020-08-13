<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Ayarlar
 *
 * @property int $id
 * @property string $key
 * @property string|null $value
 * @property string $desc
 * @method static \Illuminate\Database\Eloquent\Builder|Ayarlar newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ayarlar newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ayarlar query()
 * @method static \Illuminate\Database\Eloquent\Builder|Ayarlar whereDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ayarlar whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ayarlar whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ayarlar whereValue($value)
 * @mixin \Eloquent
 */
class Ayarlar extends Model
{
    //
    protected $table = "ayarlar";
    public $timestamps = false;

}
