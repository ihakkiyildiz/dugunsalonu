@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row mt-5 mb-5">
            <div class="col-12 col-md-8 mx-auto">
                <div class="block block-themed block-fx-shadow">
                    <div class="block-header bg-gd-sea">
                        <h3 class="block-title">Hizmet Ekle</h3>

                    </div>
                    <div class="block-content p-1 mt-2">
                        <!--FORM-->
                        <form action="{{ route('yonetim.Hizmetler.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <!--Sayfa Başlığı-->
                            <div class="input-group-lg mb-3">

                                <div class="input-group-text text-muted"><i class="fas fa-heading mr-3"></i> Hizmet Adı
                                </div>

                                <input type="text" class="form-control customInput" name="sayfatitle"
                                    placeholder="Hizmet Adı" />
                            </div>

                            <!--Meta İçeriği-->
                            <div class="input-group-lg mb-3">

                                <div class="input-group-text">
                                    <h5 class="mb-1 text-muted"><i class="fas fa-list-alt mr-3"></i> Özet</h5>
                                </div>


                                <textarea name="metaicerik" id="" cols="30" rows="3" class="form-control customInput"
                                    placeholder="Özet"></textarea>
                            </div>


                            <!--İçerik-->
                            <div class="input-group-lg mb-3">

                                <div class="input-group-text">
                                    <h5 class="mb-1 text-muted"><i class="fa fa-users mr-3"></i> Hizmetlerimiz Yazısı</h5>
                                </div>
                                <div class="form-group">
                                    <!-- CKEditor Container -->
                                    <textarea id="js-ckeditor" name="icerik" placeholder="Hizmetlerimiz Yazısı"></textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-12 col-md-9">
                                    <div class="custom-file">
                                        <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                                        <input type="file" class="custom-file-input js-custom-file-input-enabled"
                                            data-toggle="custom-file-input" id="example-file-input-custom" name="image">
                                        <label class="custom-file-label" for="image">Dosya Seç</label>
                                    </div>
                                </div>

                                <div class="col-12 col-md-3">
                                    <div class="input-group">

                                        <input type="number" class="form-control" value="0" name="sira" placeholder="Sıra">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-bars"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--keyword-->
                            <div class="input-group-lg mb-3">

                                <div class="input-group-text text-muted"><i class="fa fa-tags mr-3"></i> Anahtar Kelimeler
                                </div>

                                <input type="text" class="form-control customInput" name="keyword"
                                    placeholder="Anahtar Kelimeler (Virgülle ayırın örn: a, b, c,...)" />
                            </div>

                            <!--KAYDET-->
                            <input type="submit" value="Kaydet" class="btn btn-block btn-success mt-5" />
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
