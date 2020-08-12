@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row mt-5 mb-5">
            <div class="col-12 col-md-8 mx-auto">
                <div class="block block-themed">
                    <div class="block-header bg-gd-sea">
                        <h3 class="block-title">Vizyonumuz Sayfası Ayarları</h3>
                    </div>
                    <div class="block-content p-1 mt-2">
                        <!--FORM-->
                        <form action="">
                            <!--SEO TITLE-->
                            <input type="hidden" name="vizyonumuz" value="vizyonumuz">

                            <!--Sayfa Başlığı-->
                            <div class="input-group-lg mb-3">

                                <div class="input-group-text text-muted"><i class="fas fa-heading mr-3"></i> Sayfa Başlığı
                                </div>

                                <input type="text" class="form-control customInput" name="sayfatitle"
                                    placeholder="Sayfa Başlığı" />
                            </div>

                            <!--Meta İçeriği-->
                            <div class="input-group-lg mb-3">

                                <div class="input-group-text">
                                    <h5 class="mb-1 text-muted"><i class="fas fa-list-alt mr-3"></i> Özet</h5>
                                </div>


                                <textarea name="metaicerigi" id="" cols="30" rows="3" class="form-control customInput"
                                    placeholder="Özet"></textarea>
                            </div>


                            <!--İçerik-->
                            <div class="input-group-lg mb-3">

                                <div class="input-group-text">
                                    <h5 class="mb-1 text-muted"><i class="fa fa-users mr-3"></i> Vizyonumuz Yazısı</h5>
                                </div>
                                <div class="form-group">
                                    <!-- CKEditor Container -->
                                    <textarea id="js-ckeditor" name="icerik" placeholder="Vizyonumuz Yazısı"></textarea>
                                </div>
                            </div>


                            <!--keyword-->
                            <div class="input-group-lg mb-3">

                                <div class="input-group-text text-muted"><i class="fa fa-tags mr-3"></i> Anahtar Kelimeler
                                </div>

                                <input type="text" class="form-control customInput" name="keyword"
                                    placeholder="Anahtar Kelimeler (Virgülle ayırın örn: a, b, c,...)" />
                            </div>

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
