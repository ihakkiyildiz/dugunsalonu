@extends('layouts.web')
@section('title',"Rezervasyon Takvimi - ".cekAyar('site-basligi'))
@section('content')
    <section class="container-fluid m-0 p-0">

        <div class="container">
            <div class="row">
                @foreach ($salonlar as $s)
                    <div class="col-md-4 animated fadeIn my-4">
                        <div class="options-container fx-item-zoom-in">
                            <img class="img-fluid options-item" src="{{ $s->image }}" alt="">
                            <div class="options-overlay bg-black-75">
                                <div class="options-overlay-content">
                                    <h3 class="h4 text-white mb-2">{{ $s->adi }}</h3>
                                    <h4 class="h6 text-white-75 mb-3 text-capitalize">Bu düğün salonunda rezervasyon yap!
                                    </h4>
                                    <a class="btn btn-sm btn-primary"
                                        href="{{ route('web.rezervasyontakvimi.detay', $s->id) }}"> TARİH SEÇ
                                        <i class="fa fa-pencil-alt mr-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
@section('css')
<link rel="stylesheet" id="css-main" href="{{ asset('assets/css/dashmix.min.css') }}">
@endsection

