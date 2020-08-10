<?php

use App\Models\Ayarlar;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AyarlarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Ayarlar::truncate();
        Ayarlar::create([
            'key'=>Str::slug('Site Başlığı'),
            'value'=>'Ülger Yazılım Düğün Salonu',
            'desc'=>'Site Başlığı'
        ]);
        Ayarlar::create([
            'key'=>Str::slug('Site Açıklama'),
            'value'=>'Ülger Yazılım Düğün Salonu Scripti V.1',
            'desc'=>'Site Açıklama'
        ]);
        Ayarlar::create([
            'key'=>Str::slug('Site Etiketler'),
            'value'=>'Ülger Yazılım Düğün Salonu',
            'desc'=>'Site Etiketler'
        ]);
        Ayarlar::create([
            'key'=>Str::slug('Logo'),
            'value'=>'/css/img/logo.png',
            'desc'=>'Logo'
        ]);
    }
}
