<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\Yonetim\HizmetlerController;
use App\Http\Requests\ZiyaretciRequest;
use App\Models\Duyurular;
use App\Models\Galeri;
use App\Models\Hizmetler;
use App\Models\Salonlar;
use App\Models\Sayfalar;
use App\Models\Ziyaretcidefteri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class WebController extends RedirectController
{
    //
    function index() {
        $manset = Galeri::whereYer('liste')->orderBy('sira','asc')->whereDurum(1)->get();
        $altresimler = Galeri::whereYer('alt')->orderBy('sira','asc')->get();
        $hizmetler = Hizmetler::limit(6)->get();
        $duyurular = Duyurular::limit(4)->get();
        $salonlar = Salonlar::all();

        return view('Web.index',compact('hizmetler','duyurular','manset','altresimler','salonlar'));

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
    function ziyaretcidefteripost(ZiyaretciRequest $req)
    {

        $kayit = new Ziyaretcidefteri();
        $kayit->adsoyad = strip_tags($req->adsoyad);
        $kayit->email = strip_tags($req->email);
        $kayit->mesaj = strip_tags($req->mesaj);
        $kayit->durum = 0;
        if($kayit->save())
            return $this->success('Mesajınız Yöneticilerimize Ulaştı! Uygun Görülmesi Halinde En Kısa Sürede Yayınlanacaktır.');
       return $this->fail('Tanımlanmayan bir hata oluştu');
    }
    function iletisim()
    {
        return view('Web.iletisim');

    }
    function iletisimpost(Request $request)
    {
        $request->validate([
            'adsoyad'=>'required|max:50',
            'email'=>'required|email',
            'telefon'=>'required|max:15',
            'mesaj'=>'max:500|required'
        ]);
        $array = [
            'name'=>$request->adsoyad,
            'email'=>$request->email,
            'telefon'=>$request->telefon,
            'mesaj'=>$request->mesaj
        ];
        Mail::send('include.mail_formu', $array, function ($message) {
            $message->from('iletisim@formu.com', 'İletişim');
            $message->subject("İLETİŞİM FORMU");
            $message->to(cekAyar('email'));
        });
        return $this->success('Mailiniz tarafımıza ulaştı en yakın zamanda sizinle iletişime geçilecektir.');
    }
    public function rezervasyontakvimi()
    {
        return view('Web.rezervasyontakvimi');
    }
}
