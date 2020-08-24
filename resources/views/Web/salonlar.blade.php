@extends('layouts.webpages')
@section('content')
    <div class="container my-4">

        <div class="row">
            @foreach ($galeri as $salon)
                <div class="col-lg-4 col-md-12 mb-4">
                    <div class="modal fade" id="modal{{$salon->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                        aria-hidden="true" style="display: none;">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">

                                <div class="modal-body mb-0 p-0 salonImg">
                                    <div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
                                        <img class="embed-responsive-item" src="{{ $salon->resim }}">
                                    </div>
                                </div>

                                <div class="modal-footer justify-content-center">
                                    <span class="mr-4">{{ $salon->aciklama }}</span>
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{env('APP_URL')}}" type="button" class="btn-floating btn-sm btn-fb"><svg
                                            class="svg-inline--fa fa-facebook-f fa-w-10" aria-hidden="true"
                                            focusable="false" data-prefix="fab" data-icon="facebook-f" role="img"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z">
                                            </path>
                                        </svg><!-- <i class="fab fa-facebook-f"></i> --></a>

                                    <a href="http://twitter.com/share?text=Dugun%20Salonumuz&url={{env('APP_URL')}}&hashtags=dugun,düğün,düğün%20salonu" type="button" class="btn-floating btn-sm btn-tw"><svg
                                            class="svg-inline--fa fa-twitter fa-w-16" aria-hidden="true" focusable="false"
                                            data-prefix="fab" data-icon="twitter" role="img"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z">
                                            </path>
                                        </svg><!-- <i class="fab fa-twitter"></i> --></a>
                                    
                                    <!--Whatsapp link-->
                                    <a href="#"><i class="fab fa-whatsapp"></i></a>



                                    <button type="button" class="btn btn-outline-primary btn-rounded btn-md ml-4"
                                        data-dismiss="modal">Kapat</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a><img width="100%" height="300px" class="z-depth-1 salonImg" src="{{ $salon->resim }}" data-toggle="modal"
                            data-target="#modal{{$salon->id}}"></a>
                </div>
            @endforeach

        </div>



    </div>
@endsection
@section('css')
    <style>
        .salonImg {
            object-fit: contain;
            object-position: center;
            -o-object-fit: contain;
            -o-object-position: center;
            border: 1px solid rosybrown;
            padding: 3px;
            cursor: pointer
        }

    </style>
@endsection
