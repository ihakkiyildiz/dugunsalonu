<?php

namespace App\Http\Controllers\Yonetim;

use App\Http\Controllers\Controller;
use App\Http\Controllers\RedirectController;
use App\Models\Galeri;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GaleriController extends RedirectController
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
        $galeri = Galeri::paginate(10);
        return view('Yonetim.galeri.index',compact('galeri'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Yonetim.galeri.ekle');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
        'aciklama' => 'required|max:20',
        'link'=>'nullable',
        'yer'=>'required|in:galeri,alt,liste',
        'sira'=>'required|numeric',
        'resim' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $durum = $request->has('durum')?1:0;

        $resim = $request->file('resim');
        $name = Str::slug($request->aciklama)."-".time();
        $klasor = "/resim/".$request->yer."/";
        $dosyaYeri = $klasor.$name.'.'.$resim->getClientOriginalExtension();
        $this->uploadOne($resim,$klasor,'public',$name);
        $galeri = new Galeri();
        $galeri->aciklama = $request->aciklama;
        $galeri->link = $request->link;
        $galeri->yer = $request->yer;
        $galeri->sira = $request->sira;
        $galeri->resim = $dosyaYeri;
        $galeri->durum = $durum;
        if($galeri->save())
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
        $resim = Galeri::where('id',$id)->first();
        if($resim)
            return view('Yonetim.galeri.duzenle',compact('resim'));
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
        $request->validate([
            'aciklama' => 'required|max:20',
            'link'=>'nullable',
            'yer'=>'required|in:galeri,alt,liste',
            'sira'=>'required|numeric',
            'resim'=>'image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

        $durum = $request->has('durum')?1:0;

        if($request->has('resim')) {
            $resim = $request->file('resim');
            $name = Str::slug($request->aciklama) . "-" . time();
            $klasor = "/resim/" . $request->yer . "/";
            $dosyaYeri = $klasor . $name . '.' . $resim->getClientOriginalExtension();
            $this->uploadOne($resim, $klasor, 'public', $name);
        }
        $galeri = Galeri::where('id',$id)->first();
        $galeri->aciklama = $request->aciklama;
        $galeri->link = $request->link;
        $galeri->yer = $request->yer;
        $galeri->sira = $request->sira;
        if($request->has('resim')) {
            unlink(storage_path('app/public'.$galeri->resim));
            $galeri->resim = $dosyaYeri;

        }
        $galeri->durum = $durum;
        if($galeri->save())
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
        $galeri = Galeri::where('id',$id)->first();

        if($galeri)
        {
            unlink(storage_path().'/app/public'.$galeri->resim);
            $galeri->delete();


            return $this->success('Silme Başarılı');
        } else {
            return $this->fail('Hata Oluştu');
        }
    }
}
