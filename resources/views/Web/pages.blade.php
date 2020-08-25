@extends('layouts.webpages')
@section('title',$sayfa->sayfatitle." - ".cekAyar('site-basligi'))
@section('ogtitle',$sayfa->sayfatitle)
@section('ogsitename',env('APP_NAME'))
@section('ogsection',$sayfa->metaicerik)
@section('ogurl',url()->current())
@section('ogimage',$sayfa->image)
@section('content')
    <section class="container mt-3">

        <div class="row">
            <div class="col-md-12 mt-4">
                {!! $sayfa->icerik !!}
            </div>
        </div>

    </section>
@endsection

@section('css')
    <style>
        .hakkindaImg {
            width: 500px;
            height: 310px;
            object-fit: cover;
            object-position: center;
        }
        @media (max-width: 760px) {
            .hakkindaImg{
                width: 100%
            }
        }

    </style>
@endsection
