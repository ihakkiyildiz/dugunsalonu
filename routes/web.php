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



});
Route::group(['as'=>'web','namespace'=>'Web'],function (){
    Route::get('/','WebController@index')->name('.index');
    Route::get('/Sayfa/{slug?}','WebController@sayfa')->name('.sayfa');
});


