<?php

namespace App\Http\Controllers\Yonetim;

use App\Http\Controllers\Controller;
use App\Http\Controllers\RedirectController;
use App\Http\Requests\HizmetlerRequest;
use Illuminate\Http\Request;
use App\Models\Hizmetler;
use App\Traits\UploadTrait;
use Illuminate\Support\Str;

class HizmetlerController extends RedirectController
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
        $hizmetler = Hizmetler::all();
        return view('Yonetim.hizmetler.index',compact('hizmetler'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Yonetim.hizmetler.ekle');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HizmetlerRequest $request)
    {
        //

        $hizmet = new Hizmetler();
        $hizmet->seourl = Str::slug($request->sayfatitle);
        $hizmet->sayfatitle = $request->sayfatitle;
        $hizmet->metaicerik = $request->metaicerik;
        $hizmet->icerik = $request->icerik;
        $hizmet->sira = $request->sira;
        $hizmet->keyword = $request->keyword;
        $resim = $request->file('image');
        $name = Str::slug($request->sayfatitle)."-".time();
        $klasor = "/resim/hizmetler/";
        $dosyaYeri = $klasor.$name.'.'.$resim->getClientOriginalExtension();
        $this->uploadOne($resim,$klasor,'public',$name);
        $hizmet->image = $dosyaYeri;
        if($hizmet->save())
        {

            return $this->success('Ekleme Başarılı');
        } else {
            return $this->fail('Hata Oluştu');
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
        $hizmet = Hizmetler::where('id',$id)->first();
        return view('Yonetim.hizmetler.duzenle',compact('hizmet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HizmetlerRequest $request, $id)
    {
        //

        $hizmet = Hizmetler::where('id',$id)->first();
        $hizmet->seourl = Str::slug($request->sayfatitle);
        $hizmet->sayfatitle = $request->sayfatitle;
        $hizmet->metaicerik = $request->metaicerik;
        $hizmet->icerik = $request->icerik;
        $hizmet->sira = $request->sira;
        $hizmet->keyword = $request->keyword;
        if($request->has('image')) {
            unlink(storage_path('app/public'.$hizmet->image));
            $resim = $request->file('image');
            $name = Str::slug($request->sayfatitle) . "-" . time();
            $klasor = "/resim/hizmetler/";
            $dosyaYeri = $klasor . $name . '.' . $resim->getClientOriginalExtension();
            $this->uploadOne($resim, $klasor, 'public', $name);
            $hizmet->image = $dosyaYeri;
        }
        if($hizmet->save())
        {

            return $this->success('Güncelleme Başarılı');
        } else {
            return $this->fail('Hata Oluştu');
        }

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
        $hizmetler = Hizmetler::where('id',$id)->first();

        if($hizmetler) {
           unlink(storage_path('app/public'.$hizmetler->image));
            $hizmetler->delete();



            return ['status'=>'ok','message'=>'Silme İşlemi Başarılı'];
        }
        return ['status'=>'err','message'=>'Silme İşlemi Başarısız'];
    }
}
