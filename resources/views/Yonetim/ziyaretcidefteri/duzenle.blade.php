@extends('layouts.backend')

@section('content')

    <div class="container mt-5 p-0 p-md-2">
        <div class="row mt-5 mb-5">
            <div class="col-12 col-md-8 mx-auto">
                <div class="block block-themed block-fx-shadow">
                    <div class="block-header bg-primary-dark">
                        <h2 class="block-title">Ziyaretçi Yorumu Düzenle</h2>
                    </div>
                    <div class="block-content p-2 mt-3">
                        <!--FORM-->
                        <form action="{{route('yonetim.ZiyaretciDefteri.update',$zd->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <!-- Ad Soyad -->
                            <div class="input-group-lg mb-3">
                                <div class="input-group-text text-muted"><i class="fa fa-user-alt mr-3"></i>Ad Soyad
                                </div>
                                <input type="text" class="form-control customInput" name="adsoyad" id="adsoyad"
                                       placeholder="Ziyaretçi Adı Soyadı" value="{{$zd->adsoyad}}" />
                            </div>

                            <!-- E-Posta -->
                            <div class="input-group-lg mb-3">
                                <div class="input-group-text text-muted"><i class="fa fa-envelope mr-3"></i>E-Posta
                                </div>
                                <input type="text" class="form-control customInput" name="email" value="{{$zd->email}}" id="email"
                                       placeholder="E-Posta Adresi" />
                            </div>

                            <!-- Ziyaretçi Notu -->
                            <div class="input-group-lg mb-3">

                                <div class="input-group-text">
                                    <h5 class="mb-1 text-muted"><i class="fa fa-edit mr-3"></i> Ziyaretçi Notu</h5>
                                </div>
                                <div class="form-group">
                                    <textarea id="js-ckeditor" name="mesaj" placeholder="Ziyaretçi Notu" rows="4">{{$zd->mesaj}}</textarea>
                                </div>

                            </div>

                            <div class="input-group-lg mb-3">
                                <div class="custom-control custom-switch">

                                    <input type="checkbox" class="custom-control-input" id="durum" name="durum" @if ($zd->durum==1)
                                    checked
                                        @endif>
                                    <label class="custom-control-label" for="durum">Göster</label>
                                </div>
                            </div>
                            <!--KAYDET-->
                            <input type="submit" value="Kaydet" class="btn btn-block btn-success mt-4" />
                        </form>
                    </div>
                </div>


            </div>

        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('assets/js/plugins/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery.maskedinput/jquery.maskedinput.min.js') }}"></script>
    <script>
        jQuery(function() {
            Dashmix.helpers(['ckeditor', 'masked-inputs']);
            $("#telefon").mask('(999) 999-9999');
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
