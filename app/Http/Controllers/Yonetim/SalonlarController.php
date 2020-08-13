<?php

namespace App\Http\Controllers\Yonetim;

use App\Http\Controllers\Controller;
use App\Http\Controllers\RedirectController;
use App\Models\Salonlar;
use App\Models\Sayfalar;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SalonlarController extends RedirectController
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
        $salonlar = Salonlar::paginate(20);
        return view('Yonetim.salonlar.index',compact('salonlar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Yonetim.salonlar.ekle');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate(
            [
                'adi'=>'required|max:150',
                'aciklama'=>'required',
                'keyword'=>'required|max:250',
                'image'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]
        );

        $salon = new Salonlar();
        $salon->adi = $request->adi;
        $salon->aciklama = $request->aciklama;
        $salon->keyword = $request->keyword;
        if($request->has('image')) {
            $resim = $request->file('image');
            $name = Str::slug($request->adi)."-".time();
            $klasor ='/resim/salonlar/';
            $dosyaYeri = $klasor.$name.'.'.$resim->getClientOriginalExtension();
            $this->uploadOne($resim,$klasor,'public',$name);
            $salon->image = $dosyaYeri;
        }

        if($salon->save())
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
        $s = Salonlar::whereId($id)->firstOrFail();
        return view('Yonetim.salonlar.duzenle',compact('s'));

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
        $request->validate(
            [
                'adi'=>'required|max:150',
                'aciklama'=>'required',
                'keyword'=>'required|max:250',
                'image'=>'image|mimes:jpeg,png,jpg,gif|max:2048'
            ]
        );

        $salon = Salonlar::whereId($id)->firstOrFail();
        $salon->adi = $request->adi;
        $salon->aciklama = $request->aciklama;
        $salon->keyword = $request->keyword;
        if($request->has('image')) {
           unlink(storage_path('/app/public'.$salon->image));
            $resim = $request->file('image');
            $name = Str::slug($request->adi)."-".time();
            $klasor ='/resim/salonlar/';
            $dosyaYeri = $klasor.$name.'.'.$resim->getClientOriginalExtension();
            $this->uploadOne($resim,$klasor,'public',$name);
            $salon->image = $dosyaYeri;
        }

        if($salon->save())
        {
            return $this->success('Güncelleme Başarılı');
        } else {
            return $this->fail('Kayıt Başarısı');
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
        $salon = Salonlar::where('id',$id)->first();


        if($salon) {

            unlink(storage_path().'/app/public'.$salon->image);
            $salon->delete();



            return ['status'=>'ok','message'=>'Silme İşlemi Başarılı'];
        }
        return ['status'=>'err','message'=>'Silme İşlemi Başarısız'];
    }
}
