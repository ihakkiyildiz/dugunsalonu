<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Rezervasyonlar
 *
 * @property int $id
 * @property int $salon_id
 * @property string $tarih
 * @property string $adsoyad
 * @property string $telefon
 * @property string $not
 * @property int $durum
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Rezervasyonlar newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rezervasyonlar newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rezervasyonlar query()
 * @method static \Illuminate\Database\Eloquent\Builder|Rezervasyonlar whereAdsoyad($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rezervasyonlar whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rezervasyonlar whereDurum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rezervasyonlar whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rezervasyonlar whereNot($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rezervasyonlar whereSalonId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rezervasyonlar whereTarih($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rezervasyonlar whereTelefon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rezervasyonlar whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Rezervasyonlar extends Model
{
    //
    protected $table = "rezervasyonlar";
    protected $guarded = [];


    public function salon()
    {
        return $this->belongsTo('App\Models\Salonlar','salon_id','id');
    }

}
