<?php

namespace App\Http\Controllers\Yonetim;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hizmetler;
use App\Traits\UploadTrait;
use Illuminate\Support\Str;

class HizmetlerController extends Controller
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
    public function store(Request $request)
    {
        //
        $request->validate([
            'sayfatitle' => 'required|max:200',
            'metaicerik'=>'required',
            'icerik'=>'required',
            'sira'=>'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'keyword'=>'required'
            ]);
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

            return redirect()->back()
            ->with('status','ok')
            ->with('message','Ekleme Başarılı')
            ->with('type','success')
            ->with('icon','fa-check');
    } else {
        return redirect()->back()
            ->with('status','ok')
            ->with('message','Bir Problem Oluştu')
            ->with('type','danger')
            ->with('icon','fa-exclamation');
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
