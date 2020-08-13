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
        $duyurular = Duyurular::paginate(20);
        return view('yonetim.duyurular.index',compact('duyurular'));
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
        $request->validate(
            [
                'duyurutitle'=>'required|max:150',
                'icerik'=>'required',
                'metaicerik'=>'required|max:250',
                'keyword'=>'required|max:250',
                'image'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]
        );

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
        $d = Duyurular::whereId($id)->firstOrFail();
        return view('Yonetim.duyurular.duzenle',compact('d'));
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
                'duyurutitle'=>'required|max:150',
                'icerik'=>'required',
                'metaicerik'=>'required|max:250',
                'keyword'=>'required|max:250',
                'image'=>'image|mimes:jpeg,png,jpg,gif|max:2048'
            ]
        );

        $duyuru = Duyurular::whereId($id)->firstOrFail();
        $duyuru->duyurutitle = $request->duyurutitle;
        $duyuru->seourl = Str::slug($duyuru->duyurutitle);
        $duyuru->durum = $request->has('durum')?1:0;
        $duyuru->icerik = $request->icerik;
        $duyuru->metaicerik = $request->metaicerik;
        $duyuru->keyword = $request->keyword;
        if($request->has('image')) {
            unlink(storage_path('/app/public'.$duyuru->image));
            $resim = $request->file('image');
            $name = Str::slug($request->duyurutitle)."-".time();
            $klasor ='/resim/duyurular/';
            $dosyaYeri = $klasor.$name.'.'.$resim->getClientOriginalExtension();
            $this->uploadOne($resim,$klasor,'public',$name);
            $duyuru->image = $dosyaYeri;
        }


        if($duyuru->save())
        {
            return $this->success('Kayıt Başarılı Bir Şekilde Güncellendi');
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
        $duyuru = Duyurular::where('id',$id)->first();

        if($duyuru) {
            unlink(storage_path('app/public'.$duyuru->image));
            $duyuru->delete();



            return ['status'=>'ok','message'=>'Silme İşlemi Başarılı'];
        }
        return ['status'=>'err','message'=>'Silme İşlemi Başarısız'];

    }
}
