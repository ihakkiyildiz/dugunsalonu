@extends('layouts.webpages')
@section('title', 'Hizmetler - ' . cekAyar('site-basligi'))

@section('ogtitle', !empty($hizmetler) ? 'Hizmetler' : $hizmet->sayfatitle)
@section('ogsitename', env('APP_NAME'))
@section('ogsection', !empty($hizmetler) ? 'Düğün Salonu Hizmet Listesi' : $hizmet->metaicerik)
@section('ogurl', url()->current())
@section('ogimage', !empty($hizmetler) ? cekAyar('logo') : $hizmet->image)


@section('content')
    @if ($liste)
        <div class="row mt-3">
            @foreach ($hizmetler as $hzm)
                <div class="col-md-6 mt-2">
                    <div class="hizmetContainer">
                        <div class="row bg-grey">
                            <div class="col-4 p-0 m-0">
                                <img src="{{ $hzm->image }}" class="img-fluid hizmetlerImg">
                            </div>
                            <div class="col-8 bg">
                                <div class="hizmetler text-left">
                                    <a href="{{ route('web.hizmetler', $hzm->seourl) }}"
                                        class="hizmetLink">{{ $hzm->sayfatitle }}</a>
                                    <a href="{{ route('web.hizmetler', $hzm->seourl) }}"
                                        class="hizmetLinkDetay text-info">Detayları Görmek İçin Tıkla</a>
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
                <img src="{{ $hizmet->image }}" class="duyuruImg">
            </div>
            <div class="offset-1"></div>
            <div class="col-md-8 mt-4">
                <h3 class="mb-3 letterSpace-3 font-weight-lighter text-dark">{{ $hizmet->sayfatitle }}</h3>
                {!! $hizmet->icerik !!}
            </div>
        </div>
    @endif
@endsection
@section('css')
    <style>
        .hizmetler {
            width: 100%;
            height: 100px;
            background-color: transparent
        }

        .hizmetLink {
            color: rgb(46, 41, 41);
            position: relative;
            left: 5%;
            font-size: 18px;
            font-weight: 400;
            word-wrap: inherit;
            top: 20%;
        }

        .hizmetLink:hover,
        .hizmetLinkDetay:hover {
            text-decoration: none;
            color: rgb(145, 118, 32)
        }

        .hizmetlerImg {
            object-fit: cover;
            height: 100px;
            width: 100%;
            object-position: center
        }

        .hizmetLinkDetay {
            position: absolute;
            left: 8.5%;
            font-size: 8pt !important;
            top: 55%;
        }

        @media (max-width: 760px) {
            .hizmetLink {
                color: rgb(46, 41, 41);
                position: absolute;
                left: 5%;
                font-size: 12pt;
                font-weight: 400;
                top: 10%;

            }

            .hizmetlerImg {
                object-fit: cover;
                height: 100px;
                object-position: center
            }

            .hizmetLinkDetay {
                position: absolute;
                left: 5%;
                font-size: 7.5pt;
                top: 60%;
            }
        }

    </style>
@endsection
