<section class="container-fluid m-0 p-0">
    <footer class="page-footer font-small unique-color-dark">

        <div style="background-color: rgb(185, 151, 40)" class="text-white">
            <div class="container">

                <div class="row py-4 d-flex align-items-center">

                    <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
                        <h6 class="mb-0 text-uppercase">Bizi Sosyal Medyadan Da Takip Edin!</h6>
                    </div>

                    <div class="col-md-6 col-lg-7 text-center text-md-right">
                        @if(cekAyar('facebook')!='')
                        <a href="https://facebook.com/{{cekAyar('facebook')}}" target="_blank"  class="text-white">
                            <i class="fab fa-facebook-f white-text mr-4"> </i>
                        </a>
                        @endif
                            @if(cekAyar('twitter')!='')
                        <a href="https://www.twitter.com/{{cekAyar('twitter')}}" target="_blank" class="text-white">
                            <i class="fab fa-twitter white-text mr-4"> </i>
                        </a>
                            @endif
                            @if(cekAyar('instagram')!='')
                        <a href="https://www.instagram.com/{{cekAyar('instagram')}}" target="_blank" class="text-white">
                            <i class="fab fa-instagram white-text"> </i>
                        </a>
                                @endif

                    </div>

                </div>

            </div>
        </div>

        <div class="container text-center text-md-left mt-5">

            <div class="row mt-3">

                <div class="col-md-4 col-lg-4 col-xl-3 mx-auto mb-4">

                    <h6 class="text-uppercase font-weight-bold">{{cekAyar('site-basligi')}}</h6>
                    <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <p>
                        {{cekAyar('footer-yazisi')}}
                    </p>

                </div>

                <div class="col-md-4 col-lg-2 col-xl-2 mx-auto mb-4">
                    <h6 class="text-uppercase font-weight-bold">Yönlendirmeler</h6>
                    <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <p>
                        <a href="/" class="footerLink">Ana Sayfa</a>
                    </p>
                    <p>
                        <a href="{{route('web.sayfa','hakkinda')}}" class="footerLink">Hakkımızda</a>
                    </p>
                    <p>
                        <a href="{{route('web.hizmetler')}}" class="footerLink">Hizmetlerimiz</a>
                    </p>
                    <p>
                        <a href="{{route('web.salonlar')}}" class="footerLink">Salonlarımız</a>
                    </p>
                    <p>
                        <a href="{{route('web.duyurular')}}" class="footerLink">Duyurular</a>
                    </p>

                </div>

                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                    <div class="row mb-4">
                        <div class="col-12">
                            <img src="{{cekAyar('logo')}}" class="img-fluid">
                        </div>
                    </div>
                    <p><i class="fas fa-home mr-3"></i> {{cekAyar('adres')}}</p>
                    <p><i class="fas fa-envelope mr-3"></i> {{cekAyar('email')}}</p>
                    <p><i class="fas fa-phone mr-3"></i> Telefon: {{cekAyar('is-telefonu')}}</p>
                    <p><i class="fas fa-mobile mr-3"></i> GSM: {{cekAyar('cep-telefonu')}}</p>

                </div>
            </div>
        </div>
        <div class="footer-copyright text-center py-3">© 2020 Copyright:
            <a href="https://www.ulgeryazilim.com/"> ulgeryazilim.com</a>
        </div>
    </footer>
</section>
