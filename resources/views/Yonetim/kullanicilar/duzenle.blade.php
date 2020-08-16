@extends('layouts.backend')

@section('content')

    <div class="container mt-5 p-0 p-md-2">
        <div class="row mt-5 mb-5">
            <div class="col-12 col-md-8 mx-auto">
                <div class="block block-themed block-fx-shadow">
                    <div class="block-header bg-primary-dark">
                        <h2 class="block-title">Kullanıcı Düzenle</h2>
                    </div>
                    <div class="block-content p-2 mt-3">
                        <!--FORM-->
                        <form action="{{route('yonetim.Kullanicilar.update',$u->id)}}" method="post">
                            @csrf
                                @method('PUT')
                            <!--Kullanıcı Başlığı-->
                            <div class="input-group-lg mb-3">
                                <div class="input-group-text text-muted"><i class="fa fa-pen mr-3"></i>Adı
                                </div>
                                <input type="text" class="form-control customInput" name="name" id="name"
                                    placeholder="Adı" value="{{$u->name}}" />
                            </div>
                                <div class="input-group-lg mb-3">
                                    <div class="input-group-text text-muted"><i class="fa fa-pen mr-3"></i>Soyadı
                                    </div>
                                    <input type="text" class="form-control customInput" name="surname" id="surname"
                                           placeholder="Soyadı" value="{{$u->surname}}" />
                                </div>
                                <div class="input-group-lg mb-3">
                                    <div class="input-group-text text-muted"><i class="fa fa-envelope mr-3"></i>Email
                                    </div>
                                    <input type="email" class="form-control customInput" name="email" id="email"
                                           placeholder="Email@mail.com" value="{{$u->email}}" />
                                </div>
                                <div class="input-group-lg mb-3">
                                    <div class="input-group-text text-muted"><i class="fa fa-key mr-3"></i>Password (<small class="text-danger">Parola Alanı Değiştirilmek İstenmiyorsa Eski Parola Yazılmalıdır.</small>)
                                    </div>
                                    <input type="password" class="form-control customInput" name="password" id="password"
                                           placeholder="Password" />
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
