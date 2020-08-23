@extends('layouts.webpages')
@section('content')

    <div class="row mb-4">
        @foreach($yorumlar as $y)
        <div class="col-md-12 yorumSatiri text-center m-0 p-0 mt-1">
            <div class="yorumSatiriOver p-4">
                <div class="mesaj w-75 mx-auto">
                    <h4 class="text-muted font-weight-lighter">{{$y->adsoyad}}</h4>
                    <p class="fs-10 text-muted">
                        {!! $y->mesaj !!}
                    </p>
                    <p class="fs-9 text-right mr-5 text-danger">
                        Yorum Tarihi: {{date('d.m.Y',strtotime($y->created_at))}}
                    </p>
                </div>
            </div>
        </div>
            @endforeach
        {{$yorumlar->links()}}
    </div>
    <section class="container mt-5 mb-5">
        <div>
            <h4 class="text-muted"><svg class="svg-inline--fa fa-edit fa-w-18" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="edit" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M402.6 83.2l90.2 90.2c3.8 3.8 3.8 10 0 13.8L274.4 405.6l-92.8 10.3c-12.4 1.4-22.9-9.1-21.5-21.5l10.3-92.8L388.8 83.2c3.8-3.8 10-3.8 13.8 0zm162-22.9l-48.8-48.8c-15.2-15.2-39.9-15.2-55.2 0l-35.4 35.4c-3.8 3.8-3.8 10 0 13.8l90.2 90.2c3.8 3.8 10 3.8 13.8 0l35.4-35.4c15.2-15.3 15.2-40 0-55.2zM384 346.2V448H64V128h229.8c3.2 0 6.2-1.3 8.5-3.5l40-40c7.6-7.6 2.2-20.5-8.5-20.5H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V306.2c0-10.7-12.9-16-20.5-8.5l-40 40c-2.2 2.3-3.5 5.3-3.5 8.5z"></path></svg><!-- <i class="fa fa-edit"></i> --> Yorum Yazın</h4>
            <p>
                Siz de Görüşlerinizi ve Önerilerinizi Bizimle Paylaşın.
            </p>
            <form action="{{route('web.ziyaretcidefteri.post')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><svg class="svg-inline--fa fa-user fa-w-14" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="user" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"></path></svg><!-- <i class="fa fa-user"></i> --></div>
                            </div>
                            <input type="text" name="adsoyad" class="form-control" placeholder="Adınız Soyadınız">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><svg class="svg-inline--fa fa-envelope fa-w-16" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="envelope" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7.3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2.4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z"></path></svg><!-- <i class="fa fa-envelope"></i> --></div>
                            </div>
                            <input type="text" class="form-control" name="email" placeholder="E-Posta Adresiniz">
                        </div>
                    </div>

                    <div class="col-md-12 mt-3">
                        <h6 class="text-muted"><svg class="svg-inline--fa fa-edit fa-w-18" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="edit" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M402.6 83.2l90.2 90.2c3.8 3.8 3.8 10 0 13.8L274.4 405.6l-92.8 10.3c-12.4 1.4-22.9-9.1-21.5-21.5l10.3-92.8L388.8 83.2c3.8-3.8 10-3.8 13.8 0zm162-22.9l-48.8-48.8c-15.2-15.2-39.9-15.2-55.2 0l-35.4 35.4c-3.8 3.8-3.8 10 0 13.8l90.2 90.2c3.8 3.8 10 3.8 13.8 0l35.4-35.4c15.2-15.3 15.2-40 0-55.2zM384 346.2V448H64V128h229.8c3.2 0 6.2-1.3 8.5-3.5l40-40c7.6-7.6 2.2-20.5-8.5-20.5H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V306.2c0-10.7-12.9-16-20.5-8.5l-40 40c-2.2 2.3-3.5 5.3-3.5 8.5z"></path></svg><!-- <i class="fa fa-edit"></i> --> Yorumunuz</h6>
                        <textarea placeholder="Mesajınızı Yazın..." name="mesaj" class="form-control" cols="30" rows="4"></textarea>
                    </div>
                    <div class="col-md-12 mt-3">
                        <input type="submit" class="fs-10 btn btn-block btnSubmit" value="GÖNDER">
                    </div>
                </div>
            </form>
        </div>
    </section>

@endsection
@section('js')
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
