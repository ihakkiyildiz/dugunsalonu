<?php

use App\Http\Controllers\Yonetim\HakkindaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::group(['prefix' => 'Yonetim','as'=>'yonetim.','namespace'=>'Yonetim'], function () {
    Route::get('/', 'MainController@index')->name('index');
        Route::resource('Ayarlar', 'AyarlarController');
        Route::resource('Galeri', 'GaleriController');
        Route::resource('Hakkinda', 'HakkindaController');
        Route::resource('Misyon', 'MisyonController');
        Route::resource('Vizyon', 'VizyonController');
        Route::resource('Hizmetler', 'HizmetlerController');
        Route::resource('Rezervasyonlar', 'RezervasyonlarController');
        Route::resource('ZiyaretciDefteri', 'ZiyaretciDefteriController');
        Route::resource('Duyurular', 'DuyurularController');
        Route::resource('Salonlar', 'SalonlarController');
        Route::resource('Kullanicilar', 'KullaniciController');



});
Route::group(['as'=>'web','namespace'=>'Web'],function (){
    Route::get('/','WebController@index')->name('.index');
    Route::get('/Sayfa/{slug}','WebController@sayfa')->name('.sayfa');
    Route::get('/Hizmetler/{slug?}','WebController@hizmetler')->name('.hizmetler');
    Route::get('/Rezervasyontakvimi','WebController@rezervasyontakvimi')->name('.rezervasyontakvimi');
    Route::get('/RezervasyontakvimiDetay/{id}','WebController@rezervasyondetay')->name('.rezervasyontakvimi.detay');
    Route::post('/Rezervasyonyap','WebController@rezervasyonyap')->name('.rezervasyon.post');
    Route::get('/Salonlar','WebController@salonlar')->name('.salonlar');
    Route::get('/Duyurular/{duyuru?}','WebController@duyurular')->name('.duyurular');
    Route::get('/ZiyaretciDefteri','WebController@ziyaretcidefteri')->name('.ziyaretcidefteri');
    Route::post('/ZiyaretciDefteri','WebController@ziyaretcidefteripost')->name('.ziyaretcidefteri.post');
    Route::get('/Iletisim','WebController@iletisim')->name('.iletisim');
    Route::post('/Iletisim','WebController@iletisimpost')->name('.iletisim.post');
});



