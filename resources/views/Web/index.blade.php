@extends('layouts.web')
@section('content')
    <!--SLIDER-->
    <section class="container-fluid mt-3 m-0 p-0">
        <div id="sliderDesktop" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner itemSized">
                <div class="carousel-item active">
                    <img src="./css/img/p1.jpg" class="d-block img-fluid w-100">
                </div>
                <div class="carousel-item">
                    <img src="./css/img/banner.jpg" class="d-block img-fluid w-100">
                </div>
                <div class="carousel-item">
                    <img src="./css/img/p2.jpg" class="d-block img-fluid w-100">
                </div>

                <div class="carousel-item">
                    <img src="./css/img/p3.jpg" class="d-block img-fluid w-100">
                </div>

                <div class="carousel-item">
                    <img src="./css/img/haber.jpeg" class="d-block img-fluid w-100">
                </div>
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
                                        <option value="havuzbasi">Havuz Başı Düğün Salonu</option>
                                        <option value="kir">Kır Düğün Salonu</option>
                                        <option value="cadir">Cadir Düğün Salonu</option>
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <small class="text-muted font-weight-lighter fs-8">REZERVASYON TARİHİ</small>
                                    <input type="date" class="form-control fs-10 customInput" id="tarih" value="">
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
                            <div class="col-md-4">
                                <div class="hizmetler text-left">
                                    <h1 class="hizmetIndexText"> 1. </h1>
                                    <a href="hizmetlerimizDetay.html" class="hizmetLink">Düğün Organizasyonu</a>
                                    <a href="hizmetlerimizDetay.html" class="hizmetLinkDetay">Detayları Görmek İçin
                                        Tıkla</a>
                                </div>

                            </div>
                            <div class="col-md-4 mt-4 mt-md-0">
                                <div class="hizmetler text-left">
                                    <h1 class="hizmetIndexText"> 2. </h1>
                                    <a href="hizmetlerimizDetay.html" class="hizmetLink">İş Toplantıları Ve Konferans</a>
                                    <a href="hizmetlerimizDetay.html" class="hizmetLinkDetay">Detayları Görmek İçin
                                        Tıkla</a>
                                </div>
                            </div>
                            <div class="col-md-4 mt-4 mt-md-0">
                                <div class="hizmetler text-left">
                                    <h1 class="hizmetIndexText"> 3. </h1>
                                    <a href="hizmetlerimizDetay.html" class="hizmetLink">Nişan Organizasyonu</a>
                                    <a href="hizmetlerimizDetay.html" class="hizmetLinkDetay">Detayları Görmek İçin
                                        Tıkla</a>
                                </div>

                            </div>
                        </div>

                        <div class="row mt-0 mt-md-5">
                            <div class="col-md-4 mt-4 mt-md-0">
                                <div class="hizmetler text-left">
                                    <h1 class="hizmetIndexText"> 4. </h1>
                                    <a href="hizmetlerimizDetay.html" class="hizmetLink">Yemek Organizasyonu</a>
                                    <a href="hizmetlerimizDetay.html" class="hizmetLinkDetay">Detayları Görmek İçin
                                        Tıkla</a>
                                </div>
                            </div>
                            <div class="col-md-4 mt-4 mt-md-0">
                                <div class="hizmetler text-left">
                                    <h1 class="hizmetIndexText"> 5. </h1>
                                    <a href="hizmetlerimizDetay.html" class="hizmetLink">Sünnet Organizasyonu</a>
                                    <a href="hizmetlerimizDetay.html" class="hizmetLinkDetay">Detayları Görmek İçin
                                        Tıkla</a>
                                </div>
                            </div>
                            <div class="col-md-4 mt-4 mt-md-0">
                                <div class="hizmetler text-left">
                                    <h1 class="hizmetIndexText"> 6. </h1>
                                    <a href="hizmetlerimizDetay.html" class="hizmetLink">Dini Düğün Organizasyonu</a>
                                    <a href="hizmetlerimizDetay.html" class="hizmetLinkDetay">Detayları Görmek İçin
                                        Tıkla</a>
                                </div>
                            </div>
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
            <div class="col-md-3 mt-3 mt-md-0">
                <div class="containerImg">
                    <img src="./css/img/p1.jpg" class="image" alt="">
                    <div class="overlay2 overlayBottom">
                        <div class="text mt-4">
                            <h6 class="text-dark">Dolmalar Çıldırdı</h6>
                        </div>
                    </div>
                </div>
                <br class="d-block d-md-none">
                <a href="duyuruDetay.html" class="btn btnSubmit text-white">Detayları Gör &nbsp;<i
                        class="fa fa-arrow-circle-right"></i></a>
                <br class="d-block d-md-none"> <br class="d-block d-md-none">
            </div>
            <div class="col-md-3 mt-3 mt-md-0">
                <div class="containerImg">
                    <img src="./css/img/p2.jpg" class="image" alt="">
                    <div class="overlay2 overlayBottom">
                        <div class="text  mt-4">
                            <h6 class="text-dark">Güzel Manzaralar</h6>
                        </div>
                    </div>
                </div>
                <br class="d-block d-md-none">
                <a href="duyuruDetay.html" class="btn btnSubmit text-white">Detayları Gör &nbsp;<i
                        class="fa fa-arrow-circle-right"></i></a>
                <br class="d-block d-md-none"> <br class="d-block d-md-none">
            </div>
            <div class="col-md-3 mt-3 mt-md-0">
                <div class="containerImg">
                    <img src="./css/img/p3.jpg" class="image" alt="">
                    <div class="overlay2 overlayBottom">
                        <div class="text  mt-4">
                            <h6 class="text-dark">Balayınıza Destek</h6>
                        </div>
                    </div>
                </div>
                <br class="d-block d-md-none">
                <a href="duyuruDetay.html" class="btn btnSubmit text-white">Detayları Gör &nbsp;<i
                        class="fa fa-arrow-circle-right"></i></a>
                <br class="d-block d-md-none"> <br class="d-block d-md-none">
            </div>
            <div class="col-md-3 mt-3 mt-md-0">
                <div class="containerImg">
                    <img src="./css/img/p4.jpg" class="image" alt="">
                    <div class="overlay2 overlayBottom">
                        <div class="text  mt-4">
                            <h6 class="text-dark">Mutlu Aile Tablonuza Destek</h6>
                        </div>
                    </div>
                </div>
                <br class="d-block d-md-none">
                <a href="duyuruDetay.html" class="btn btnSubmit text-white">Detayları Gör &nbsp;<i
                        class="fa fa-arrow-circle-right"></i></a>
                <br class="d-block d-md-none"> <br class="d-block d-md-none">
            </div>
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
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="css/img/p1.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="css/img/p2.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="css/img/p3.jpg" alt="Third slide">
                    </div>
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
