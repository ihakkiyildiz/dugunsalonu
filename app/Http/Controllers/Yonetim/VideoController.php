<?php

namespace App\Http\Controllers\Yonetim;

use App\Http\Controllers\RedirectController;
use App\Http\Requests\VideoRequest;
use App\Video;
use Illuminate\Http\Request;

class VideoController extends RedirectController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $videolar = Video::orderby('id','desc')->paginate(10);
        return view('Yonetim.video.index',compact('videolar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Yonetim.video.ekle');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VideoRequest $request)
    {
        //
        $v = new Video();
        $v->youtubelink = $request->youtubelink;
        $v->aciklama = $request->aciklama;
        $v->salon_id = $request->salon_id;
        $v->sira = $request->sira;
        $v->metaetiketler = $request->metaetiketler;
        if($v->save())
            return $this->success('Video Başarıyla Eklenmiştir.');
        return $this->fail('Video Eklenemedi');
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
        $v = Video::whereId($id)->firstOrFail();
        return view('Yonetim.video.duzenle',compact('v'));
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
        $v = Video::whereId($id)->firstOrFail();
        $v->youtubelink = $request->youtubelink;
        $v->aciklama = $request->aciklama;
        $v->salon_id = $request->salon_id;
        $v->sira = $request->sira;
        $v->metaetiketler = $request->metaetiketler;
        if($v->save())
            return $this->success('Video Başarıyla Güncellendi.');
        return $this->fail('Video Güncellenemedi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = Video::where('id',$id)->first();

        if($video) {
            $video->delete();



            return ['status'=>'ok','message'=>'Silme İşlemi Başarılı'];
        }
        return ['status'=>'err','message'=>'Silme İşlemi Başarısız'];

    }
}
