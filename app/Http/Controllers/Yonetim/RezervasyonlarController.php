<?php

namespace App\Http\Controllers\Yonetim;

use App\DataTables\RezervasyonlarTableDataTable;
use App\Http\Controllers\Controller;
use App\Http\Controllers\RedirectController;
use App\Http\Requests\RezervasyonlarRequest;
use App\Models\Rezervasyonlar;
use App\Models\Salonlar;
use Illuminate\Http\Request;
use Yajra\DataTables\Contracts\DataTable;

class RezervasyonlarController extends RedirectController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(RezervasyonlarTableDataTable $table)
    {
        //
        Rezervasyonlar::where('okundu',null)->update(['okundu'=>date('Y-m-d H:d:i')]);
        $query = Rezervasyonlar::whereDate('tarih','>=',date('Y-m-d'))->get();

        return $table->render('Yonetim.rezervasyonlar.index');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $dugunsalonlari = Salonlar::all();
        return view('Yonetim.rezervasyonlar.ekle',compact('dugunsalonlari'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RezervasyonlarRequest $request)
    {
        //
        $rezervasyon = new Rezervasyonlar();
        $rezervasyon->adsoyad = $request->adsoyad;
        $rezervasyon->not = $request->not;
        $rezervasyon->durum = 1;
        $rezervasyon->salon_id = $request->salon_id;
        $rezervasyon->tarih = $request->tarih;
        $rezervasyon->telefon = $request->telefon;
        if($rezervasyon->save())
        {
            return $this->success('Rezervasyon Yapıldı');
        }
        return $this->fail('Bir Problem Oluştu');

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
        $rez = Rezervasyonlar::whereId($id)->firstOrFail();
        $dugunsalonlari = Salonlar::all();
        return view('Yonetim.rezervasyonlar.duzenle',compact('rez','dugunsalonlari'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RezervasyonlarRequest $request, $id)
    {
        $rezervasyon = Rezervasyonlar::whereId($id)->firstOrFail();
        if($request->getMethod()=='PATCH')
        {
            $rezervasyon->durum = !$rezervasyon->durum;
            if($rezervasyon->save())
                return ['status'=>'ok'];
        }


        $rezervasyon->adsoyad = $request->adsoyad;
        $rezervasyon->tarih = $request->tarih;
        $rezervasyon->telefon = $request->telefon;
        $rezervasyon->salon_id = $request->salon_id;
        $rezervasyon->not = $request->not;
        $rezervasyon->durum = $request->has('durum')?1:0;
        if($rezervasyon->save())
            return $this->success('Güncelleme Başarılı');
        return $this->fail('Bir Hata Oluştu');
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
        if(Rezervasyonlar::whereId($id)->delete())
            return ['status'=>'ok'];
        return ['status'=>'err'];
    }
}
