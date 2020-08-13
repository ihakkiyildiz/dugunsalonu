<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Salonlar
 *
 * @property int $id
 * @property string $adi
 * @property string $image
 * @property string $aciklama
 * @property string $keyword
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Salonlar newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Salonlar newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Salonlar query()
 * @method static \Illuminate\Database\Eloquent\Builder|Salonlar whereAciklama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Salonlar whereAdi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Salonlar whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Salonlar whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Salonlar whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Salonlar whereKeyword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Salonlar whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Salonlar extends Model
{
    //
    protected $table = "salonlar";
}
