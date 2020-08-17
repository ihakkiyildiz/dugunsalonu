@extends('layouts.webpages')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <h4 class="mb-0 font-weight-lighter">İletişim Bilgileri</h4>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <ul class="list-group text-muted fs-10">
                        <li class="list-group-item bg-transparent border-0 p-3"><svg class="svg-inline--fa fa-home fa-w-18 mr-2" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="home" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M280.37 148.26L96 300.11V464a16 16 0 0 0 16 16l112.06-.29a16 16 0 0 0 15.92-16V368a16 16 0 0 1 16-16h64a16 16 0 0 1 16 16v95.64a16 16 0 0 0 16 16.05L464 480a16 16 0 0 0 16-16V300L295.67 148.26a12.19 12.19 0 0 0-15.3 0zM571.6 251.47L488 182.56V44.05a12 12 0 0 0-12-12h-56a12 12 0 0 0-12 12v72.61L318.47 43a48 48 0 0 0-61 0L4.34 251.47a12 12 0 0 0-1.6 16.9l25.5 31A12 12 0 0 0 45.15 301l235.22-193.74a12.19 12.19 0 0 1 15.3 0L530.9 301a12 12 0 0 0 16.9-1.6l25.5-31a12 12 0 0 0-1.7-16.93z"></path></svg><!-- <i class="fa fa-home mr-2"></i> -->
                            <b>Düğün Salonu Genel İletişim Bilgileri</b></li>
                        <li class="list-group-item bg-transparent border-0 p-3"><svg class="svg-inline--fa fa-map-marker fa-w-12 mr-2" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="map-marker" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg=""><path fill="currentColor" d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0z"></path></svg><!-- <i class="fa fa-map-marker mr-2"></i> --> Adres:
                            Demo Mahallesi,
                            Demo Sokak No: 00 / 00 - Siirt / TÜRKİYE</li>
                        <li class="list-group-item bg-transparent border-0 p-3"><svg class="svg-inline--fa fa-phone fa-w-16 mr-2" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="phone" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M493.4 24.6l-104-24c-11.3-2.6-22.9 3.3-27.5 13.9l-48 112c-4.2 9.8-1.4 21.3 6.9 28l60.6 49.6c-36 76.7-98.9 140.5-177.2 177.2l-49.6-60.6c-6.8-8.3-18.2-11.1-28-6.9l-112 48C3.9 366.5-2 378.1.6 389.4l24 104C27.1 504.2 36.7 512 48 512c256.1 0 464-207.5 464-464 0-11.2-7.7-20.9-18.6-23.4z"></path></svg><!-- <i class="fa fa-phone mr-2"></i> -->
                            Telefon:0000 000
                            00 00</li>
                        <li class="list-group-item bg-transparent border-0 p-3"><svg class="svg-inline--fa fa-tablet fa-w-14 mr-2" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="tablet" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M400 0H48C21.5 0 0 21.5 0 48v416c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V48c0-26.5-21.5-48-48-48zM224 480c-17.7 0-32-14.3-32-32s14.3-32 32-32 32 14.3 32 32-14.3 32-32 32z"></path></svg><!-- <i class="fa fa-tablet mr-2"></i> -->
                            Gsm:0500 000 00
                            00</li>
                        <li class="list-group-item bg-transparent border-0 p-3"><svg class="svg-inline--fa fa-fax fa-w-16 mr-2" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="fax" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M480 160V77.25a32 32 0 0 0-9.38-22.63L425.37 9.37A32 32 0 0 0 402.75 0H160a32 32 0 0 0-32 32v448a32 32 0 0 0 32 32h320a32 32 0 0 0 32-32V192a32 32 0 0 0-32-32zM288 432a16 16 0 0 1-16 16h-32a16 16 0 0 1-16-16v-32a16 16 0 0 1 16-16h32a16 16 0 0 1 16 16zm0-128a16 16 0 0 1-16 16h-32a16 16 0 0 1-16-16v-32a16 16 0 0 1 16-16h32a16 16 0 0 1 16 16zm128 128a16 16 0 0 1-16 16h-32a16 16 0 0 1-16-16v-32a16 16 0 0 1 16-16h32a16 16 0 0 1 16 16zm0-128a16 16 0 0 1-16 16h-32a16 16 0 0 1-16-16v-32a16 16 0 0 1 16-16h32a16 16 0 0 1 16 16zm0-112H192V64h160v48a16 16 0 0 0 16 16h48zM64 128H32a32 32 0 0 0-32 32v320a32 32 0 0 0 32 32h32a32 32 0 0 0 32-32V160a32 32 0 0 0-32-32z"></path></svg><!-- <i class="fa fa-fax mr-2"></i> -->
                            Faks:0200 000 00
                            00</li>
                        <li class="list-group-item bg-transparent border-0 p-3"><svg class="svg-inline--fa fa-envelope fa-w-16 mr-2" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="envelope" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7.3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2.4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z"></path></svg><!-- <i class="fa fa-envelope mr-2"></i> -->
                            E-Posta: <a href=""> dugun@salonu.com</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <h4 class="mb-0 font-weight-lighter">İletişim Formu</h4>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <form>
                        <li class="list-group-item bg-transparent border-0">

                            <input type="text" name="adsoyad" class="form-control" placeholder="Ad Soyad">
                        </li>
                        <li class="list-group-item bg-transparent border-0">
                            <input type="text" name="telefon" class="form-control" placeholder="Telefon">
                        </li>
                        <li class="list-group-item bg-transparent border-0">
                            <input type="text" name="eposta" class="form-control" placeholder="E-Posta Adresiniz">
                        </li>
                        <li class="list-group-item bg-transparent border-0">
                            <textarea class="form-control" rows="" name="mesaj" id="mesaj" placeholder="Mesajınız"></textarea>
                        </li>
                        <li class="list-group-item bg-transparent border-0">
                            <input id="konu" name="konu" type="hidden" value="İletişim Formu Mesajı">
                            <input id="onay" name="onay" type="hidden" value="0">
                            <input type="hidden" name="sonuc" id="sonuc" value="Mesajınız Başarıyla Gönderilmiştir.">
                            <button type="button" class="btn btn-danger">TEMİZLE</button>
                            <button type="submit" name="submit" class="btn btn-success">GÖNDER</button>
                        </li>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
