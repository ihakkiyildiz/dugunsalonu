@extends('layouts.backend')

@section('content')

    <div class="container mt-5 p-0 p-md-2">
        <div class="row mt-5 mb-5">
            <div class="col-12 col-md-8 mx-auto">
                <div class="block block-themed block-fx-shadow">
                    <div class="block-header bg-primary-dark">
                        <h2 class="block-title">Video Düzenle</h2>
                    </div>
                    <div class="block-content p-2 mt-3">
                        <!--FORM-->
                        <form action="{{ route('yonetim.Videolar.update',$v->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                                @method('PUT')
                            <!--Youtube Link-->
                            <div class="input-group-lg mb-3">
                                <div class="input-group-text text-muted"><i class="fab fa-youtube mr-3"></i>Youtube Linki
                                </div>
                                <input type="text" class="form-control customInput" name="youtubelink" id="youtubelink"
                                    placeholder="https://www.youtube.com/watch?v=" value="{{old('youtubelink',$v->youtubelink)}}" />
                            </div>

                            <!--Video Açıklama-->
                            <div class="input-group-lg mb-3">
                                <div class="input-group-text">
                                    <h5 class="mb-1 text-muted"><i class="fa fa-edit mr-3"></i> Video Açıklaması</h5>
                                </div>
                                <input type="text" class="form-control customInput" name="aciklama" value="{{old('aciklama',$v->aciklama)}}" id="aciklama"
                                       placeholder="Açıklama" />
                            </div>
                            <!--Salon-->
                            <div class="row mb-3">
                                <div class="col-12 col-md-9">
                                    <div class="input-group-lg">

                                        <div class="input-group-text text-muted"><i class="fa fa-building mr-3"></i>Salon
                                        </div>

                                        <select name="salon_id" class="form-control customInput">
                                            @foreach(\App\Models\Salonlar::all() as $s)
                                            <option value="{{$s->id}}" @if($s->id==$v->salon_id) selected @endif>{{$s->adi}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="input-group">
                                        <div class="input-group-lg mb-3">
                                            <div class="input-group-text text-muted"><i class="fas fa-bars mr-3"></i>Sıra
                                            </div>
                                            <input type="number" class="form-control customInput" value="0" name="sira" placeholder="Sıra" value="{{old('sira',$v->sira )}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--keyword-->
                            <div class="input-group-lg mb-3">

                                <div class="input-group-text text-muted"><i class="fa fa-tags mr-3"></i> Anahtar Kelimeler
                                </div>

                                <input type="text" value="{{old('metaetiketler',$v->metaetiketler)}}" class="form-control customInput" name="metaetiketler"
                                    placeholder="Anahtar Kelimeler (Virgülle ayırın örn: a, b, c,...)" />
                            </div>
                            <!--KAYDET-->
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
