@extends('layouts.backend')

@section('content')

    <div class="container mt-5 p-0 p-md-2">
        <div class="row mt-5 mb-5">
            <div class="col-12 col-md-12 mx-auto">
                <div class="block block-themed block-fx-shadow">
                    <div class="block-header bg-primary-dark">
                        <h2 class="block-title">Duyurular</h2>

                        <div class="block-options">
                            <button type="button" class="btn-block-option">
                                <a href="{{ route('yonetim.Duyurular.create') }}" class="btn btn-hero-light">
                                    <span class="d-none d-md-block">Duyuru Ekle <i class="si si-plus"></i></span>
                                    <span class="d-block d-md-none">Ekle <i class="si si-plus"></i></span>
                                </a>
                            </button>
                        </div>
                    </div>
                    <div class="block-content p-2 mt-3">

                        <!--FORM-->
                        <form action="{{route('yonetim.Duyurular.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="duyurutitle">Duyuru Başlığı</label>
                                <input type="text" class="form-control" id="duyurutitle" name="duyurutitle">
                            </div>
                            <div class="form-group">
                                <label for="metaicerik">Duyuru Önbilgi</label>
                                <textarea class="form-control" name="metaicerik" id="metaicerik" cols="30" rows="10"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="icerik">Duyuru İçerik</label>
                                <textarea class="form-control" name="icerik" id="icerik" cols="30" rows="10"></textarea>

                            </div>
                            <div class="form-group">
                                <label for="image">Resim</label>
                                <input type="file" class="form-controller" id="image" name="image">
                            </div>
                            <div class="form-group">
                                <label for="keyword">Keyword</label>
                                <input type="text" class="form-control" id="keyword" name="keyword">
                            </div>
                            <div class="form-group">

                                <input type="submit" value="Güncelle">
                            </div>

                        </form>

                    </div>
                </div>


            </div>

        </div>
    </div>
@endsection
