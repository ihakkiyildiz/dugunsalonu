@extends('layouts.backend')

@section('content')

    <div class="container mt-5 p-0 p-md-2">
        <div class="row mt-5 mb-5">
            <div class="col-12 col-md-8 mx-auto">
                <div class="block block-themed block-fx-shadow">
                    <div class="block-header bg-primary-dark">
                        <h2 class="block-title">Duyurular</h2>
                    </div>
                    <div class="block-content p-2 mt-3">

                        <!--FORM-->
                        <form action="{{ route('yonetim.Duyurular.update', $d->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <!--Duyuru Başlığı-->
                            <div class="input-group-lg mb-3">
                                <div class="input-group-text text-muted"><i class="fa fa-bullhorn mr-3"></i>Duyuru Başlığı
                                </div>
                                <input type="text" class="form-control customInput" name="duyurutitle" id="duyurutitle"
                                    value="{{ $d->duyurutitle }}" placeholder="Duyuru Başlığı" />
                            </div>
                            <!--Duyuru Önbilgi-->
                            <div class="input-group-lg mb-3">

                                <div class="input-group-text">
                                    <h5 class="mb-1 text-muted"><i class="fab fa-affiliatetheme mr-3"></i> Duyuru Önbilgi
                                    </h5>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="metaicerik" placeholder="Hizmetlerimiz Yazısı"
                                        rows="4">{{ $d->metaicerik }}</textarea>
                                </div>
                            </div>
                            <!--Duyuru İçerik-->
                            <div class="input-group-lg mb-3">

                                <div class="input-group-text">
                                    <h5 class="mb-1 text-muted"><i class="fa fa-edit mr-3"></i> Duyuru İçerik</h5>
                                </div>
                                <div class="form-group">
                                    <textarea id="js-ckeditor" name="icerik" placeholder="Hizmetlerimiz Yazısı"
                                        rows="4">{{ $d->icerik }}</textarea>
                                </div>
                            </div>
                            <!--Resim-->
                            <div class="input-group-lg mb-3">
                                <div class="custom-file">
                                    <img src="{{ $d->image }}" class="img img-thumbnail" alt="">
                                    <input type="file" class="custom-file-input js-custom-file-input-enabled"
                                        data-toggle="custom-file-input" id="example-file-input-custom" name="image">
                                    <label class="custom-file-label" for="image">Dosya Seç</label>
                                </div>
                            </div>

                            <!--keyword-->
                            <div class="input-group-lg mb-3">

                                <div class="input-group-text text-muted"><i class="fa fa-tags mr-3"></i> Anahtar Kelimeler
                                </div>

                                <input type="text" class="form-control customInput" name="keyword"
                                    placeholder="Anahtar Kelimeler (Virgülle ayırın örn: a, b, c,...)"
                                    value="{{ $d->keyword }}" />
                            </div>
                            <div class="input-group-lg mb-3">
                                <div class="custom-control custom-switch">
                                    
                                    <input type="checkbox" class="custom-control-input" id="durum" name="durum" @if ($d->durum == 1) checked @endif>
                                    <label class="custom-control-label" for="durum">Durum</label>
                                </div>
                            </div>
                            <input type="submit" value="Güncelle" class="btn btn-block btn-success mt-4" />

                        </form>

                    </div>
                </div>


            </div>

        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('assets/js/plugins/ckeditor/ckeditor.js') }}"></script>
    <script>
        jQuery(function() {
            Dashmix.helpers(['ckeditor']);
        });

        //CUSTOM FILE INPUT
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });

    </script>
@endsection

@section('css')
    <style>
        .customInput {
            border: none;
            box-shadow: none;
            font-size: 12pt !important;
            border-bottom: 3px solid #ddd;
            border-radius: 0 !important;
        }

        .customInput:focus {
            box-shadow: none;
        }

        .customInput::placeholder {
            font-size: 12pt;
        }

    </style>
@endsection
