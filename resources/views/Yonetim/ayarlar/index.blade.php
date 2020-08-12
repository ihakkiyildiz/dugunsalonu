@extends('layouts.backend')

@section('content')
    <div class="content ">
        <div class="block block-themed block-fx-shadow">
            <div class="block-header bg-gd-sea">
                <h3 class="block-title">Site Ayarları</h3>
            </div>
            <div class="block-content p-0">
                <div class="row">
                    <div class="col-md-12">
                        <form class="m-5" action="{{ route('yonetim.Ayarlar.update', '0') }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="form-group ">
                                @foreach ($ayar as $a)
                                    <div class="row">
                                        <div class="offset-3"></div>
                                        <div class="col-12 col-md-2 mt-3 mt-md-0">
                                            <label class="col-form-label" for="{{ $a['key'] }}">{{ $a['desc'] }}</label>
                                            <hr class="mt-0">    
                                        </div>
        
                                        <div class="col-12 col-md-4">
                                            <input type="text" class="form-control customInput" id="{{ $a['key'] }}"
                                                name="{{ $a['key'] }}" value="{{ $a['value'] }}">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
        
                            <div class="form-group row mt-5 mt-md-0 mr-6">
                                <div class="offset-8"></div>
                                <div class="col-12 col-md-4">
                                    <button type="submit" class="btn btn-hero-primary">Güncelle</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
