<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Yonetim\HizmetlerController;
use App\Models\Duyurular;
use App\Models\Galeri;
use App\Models\Hizmetler;
use App\Models\Salonlar;
use App\Models\Sayfalar;
use App\Models\Ziyaretcidefteri;
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
        $galeri = Galeri::whereYer('galeri')->whereDurum(1)->orderBy('sira','asc')->get();
        return view('Web.salonlar',compact('galeri'));
    }
    function duyurular($duyuru = null)
    {
        if(is_null($duyuru))
        {
            $duyurular = Duyurular::all();
            $durum = true;
            return view('Web.duyurular',compact('duyurular','durum'));
        }
        $duyurular = Duyurular::whereSeourl($duyuru)->firstOrFail();
        $durum = false;
        return view('Web.duyurular',compact('duyurular','durum'));

    }
    function ziyaretcidefteri()
    {
        $yorumlar = Ziyaretcidefteri::whereDurum(1)->orderBy('created_at','desc')->paginate(10);
        return view('Web.ziyaretcidefteri',compact('yorumlar'));

    }
    function iletisim()
    {
        return view('Web.iletisim');

    }
    public function rezervasyontakvimi()
    {
        return view('Web.rezervasyontakvimi');
    }
}
