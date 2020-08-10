@extends('layouts.backend')

@section('content')
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Resim Galerisi</h1>
                <a class="btn btn-sm btn-success" href="{{route('yonetim.Galeri.create')}}">Resim Ekle</a>
            </div>
        </div>
    </div>
    <div class="row items-push js-gallery js-gallery-enabled">
        @foreach($galeri as $g)
        <div class="col-md-6 col-lg-4 col-xl-3 animated fadeIn">
            <div class="options-container fx-item-zoom-in fx-overlay-zoom-out">
                <img class="img-fluid options-item" src="{{$g->resim}}" alt="{{$g->aciklama}}">
                <div class="options-overlay bg-black-75">
                    <div class="options-overlay-content">
                        <h3 class="h4 text-white mb-1">{{$g->aciklama}}</h3>
                        <h4 class="h6 text-white-75 mb-3">{{$g->yer}}</h4>
                        <a class="btn btn-sm btn-primary img-lightbox" href="{{$g->resim}}">
                            <i class="fa fa-search-plus mr-1"></i> Göster
                        </a>
                        <a class="btn btn-sm btn-secondary" href="{{route('yonetim.Galeri.edit',$g->id)}}">
                            <i class="fa fa-pencil-alt mr-1"></i> Düzenle
                        </a>
                        <form action="{{route('yonetim.Galeri.destroy',$g->id)}}"  onsubmit="return confirm('Resmi Silmek İstediğinize Emin misiniz?');" method="post">
                            @csrf
                            @method('DELETE')
                        <button class="btn btn-sm btn-danger" type="submit">
                            <i class="fa fa-exclamation mr-1"></i> Sil

                        </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
    {{$galeri->links()}}
@endsection
@section('js')

    <script src="{{asset('assets/js/plugins/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
    <script>
        jQuery(function(){ Dashmix.helpers('magnific-popup'); });
    </script>
    @endsection
