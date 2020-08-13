<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Galeri
 *
 * @property int $id
 * @property string|null $aciklama
 * @property string|null $link
 * @property string $resim
 * @property string $yer
 * @property int $sira
 * @property int $durum
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Galeri newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Galeri newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Galeri query()
 * @method static \Illuminate\Database\Eloquent\Builder|Galeri whereAciklama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Galeri whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Galeri whereDurum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Galeri whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Galeri whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Galeri whereResim($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Galeri whereSira($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Galeri whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Galeri whereYer($value)
 * @mixin \Eloquent
 */
class Galeri extends Model
{
    //,
 protected $table = "galeri";

}
