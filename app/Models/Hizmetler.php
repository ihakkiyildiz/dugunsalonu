<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Hizmetler
 *
 * @property int $id
 * @property string $seourl
 * @property string $sayfatitle
 * @property string $metaicerik
 * @property string $icerik
 * @property string $keyword
 * @property string $image
 * @property int $sira
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Hizmetler newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Hizmetler newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Hizmetler query()
 * @method static \Illuminate\Database\Eloquent\Builder|Hizmetler whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hizmetler whereIcerik($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hizmetler whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hizmetler whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hizmetler whereKeyword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hizmetler whereMetaicerik($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hizmetler whereSayfatitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hizmetler whereSeourl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hizmetler whereSira($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hizmetler whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Hizmetler extends Model
{
    //
    protected $table = "hizmetler";
}
