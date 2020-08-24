    <section class="container text-center mt-0 mt-md-1  d-block d-md-none ">
        <ul class="list-inline">
            @if (cekAyar('twitter') != '')
                <li class="list-inline-item bg-grey p-1"><a class="color-grey p-2"
                        href="https://www.twitter.com/{{ cekAyar('twitter') }}" target="_blank"><i
                            class="fab fa-twitter"></i></a></li>
            @endif
            @if (cekAyar('facebook') != '')
                <li class="list-inline-item bg-grey p-1"><a class="color-grey p-2"
                        href="https://facebook.com/{{ cekAyar('facebook') }}" target="_blank"><i
                            class="fab fa-facebook"></i></a></li>
            @endif

            @if (cekAyar('instagram') != '')
                <li class="list-inline-item bg-grey p-1"><a class="color-grey p-2"
                        href="https://www.instagram.com/{{ cekAyar('instagram') }}" target="_blank"><i
                            class="fab fa-instagram"></i></a></li>
            @endif
            @if(cekAyar('whatsapp-no')!='')
            <li class="list-inline-item bg-grey p-1"><a class="color-grey p-2" href="https://wa.me/{{cekAyar('whatsapp-no')}}?text={{urlencode(cekAyar('whatsapp-text'))}}" target="_blank"><i
                        class="fab fa-whatsapp"></i></a></li>
            @endif
        </ul>
    </section>

    <!--SOSYAL MEDYA MASAÜSTÜ-->
    <section class="container-fluid mt-0 d-none d-md-block bg-dgsk">
        <div class="container text-white topbar">
            <span class="no"><i class="fa fa-phone-alt mr-2"></i> {{ cekAyar('cep-telefonu') }}</span>

            <div class="float-right">
                <a class="rzvBtn" href="{{ route('web.rezervasyontakvimi') }}">REZERVASYON <i
                        class="fa fa-arrow-circle-right" style="font-size:9pt"></i></a>
            </div>
            <div class="float-right mr-4">
                <ul class="list-inline p-0 text-center">
                    @if (cekAyar('facebook') != '')
                        <li class="list-inline-item a bg-dblue">
                            <a class="social-item" href="https://www.facebook.com/{{ cekAyar('facebook') }}"
                                target="_blank"> <i class="fab fa-facebook-f"></i> </a>
                        </li>
                    @endif
                    @if (cekAyar('twitter') != '')
                        <li class="list-inline-item a bg-lblue">
                            <a class="social-item " href="https://www.twitter.com/{{ cekAyar('twitter') }}"
                                target="_blank"> <i class="fab fa-twitter"></i> </a>
                        </li>
                    @endif
                    @if (cekAyar('instagram') != '')
                        <li class="list-inline-item block a bg-warning">
                            <a class="social-item" href="https://www.instagram.com/{{ cekAyar('instagram') }}"
                                target="_blank"> <i class="fab fa-instagram"></i> </a>
                        </li>
                    @endif
                        @if(cekAyar('whatsapp-no')!='')
                    <li class="list-inline-item a bg-success">
                        <a class="social-item " href="https://wa.me/{{cekAyar('whatsapp-no')}}?text={{urlencode(cekAyar('whatsapp-text'))}}" target="_blank"> <i class="fab fa-whatsapp"></i> </a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </section>
