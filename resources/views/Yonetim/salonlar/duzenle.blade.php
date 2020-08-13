@extends('layouts.backend')

@section('content')

    <div class="container mt-5 p-0 p-md-2">
        <div class="row mt-5 mb-5">
            <div class="col-12 col-md-12 mx-auto">
                <div class="block block-themed block-fx-shadow">
                    <div class="block-header bg-primary-dark">
                        <h2 class="block-title">Salonlar</h2>

                        <div class="block-options">
                            <button type="button" class="btn-block-option">
                                <a href="{{ route('yonetim.Salonlar.create') }}" class="btn btn-hero-light">
                                    <span class="d-none d-md-block">Salon Ekle <i class="si si-plus"></i></span>
                                    <span class="d-block d-md-none">Ekle <i class="si si-plus"></i></span>
                                </a>
                            </button>
                        </div>
                    </div>
                    <div class="block-content p-2 mt-3">

                        <!--FORM-->
                        <form action="{{route('yonetim.Salonlar.update',$s->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="adi">Salon Adı</label>
                                <input type="text" class="form-control" id="adi" name="adi" value="{{$s->adi}}">
                            </div>
                            <div class="form-group">
                                <label for="aciklama">Açıklama</label>
                                <textarea class="form-control" name="aciklama" id="aciklama" cols="30" rows="10">{{$s->aciklama}}</textarea>
                            </div>

                            <div class="form-group">
                                <img src="{{$s->image}}" class="img-thumbnail" alt="">
                                <label for="image">Resim</label>
                                <input type="file" class="form-controller" id="image" name="image">
                            </div>
                            <div class="form-group">
                                <label for="keyword">Keyword</label>
                                <input type="text" class="form-control" id="keyword" name="keyword" value="{{$s->keyword}}">
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
