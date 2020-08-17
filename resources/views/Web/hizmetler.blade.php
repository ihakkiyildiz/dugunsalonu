@extends('layouts.webpages')
@section('content')
    @if($liste)
        <div class="row mt-3">
           @foreach($hizmetler as $hzm)
            <div class="col-md-6">
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
                <img src="{{$hizmet->image}}" width="255" height="360">
            </div>
            <div class="col-md-8 mt-4">
                <h3 class="mb-3 letterSpace-3 font-weight-lighter text-dark">{{$hizmet->sayfatitle}}</h3>
                {!! $hizmet->icerik !!}
            </div>
        </div>
    @endif
@endsection
