@extends('layouts.web')
@section('title',cekAyar('site-basligi'))
@section('ogtitle',cekAyar('site-basligi'))
@section('ogsitename',env('APP_NAME'))
@section('ogsection',)
@section('ogurl',url()->current())
@section('ogimage',cekAyar('logo'))


@section('content')
    <!--SLIDER-->
    <section class="container-fluid mt-4 m-0 p-0 mb-3 mb-md-0">
        <div id="sliderDesktop" class="carousel slide" data-ride="carousel" data-interval="3000">
            <div class="carousel-inner">
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
    <section class="container text-center mt-0 mt-md-3">
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
                        <form action="{{route('web.rezervasyon.post')}}" method="post" >
        @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <small class="text-muted font-weight-lighter fs-8">ADINIZ SOYADINIZ</small>
                                    <input type="text" class="form-control fs-10 customInput" name="adsoyad" id="adsoyad"
                                        placeholder="ADINIZ SOYADINIZ">
                                </div>

                                <div class="col-md-6">
                                    <small class="text-muted font-weight-lighter fs-8">TELEFON NUMARANIZ</small>
                                    <input type="text" name="telefon" class="form-control fs-10 customInput" id="telefon"
                                        placeholder="(5xx) xxx-xxxx">
                                </div>
                            </div>
                            <br class="d-none d-md-block">
                            <div class="row">
                                <div class="col-md-4">
                                    <small class="text-muted font-weight-lighter fs-8">Düğün Salonu</small>
                                    <select id="salon" name="salon" class="form-control fs-10 customInput">
                                        <option disabled selected>~Lütfen Seçiniz~</option>
                                        @foreach($salonlar as $s)
                                        <option value="{{$s->id}}">{{$s->adi}}</option>
                                            @endforeach
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <small class="text-muted font-weight-lighter fs-8">REZERVASYON TARİHİ</small>
                                    <input type="date" class="form-control fs-10 customInput" name="tarih" id="tarih" value="{{date('Y-m-d')}}" min="{{date('Y-m-d')}}">
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



    <!--HABERLER DUYURULAR-->
    <section class="container text-center mt-5 mb-5">
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

@endsection
@section('js')

    <script src="{{asset('assets/js/dashmix.core.min.js')}}"></script>
    <script src="{{asset('assets/js/dashmix.app.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/jquery.maskedinput/jquery.maskedinput.min.js')}}"></script>
    <script src="{{ asset('assets/js/plugins/slick-carousel/slick.min.js') }}"></script>
    <script>

        jQuery(function() {
            Dashmix.helpers(['masked-inputs','slick']);
            $('#telefon').mask('(999) 999-9999');

        });
        </script>



    @if(\Illuminate\Support\Facades\Session::has('status'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

        <script>
            Swal.fire(
                '{{\Illuminate\Support\Facades\Session::get('status')=='ok'?'Başarılı İşlem':'Başarısız İşlem'}}',
                '{{\Illuminate\Support\Facades\Session::get('message')}}',
                '{{\Illuminate\Support\Facades\Session::get('type')=='danger'?'error':'success'}}'
            )
        </script>
    @endif
    @if($errors->any())
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

        <script>
            Swal.fire(
                'Başarısız İşlem',
                'Formda Hatalar Mevcut Tüm Alanları Doldurunuz',
                'error'
            )
        </script>
    @endif
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/slick-carousel/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/slick-carousel/slick-theme.css') }}">
@endsection
