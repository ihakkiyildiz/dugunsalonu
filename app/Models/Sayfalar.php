<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Sayfalar
 *
 * @property int $id
 * @property string $seourl
 * @property string $sayfatitle
 * @property string $metaicerik
 * @property string $icerik
 * @property string $keyword
 * @property string|null $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Sayfalar newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sayfalar newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sayfalar query()
 * @method static \Illuminate\Database\Eloquent\Builder|Sayfalar whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sayfalar whereIcerik($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sayfalar whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sayfalar whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sayfalar whereKeyword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sayfalar whereMetaicerik($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sayfalar whereSayfatitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sayfalar whereSeourl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sayfalar whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Sayfalar extends Model
{
    //
    protected $table = "sayfalar";
    protected $guarded = [];
}
