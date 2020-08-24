@extends('layouts.webpages')
@section('title',"Hizmetler - ".cekAyar('site-basligi'))

@section('ogtitle',is_array($hizmetler)?'Hizmetler':$hizmetler->sayfatitle)
@section('ogsitename',env('APP_NAME'))
@section('ogsection',is_array($hizmetler)?'Düğün Salonu Hizmet Listesi':$hizmetler->metaicerik))
@section('ogurl',url()->current())
@section('ogimage',is_array($hizmetler)?cekAyar('logo'):$hizmetler->image))


@section('content')
    @if($liste)
        <div class="row mt-3">
           @foreach($hizmetler as $hzm)
            <div class="col-md-6 mt-2">
                <div class="hizmetContainer">
                    <div class="row bg-grey">
                        <div class="col-4 p-0 m-0">
                            <img src="{{$hzm->image}}" class="img-fluid">
                        </div>
                        <div class="col-8">
                            <div class="hizmetler text-left">
                                <a href="{{route('web.hizmetler',$hzm->seourl)}}" class="hizmetLink hl">{{$hzm->sayfatitle}}</a>
                                <a href="{{route('web.hizmetler',$hzm->seourl)}}" class="hizmetLinkDetay hld text-info">Detayları Görmek İçin Tıkla</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    @endforeach
        </div>

    @else

        <div class="row">

            <div class="col-md-3">
                <img src="{{$hizmet->image}}" class="duyuruImg">
            </div>
            <div class="offset-1"></div>
            <div class="col-md-8 mt-4">
                <h3 class="mb-3 letterSpace-3 font-weight-lighter text-dark">{{$hizmet->sayfatitle}}</h3>
                {!! $hizmet->icerik !!}
            </div>
        </div>
    @endif
@endsection
