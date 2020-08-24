<?php

namespace App\Http\Controllers\Yonetim;

use App\Http\Controllers\Controller;
use App\Http\Controllers\RedirectController;
use App\Http\Requests\ZiyaretciRequest;
use App\Models\Ziyaretcidefteri;
use Illuminate\Http\Request;

class ZiyaretciDefteriController extends RedirectController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $yorumlar = Ziyaretcidefteri::paginate(10);
        $zd = Ziyaretcidefteri::all()->sortByDesc('created_at');
        Ziyaretcidefteri::where('okundu',null)->update(['okundu'=>date('Y-m-d H:i:s')]);
        return view('Yonetim.ziyaretcidefteri.index',compact('zd', 'yorumlar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Yonetim.ziyaretcidefteri.ekle');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ZiyaretciRequest $request)
    {
        //
        $zd = new Ziyaretcidefteri();
        $zd->adsoyad = strip_tags($request->adsoyad);
        $zd->email = strip_tags($request->email);
        $zd->mesaj = strip_tags($request->mesaj);
        $zd->durum = 1;
        if($zd->save())
            return $this->success('Mesajınız Eklendi');
        return $this->fail('MEsaj Eklenemedi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $zd = Ziyaretcidefteri::whereId($id)->firstOrFail();
        return view('Yonetim.ziyaretcidefteri.duzenle',compact('zd'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ZiyaretciRequest $request, $id)
    {
        //
        $zd = Ziyaretcidefteri::whereId($id)->firstOrFail();
        if($request->getMethod()=='PATCH')
        {
            $zd->durum = !$zd->durum;
            if($zd->save())
                return ['satatus'=>'ok'];
            return ['satatus'=>'err'];
        }

        $zd->adsoyad = $request->adsoyad;
        $zd->email = $request->email;
        $zd->mesaj = $request->mesaj;
        $zd->durum = $request->has('durum')?1:0;
        if($zd->save())
            return $this->success('Mesaj Güncellendi');
        return $this->fail('Bir hata Oluştu');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if(Ziyaretcidefteri::whereId($id)->delete())
            return ['status'=>'ok'];
        return ['status'=>'err'];
    }
}
