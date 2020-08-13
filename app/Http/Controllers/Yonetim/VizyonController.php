<?php

namespace App\Http\Controllers\Yonetim;

use App\Http\Controllers\Controller;
use App\Http\Controllers\RedirectController;
use App\Models\Sayfalar;
use Illuminate\Http\Request;

class VizyonController extends RedirectController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sayfa = Sayfalar::where('seourl','vizyon')->first();
        return view('Yonetim.sayfalar.vizyon',compact('sayfa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $request->validate([
            'sayfatitle'=>'required|max:100',
            'metaicerik'=>'required',
            'icerik'=>'required',
            'keyword'=>'required'
        ]);
        $kayit = Sayfalar::updateOrCreate(['seourl'=>$id],
            [
                'sayfatitle'=>$request->sayfatitle,
                'metaicerik'=>$request->metaicerik,
                'icerik'=>$request->icerik,
                'keyword'=>$request->keyword
            ]);
        if($kayit)
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
    }
}
