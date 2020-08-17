@extends('layouts.webpages')
@section('content')
    <section class="container mt-3">
        <div class="row text-center">
            <div class="col-12">
                <img src="{{ $sayfa->image }}" class="hakkindaImg">
            </div>
        </div>
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
