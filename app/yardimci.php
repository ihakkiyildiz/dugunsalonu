<?php

use Illuminate\Support\Facades\Artisan;

function cekAyar($ayar)
{
    # code...

   $ayarlar = Illuminate\Support\Facades\Cache::get('ayarlar')->toArray();
    foreach ($ayarlar as $a)
    {
        if($a['key']==$ayar)
            return $a['value'];
    }
   return null;


}
function tumAyarlar()
{
    return Illuminate\Support\Facades\Cache::get('ayarlar')->toArray();
}
