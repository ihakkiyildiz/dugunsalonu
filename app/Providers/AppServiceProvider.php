<?php

namespace App\Providers;

use App\Models\Ayarlar;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //

        if(!Cache::has('ayarlar'))
        {
            Cache::rememberForever('ayarlar', function () {
                return Ayarlar::all();
            });
        }
		
    }
}
