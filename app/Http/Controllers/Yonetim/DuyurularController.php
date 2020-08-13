<?php

namespace App\Http\Controllers\Yonetim;

use App\Http\Controllers\Controller;
use App\Http\Controllers\RedirectController;
use App\Models\Duyurular;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DuyurularController extends RedirectController
{
    use UploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sayfa = Duyurular::all();
        return view('yonetim.duyurular.index',compact('sayfa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('yonetim.duyurular.ekle');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$request->validate([''=>'']);

        $duyuru = new Duyurular();
        $duyuru->duyurutitle = $request->duyurutitle;
        $duyuru->seourl = Str::slug($duyuru->duyurutitle);
        $duyuru->durum = 1;
        $duyuru->icerik = $request->icerik;
        $duyuru->metaicerik = $request->metaicerik;
        $duyuru->keyword = $request->keyword;
        if($request->has('image')) {
            $resim = $request->file('image');
            $name = Str::slug($request->duyurutitle)."-".time();
            $klasor ='/resim/duyurular/';
            $dosyaYeri = $klasor.$name.'.'.$resim->getClientOriginalExtension();
            $this->uploadOne($resim,$klasor,'public',$name);
            $duyuru->image = $dosyaYeri;
        }


        if($duyuru->save())
        {
            return $this->success('Kayıt Başarılı');
        } else {
            return $this->fail('Kayıt Başarısı');
        }

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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
    }
}
