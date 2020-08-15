@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row mt-5 mb-5">
            <div class="col-12 col-md-8 mx-auto">
                <div class="block block-themed block-fx-shadow">
                    <div class="block-header bg-gd-sea">
                        <h3 class="block-title">Rezervasyon Ekle <i class="si si-plus"></i></h3>

                    </div>
                    <div class="block-content p-1 mt-2">
                        <!--FORM-->
                        <form action="{{ route('yonetim.Rezervasyonlar.store') }}" method="post">
                            @csrf
                            <!--Adı Soyadı-->
                            <div class="input-group-lg mb-3">

                                <div class="input-group-text text-muted"><i class="fa fa-user mr-3"></i>Ad Soyad
                                </div>

                                <input type="text" class="form-control customInput" name="adsoyad"
                                    placeholder="Ad Soyad" />
                            </div>

                            <!--Tarih-->
                            <div class="input-group-lg mb-3">

                                <div class="input-group-text text-muted"><i class="fa fa-calendar-alt mr-3"></i>Tarih
                                </div>

                                <input type="date" class="form-control customInput" name="tarih"
                                    placeholder="Rezervasyon Tarihi" id="tarih" />
                            </div>

                            <!--Telefon-->
                            <div class="input-group-lg mb-3">

                                <div class="input-group-text text-muted"><i class="fa fa-mobile-alt mr-3"></i>Telefon Numarası
                                </div>

                                <input type="text" class="form-control customInput" name="telefon"
                                    placeholder="5xxxxxxxxx" id="telefon" maxlength="10"/>
                            </div>

                            <div class="input-group-lg mb-3">

                                <div class="input-group-text text-muted"><i class="fa fa-mobile-alt mr-3"></i>Salon
                                </div>

                                <select name="salon_id" class="form-control customInput">
                                    @foreach($dugunsalonlari as $ds)
                                    <option value="{{$ds->id}}">{{$ds->adi}}</option>
                                    @endforeach

                                </select>
                            </div>
                            <!--Not-->
                            <div class="input-group-lg mb-3">

                                <div class="input-group-text">
                                    <h5 class="mb-1 text-muted"><i class="fa fa-sticky-note mr-3"></i> Not</h5>
                                </div>
                                <div class="form-group">
                                    <!-- CKEditor Container -->
                                    <textarea id="js-ckeditor" name="not" placeholder="Hizmetlerimiz Yazısı"></textarea>
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
    <script src="{{asset('assets/js/plugins/jquery.maskedinput/jquery.maskedinput.min.js')}}"></script>
    <script>

        jQuery(function() {
            Dashmix.helpers(['ckeditor','masked-inputs']);
            $('#telefon').mask('(999) 999-9999');

        });


        //CUSTOM FILE INPUT
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });


        //BUGÜN
        var t = new Date();
        var gun = ("0" + t.getDate()).slice(-2);
        var ay = ("0" + (t.getMonth() + 1)).slice(-2);
        var tarih = t.getFullYear()+"-"+(ay)+"-"+(gun);
        $("#tarih").val(tarih);
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
