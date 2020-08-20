@extends('layouts.web')
@section('content')
    <!--SLIDER-->
    <section class="container-fluid mt-3 m-0 p-0">
        <div id="sliderDesktop" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner itemSized">
                @foreach($manset as $m)
                    @if(empty($m->link))
                    <div class="carousel-item @if($loop->index==0) active @endif">
                    @else
                    <a href="{{$m->link}}" target="_blank" class="carousel-item @if($loop->index==0) active @endif">
                    @endif
                        <img src="{{$m->resim}}" class="d-block img-fluid w-100">
                     @if(empty($m->link))
                    </div>
                     @else

                    </a>
                    @endif
                    @endforeach

            </div>
        </div>
    </section>

    <!--PHOTO-->
    <!--ONLINE REZERVASYON MOBİL-->
    <section class="container text-center mt-3">
        <div class="row">
            <div class="col-12 col-md-6">
                <img src="./css/img/gelin-damat.jpg" class="img-thumbnail img-fluid">
            </div>

            <div class="col-12 col-md-6 text-left mt-4">
                <h2> <b>ONLINE</b> <br><span class="font-weight-lighter">REZERVASYON</span></h2>
                <small class="font-weight-lighter">Rezervasyonunuzu gönderdikten sonra sizinle irtibata
                    geçeceğiz</small>
                <div class="row mt-4">
                    <div class="col-12">
                        <form>

                            <div class="row">
                                <div class="col-md-6">
                                    <small class="text-muted font-weight-lighter fs-8">ADINIZ SOYADINIZ</small>
                                    <input type="text" class="form-control fs-10 customInput" id="isim"
                                        placeholder="ADINIZ SOYADINIZ">
                                </div>

                                <div class="col-md-6">
                                    <small class="text-muted font-weight-lighter fs-8">TELEFON NUMARANIZ</small>
                                    <input type="text" class="form-control fs-10 customInput" id="telNo"
                                        placeholder="TELEFON NUMARANIZ">
                                </div>
                            </div>
                            <br class="d-none d-md-block">
                            <div class="row">
                                <div class="col-md-4">
                                    <small class="text-muted font-weight-lighter fs-8">Düğün Salonu</small>
                                    <select id="rezersyonTipi" class="form-control fs-10 customInput">
                                        <option disabled selected>~Lütfen Seçiniz~</option>
                                        @foreach($salonlar as $s)
                                        <option value="{{$s->id}}">{{$s->adi}}</option>
                                            @endforeach
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <small class="text-muted font-weight-lighter fs-8">REZERVASYON TARİHİ</small>
                                    <input type="date" class="form-control fs-10 customInput" id="tarih" value="{{date('Y-m-d')}}" min="{{date('Y-m-d')}}">
                                </div>

                                <div class="col-md-4">
                                    <small class="text-muted font-weight-lighter fs-8">&nbsp;</small>
                                    <input type="submit" class="fs-10 btn btn-block btnSubmit" value="GÖNDER">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--AREA-->
    <section class="container-fluid p-0 m-0 mt-5">
        <div class="carousel">
            <div class="carousel-inner">
                <div class="itemSized itemSizedHizmetler">
                    <div class="overlay bg-dark-o8"></div>

                    <div class="carousel-caption sliderText text-uppercase">
                        <h2 class="letterSpace-4">Hizmet <span class="font-weight-lighter">programlarımız</span></h2>
                        <small class="fs-8 font-weight-lighter">Her şey kusursuz olsun istiyorsanız, doğru
                            yerdesiniz.</small>
                        <div class="row mt-5">
                            @foreach($hizmetler as $h)
                            <div class="col-md-4">
                                <div class="hizmetler text-left">
                                    <h1 class="hizmetIndexText"> 1. </h1>
                                    <a href="{{route('web.hizmetler',$h->seourl)}}" class="hizmetLink">{{$h->sayfatitle}}</a>
                                    <a href="{{route('web.hizmetler',$h->seourl)}}" class="hizmetLinkDetay">Detayları Görmek İçin
                                        Tıkla</a>
                                </div>

                            </div>
                            @endforeach

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!--HABERLER DUYURULAR-->
    <section class="container text-center mt-5">
        <div class="row mb-5">
            <div class="col-12">
                <h2 class="letterSpace-4 font-weight-lighter" style="color:rgb(56, 56, 56)">DUYURULAR</h2>
                <span class="font-weight-lighter text-muted letterSpace-4">Salonlarımızdan Duyurular</span>
            </div>
        </div>
        <div class="row">
            @foreach($duyurular as $d)
            <div class="col-md-3 mt-3 mt-md-0">
                <div class="containerImg">
                    <img src="{{$d->image}}" class="image" alt="{{$d->keyword}}">
                    <div class="overlay2 overlayBottom">
                        <div class="text mt-4">
                            <h6 class="text-dark">{{$d->duyurutitle}}</h6>
                        </div>
                    </div>
                </div>
                <br class="d-block d-md-none">
                <a href="{{route('web.duyurular',$d->seourl)}}" class="btn btnSubmit text-white">Detayları Gör &nbsp;<i
                        class="fa fa-arrow-circle-right"></i></a>
                <br class="d-block d-md-none"> <br class="d-block d-md-none">
            </div>
            @endforeach

        </div>
    </section>

    <!--SALONUMUZDAN GÖRSELLER-->
    <section class="container-fluid mt-5 m-0 bg-dark-o8 slnmzsldr text-center">
        <div class="row mb-5">
            <div class="col-12">
                <h2 class="text-white letterSpace-4">SALONUMUZDAN <span class="font-weight-lighter">KARELER</span></h2>
                <hr class="bg-white hrStyle">
            </div>
        </div>
        <div class="col-md-12">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner itemSized">
                    @foreach($altresimler as $a)
                    <div class="carousel-item @if($loop->index==0) active @endif ">
                        <img class="d-block w-100" src="{{$a->resim}}" alt="First slide">
                    </div>
                    @endforeach

                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </a>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script src="{{ asset('assets/js/plugins/slick-carousel/slick.min.js') }}"></script>

    <script>
        jQuery(function() {
            Dashmix.helpers('slick');
        });

    </script>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/slick-carousel/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/slick-carousel/slick-theme.css') }}">
@endsection
