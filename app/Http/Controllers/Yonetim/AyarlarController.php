<?php

namespace App\Http\Controllers\Yonetim;

use App\Http\Controllers\Controller;
use App\Models\Ayarlar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class AyarlarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ayar = tumAyarlar();

        return view('Yonetim.ayarlar.index',compact('ayar'));
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
        //
        try {


            $data = $request->except('_token','_method');
        foreach ($data as $k=>$v)
        {
            Ayarlar::where('key',$k)->update(['value'=>$v]);
        }
            Cache::forget('ayarlar');
        return redirect()->back()
        ->with('status','ok')
        ->with('message','Güncelleme Başarılı')
        ->with('type','success')
        ->with('icon','fa-check');
        } catch (\Exception $e) {
        return redirect()->back()
            ->with('status','ok')
            ->with('message',$e->getMessage())
            ->with('type','danger')
            ->with('icon','fa-exclamation');

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
