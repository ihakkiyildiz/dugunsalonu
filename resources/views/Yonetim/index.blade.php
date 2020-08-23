@extends('layouts.backend')
@section('content')




    <!-- Page Content -->
    <div class="content">
        <!-- Your Block -->
        <div class="block block-rounded block-bordered block-fx-shadow">
            <div class="block-header block-header-default">
                <h3 class="block-title">Vadi Park Yönetim Paneli</h3>
            </div>
            <div class="block-content">
                <div class="row">
                    <div class="col-md-6 col-xl-4">
                        <a class="block block-rounded bg-gd-sea" href="{{route('yonetim.ZiyaretciDefteri.index')}}">
                            <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                                <div class="item">
                                    <i class="far fa-2x fa-envelope text-white-75"></i>
                                </div>
                                <div class="ml-3 text-right">
                                    <p class="text-white font-size-lg font-w600 mb-0">
                                        <span>{{\App\Models\Ziyaretcidefteri::where('okundu',null)->count()}}</span> Tane Onaylanmamış Mesaj
                                    </p>
                                    <p class="text-white-75 mb-0">
                                        Ziyaretçi Notu
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
    
                    <div class="col-md-6 col-xl-4">
                        <a class="block block-rounded bg-gd-xwork" href="{{route('yonetim.Rezervasyonlar.index')}}">
                            <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                                <div class="item">
                                    <i class="fab fa-2x fa-elementor text-white-75"></i>
                                </div>
                                <div class="ml-3 text-right">
                                    <p class="text-white font-size-base font-w600 mb-0">
                                        <span>{{\App\Models\Rezervasyonlar::where('okundu',null)->count()}}</span> Tane Onaylanmamış Rezervasyon
                                    </p>
                                    <p class="text-white-75 mb-0">
                                        Rezervasyonlar
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Your Block -->
    </div>
    <!-- END Page Content -->


@endsection
