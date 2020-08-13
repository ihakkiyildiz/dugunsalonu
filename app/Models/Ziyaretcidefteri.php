<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Ziyaretcidefteri
 *
 * @property int $id
 * @property string $adsoyad
 * @property string $email
 * @property string $mesaj
 * @property int $durum
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Ziyaretcidefteri newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ziyaretcidefteri newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ziyaretcidefteri query()
 * @method static \Illuminate\Database\Eloquent\Builder|Ziyaretcidefteri whereAdsoyad($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ziyaretcidefteri whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ziyaretcidefteri whereDurum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ziyaretcidefteri whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ziyaretcidefteri whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ziyaretcidefteri whereMesaj($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ziyaretcidefteri whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Ziyaretcidefteri extends Model
{
    //
    protected $table = "ziyaretcidefteri";
}
