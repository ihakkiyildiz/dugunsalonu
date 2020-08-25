@extends('layouts.backend')
@section('content')
    <div class="content">
        <div class="block block-rounded block-bordered block-fx-shadow">
            <div class="block-header block-header-default bg-header-dark">
                <h3 class="block-title text-white-75">Vadi Park Yönetim Paneli</h3>
            </div>
            <div class="block-content p-0 m-0">
                <div class="bg-image" style="background-image: url('{{asset('assets/media/photos/photo15@2x.jpg')}}');">
                    <div class="hero bg-white-50">
                        <div class="hero-inner">
                            <div class="content content-full text-center">
                                <div class="row">
                                    <div class="col-md-6 col-xl-4">
                                        <a class="block block-rounded bg-gd-sea"
                                            href="{{ route('yonetim.Rezervasyonlar.index') }}">
                                            <div
                                                class="block-content block-content-full d-flex align-items-center justify-content-between">
                                                <div class="item">
                                                    <i class="fab fa-2x fa-elementor text-white-75"></i>
                                                </div>
                                                <div class="ml-3 text-right">
                                                    <p class="text-white font-size-base font-w600 mb-0">
                                                        <span>{{ \App\Models\Rezervasyonlar::where('okundu', null)->count() }}</span>
                                                        Tane Onaylanmamış Rezervasyon
                                                    </p>
                                                    <p class="text-white-75 mb-0">
                                                        Rezervasyonlar
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="col-md-6 col-xl-4">
                                        <a class="block block-rounded bg-gd-sea"
                                            href="{{ route('yonetim.ZiyaretciDefteri.index') }}">
                                            <div
                                                class="block-content block-content-full d-flex align-items-center justify-content-between">
                                                <div class="item">
                                                    <i class="far fa-2x fa-envelope text-white-75"></i>
                                                </div>
                                                <div class="ml-3 text-right">
                                                    <p class="text-white font-size-lg font-w600 mb-0">
                                                        <span>{{ \App\Models\Ziyaretcidefteri::where('okundu', null)->count() }}</span>
                                                        Tane Onaylanmamış Mesaj
                                                    </p>
                                                    <p class="text-white-75 mb-0">
                                                        Ziyaretçi Notu
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="col-md-6 col-xl-4">
                                        <a class="block block-rounded bg-gd-sea"
                                            href="{{ route('yonetim.Duyurular.index') }}">
                                            <div
                                                class="block-content block-content-full d-flex align-items-center justify-content-between">
                                                <div class="item">
                                                    <i class="fa fa-2x fa-bullhorn text-white-75"></i>
                                                </div>
                                                <div class="ml-3 text-right">
                                                    <p class="text-white font-size-base font-w600 mb-0">
                                                        <span>{{\App\Models\Duyurular::count()}}</span> Aktif Duyuru
                                                    </p>
                                                    <p class="text-white-75 mb-0">
                                                        Duyurular
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                                <div class="row my-5">
                                    <div class="col-md-8 col-xl-8 mx-auto">
                                        <div class="block block-rounded bg-gd-sea">
                                            <div class="block-content">
                                                <p
                                                    class="text-white text-uppercase font-size-sm font-w700 text-center mt-2 mb-4">
                                                    İSTATİSTİKLER
                                                </p>
                                                <a class="block block-rounded bg-black-10 mb-2" href="javascript:void(0)">
                                                    <div
                                                        class="block-content block-content-sm block-content-full d-flex align-items-center justify-content-between">
                                                        <div class="mr-3">
                                                            <p class="text-white font-size-h3 font-w300 mb-0">
                                                                {{\App\Models\Rezervasyonlar::whereDate('tarih','>=',date('Y-m-d'))->count()}}
                                                            </p>
                                                            <p class="text-white-75 mb-0">
                                                                Toplam Rezervasyon Sayısı
                                                            </p>
                                                        </div>
                                                        <div class="item">
                                                            <i class="fab fa-2x fa-elementor text-white-50"></i>
                                                        </div>
                                                    </div>
                                                </a><a class="block block-rounded bg-black-10 mb-2"
                                                    href="javascript:void(0)">
                                                    <div
                                                        class="block-content block-content-sm block-content-full d-flex align-items-center justify-content-between">
                                                        <div class="mr-3">
                                                            <p class="text-white font-size-h3 font-w300 mb-0">
                                                                {{\App\Models\Ziyaretcidefteri::count()}}
                                                            </p>
                                                            <p class="text-white-75 mb-0">
                                                                Toplam Ziyaretçi Yorumu
                                                            </p>
                                                        </div>
                                                        <div class="item">
                                                            <i class="fa fa-2x fa-envelope text-white-50"></i>
                                                        </div>
                                                    </div>
                                                </a>
                                                <a class="block block-rounded bg-black-10 mb-2" href="javascript:void(0)">
                                                    <div
                                                        class="block-content block-content-sm block-content-full d-flex align-items-center justify-content-between">
                                                        <div class="mr-3">
                                                            <p class="text-white font-size-h3 font-w300 mb-0">
                                                                {{\App\Models\Duyurular::count()}}
                                                            </p>
                                                            <p class="text-white-75 mb-0">
                                                                Toplam Duyuru Sayısı
                                                            </p>
                                                        </div>
                                                        <div class="item">
                                                            <i class="fa fa-2x fa-bullhorn text-white-50"></i>
                                                        </div>
                                                    </div>
                                                </a>
                                                <a class="block block-rounded bg-black-10 mb-2" href="javascript:void(0)">
                                                    <div
                                                        class="block-content block-content-sm block-content-full d-flex align-items-center justify-content-between">
                                                        <div class="mr-3">
                                                            <p class="text-white font-size-h3 font-w300 mb-0">
                                                                {{\App\Models\Hizmetler::count()}}
                                                            </p>
                                                            <p class="text-white-75 mb-0">
                                                                Aktif Hizmet Sayısı
                                                            </p>
                                                        </div>
                                                        <div class="item">
                                                            <i class="fab fa-2x fa-servicestack text-white-50"></i>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
