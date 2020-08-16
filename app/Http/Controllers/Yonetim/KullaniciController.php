<?php

namespace App\Http\Controllers\Yonetim;

use App\Http\Controllers\Controller;
use App\Http\Controllers\RedirectController;
use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class KullaniciController extends RedirectController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kull = User::paginate(10);
        return view('Yonetim.kullanicilar.index',compact('kull'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Yonetim.kullanicilar.ekle');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $kull = new User();
        $kull->name = $request->name;
        $kull->surname = $request->surname;
        $kull->email = $request->email;
        $kull->password = Hash::make($request->password);
        if($kull->save())
            return $this->success('Kullanıcı Eklendi');
        return $this->fail('Kullanıcı Eklenmedi');
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
        $u = User::whereId($id)->firstOrFail();
        return view('Yonetim.kullanicilar.duzenle',compact('u'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $u = User::whereId($id)->firstOrFail();
        $u->name = $request->name;
        $u->surname = $request->surname;
        $u->email = $request->email;
        $u->password = Hash::make($request->password);
        if($u->save())
            return $this->success('Güncelleme Başarılı');
        return $this->fail('Güncelleme Başarısız');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(User::whereId($id)->delete())
            return ['status'=>'ok'];
        return ['status'=>'err'];
    }
}
