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
use App\Models\Rezervasyonlar;
use App\Models\Sayfalar;
use App\Models\Video;
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
    function rezervasyonyap(Request $req){
        $req->validate([
            'adsoyad'=>'required|max:150',
            'tarih'=>'date|required|after_or_equal:'.date('Y-m-d'),
            'telefon'=>'required|max:15',
            'salon'=>'required|numeric',
        ]);
        $r = new Rezervasyonlar();
        $r->adsoyad = $req->adsoyad;
        $r->salon_id = $req->salon;
        $r->tarih = $req->tarih;
        $r->telefon = $req->telefon;
        $r->not = 'GELEN REZERVASYON';
        $r->durum = 0;
        if($r->save())
        return $this->success('Rezervasyonunuz Yöneticilerimize Ulaştı! En Kısa Sürede Size Dönüş Yapılacaktır.');
        return $this->fail('Tanımlanmayan bir hata oluştu');

    }

    function hizmetler($pg=null)
    {
        $sayfa =(object) ['sayfatitle'=>'Hizmetler'];
        if(is_null($pg)) //sayfa değişkeni yoksa hizmetler sayfasını açacak!
        {
            $hizmetler = Hizmetler::orderBy('sira','asc')->get();
            $liste = true;
            return view('Web.hizmetler',compact('hizmetler','liste','sayfa'));
        }

        $hizmet = Hizmetler::where('seourl',$pg)->first();
        $liste = false;
        $sayfa =(object) ['sayfatitle'=>$hizmet->sayfatitle];
        return view('Web.hizmetler',compact('hizmet','liste','sayfa'));

    }
    function salonlar($salonid = null)
    {
        $durum = true;

        if($salonid)
        {
            $durum = false;
            $salonlar = Galeri::whereYer('salon'.$salonid)->whereDurum(1)->orderBy('sira','asc')->paginate(9);
            $videolar = Video::where('salon_id',$salonid)->orderBy('sira','asc')->paginate(9);
            $salon = Salonlar::whereId($salonid)->first();
            $sayfa =(object) ['sayfatitle'=>$salon->adi];
        } else {
            $sayfa =(object) ['sayfatitle'=>'Salonlar'];
            $salonlar = Salonlar::all();
            $videolar =null;
        }
        return view('Web.salonlar',compact('salonlar','durum','sayfa','videolar'));
    }
    function duyurular($duyuru = null)
    {
        $sayfa =(object) ['sayfatitle'=>'Duyurular'];
        if(is_null($duyuru))
        {
            $duyurular = Duyurular::all();
            $durum = true;
            return view('Web.duyurular',compact('duyurular','durum','sayfa'));
        }
        $duyurular = Duyurular::whereSeourl($duyuru)->firstOrFail();
        $durum = false;
        $sayfa =(object) ['sayfatitle'=>$duyurular->duyurutitle];
        return view('Web.duyurular',compact('duyurular','durum','sayfa'));

    }
    function ziyaretcidefteri()
    {
        $yorumlar = Ziyaretcidefteri::whereDurum(1)->orderBy('created_at','desc')->paginate(10);
        $sayfa =(object) ['sayfatitle'=>'Ziyaretçi Defteri'];
        return view('Web.ziyaretcidefteri',compact('yorumlar','sayfa'));

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
        $sayfa =(object) ['sayfatitle'=>'İletişim Sayfası'];
        return view('Web.iletisim',compact('sayfa'));

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
        $salonlar = Salonlar::all();
        return view('Web.rezervasyontakvimi',compact('salonlar'));
    }
    public function rezervasyondetay($id)
    {
        $salonlar = Salonlar::whereId($id)->firstOrFail();
        $gunler = Rezervasyonlar::select('tarih')->whereDurum(1)->where('salon_id',$id)->whereDate('tarih','>',date('Y-m-d'))->pluck('tarih');

      return view('Web.rezervasyondetay',compact('gunler','salonlar'));
    }
}
