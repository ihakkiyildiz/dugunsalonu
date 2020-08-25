@extends('layouts.web')
@section('title', 'Rezervasyon Takvimi - ' . cekAyar('site-basligi'))
@section('ogtitle', 'Rezervasyon Listesi')
@section('ogsitename', env('APP_NAME'))
@section('ogsection', cekAyar('site-basligi') . ' - Rezervasyon Listesi')
@section('ogurl', url()->current())
@section('ogimage', cekAyar('logo'))
@section('content')
    <section class="container-fluid m-0 p-0">

        <div class="container">
            <div class="row">
                @foreach ($salonlar as $s)
                    <div class="col-md-4 animated-clone fadeIn-clone my-4">
                        <div class="options-container-clone fx-item-zoom-in-clone">
                            <img class="img-fluid options-item-clone kutu" src="{{ $s->image }}" alt="">
                            <div class="options-overlay-clone bg-black-75">
                                <div class="options-overlay-content-clone">
                                    <h5 class="h4-clone text-white mb-2">{{ $s->adi }}</h5>
                                    <h6 class="h6-clone text-white mb-3 text-capitalize font-weight-lighter">Bu düğün salonunda rezervasyon yap!
                                    </h6>
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
    <style>
        .kutu{
            width: 100%;
            height: 300px;
            object-fit: contain;
            -o-object-fit: contain;
            object-position: center;
            -o-object-position: center
        }
        .animated-clone {
            -webkit-animation-duration: 1.2s;
            animation-duration: 1.2s;
            -webkit-animation-fill-mode: both;
            animation-fill-mode: both;
        }

        .fadeIn-clone {
            -webkit-animation-name: fadeIn;
            animation-name: fadeIn;
        }

        .options-container-clone {
            position: relative;
            overflow: hidden;
            z-index: 1;
            display: block;
        }

        .options-container-clone .options-item-clone {
            transition: -webkit-transform .4s ease-out;
            transition: transform .4s ease-out;
            transition: transform .4s ease-out, -webkit-transform .4s ease-out;
            will-change: transform;
        }

        .options-container-clone .options-overlay-clone {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-pack: center;
            justify-content: center;
            -ms-flex-align: center;
            align-items: center;
            position: absolute;
            top: -2px;
            right: -2px;
            bottom: -2px;
            left: -2px;
            z-index: 2;
            content: '';
            opacity: 0;
            visibility: hidden;
            transition: all .3s ease-in;
            will-change: opacity, transform;
            background: rgba(0,0,0,.7)
        }

        .options-container-clone:hover .options-overlay-clone {
            opacity: 1;
            visibility: visible;
        }

        .options-container-clone .options-overlay-content-clone {
            text-align: center;
        }

        .fx-overlay-zoom-in-clone .options-overlay-clone {
            -webkit-transform: scale(0, 0);
            transform: scale(0, 0);
        }

        .fx-overlay-zoom-in-clone:hover .options-overlay-clone {
            -webkit-transform: scale(1, 1);
            transform: scale(1, 1);
        }

        @media (max-width: 767.98px) {
            .options-container-clone .options-overlay-clone {
                display: none;
            }

            .options-container-clone:hover .options-overlay-clone {
                display: -ms-flexbox;
                display: flex;
            }
            .fx-item-zoom-in-clone:hover .options-item-clone {
                -webkit-transform: scale(1.2, 1.2);
                transform: scale(1.2, 1.2);
            }
        }

        @-webkit-keyframes fadeIn {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

    </style>
@endsection
