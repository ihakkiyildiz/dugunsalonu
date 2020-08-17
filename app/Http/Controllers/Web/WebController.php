<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Yonetim\HizmetlerController;
use App\Models\Galeri;
use App\Models\Hizmetler;
use App\Models\Salonlar;
use App\Models\Sayfalar;
use Illuminate\Http\Request;

class WebController extends Controller
{
    //
    function index() {

        return view('Web.index');

    }
    function sayfa($slug)
    {

        $sayfa = Sayfalar::where('seourl',$slug)->first();
        if($sayfa)
            return view('Web.pages',compact('sayfa'));


    }

    function hizmetler($sayfa=null)
    {
        if(is_null($sayfa)) //sayfa değişkeni yoksa hizmetler sayfasını açacak!
        {
            $hizmetler = Hizmetler::orderBy('sira','asc')->get();
            $liste = true;
            return view('Web.hizmetler',compact('hizmetler','liste'));
        }

        $hizmet = Hizmetler::where('seourl',$sayfa)->first();
        $liste = false;
        return view('Web.hizmetler',compact('hizmet','liste'));

    }
    function salonlar()
    {
        $galeri = Galeri::whereYer('galeri')->get();
        return view('Web.salonlar',compact('galeri'));
    }
    function duyurular()
    {

    }
    function ziyaretcidefteri()
    {

    }
    function iletisim()
    {

    }
    public function rezervasyontakvimi()
    {
        return view('Web.rezervasyontakvimi');
    }
}
