<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Duyurular
 *
 * @property int $id
 * @property string $seourl
 * @property string $duyurutitle
 * @property string $metaicerik
 * @property string $icerik
 * @property string $keyword
 * @property string $image
 * @property int $durum
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Duyurular newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Duyurular newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Duyurular query()
 * @method static \Illuminate\Database\Eloquent\Builder|Duyurular whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Duyurular whereDurum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Duyurular whereDuyurutitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Duyurular whereIcerik($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Duyurular whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Duyurular whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Duyurular whereKeyword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Duyurular whereMetaicerik($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Duyurular whereSeourl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Duyurular whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Duyurular extends Model
{
    //
    protected $table = "duyurular" ;
    protected $guarded = [];
}
