@extends('layouts.backend')

@section('content')
   <div class="content">
    <div class="block block-rounded block-bordered col-12 row">

        <div class="row mt-3 col-6">
        <form class="m-5" action="{{route('yonetim.Ayarlar.update','0')}}" method="POST">
            @method('PUT')
            @csrf
            @foreach ($ayar as $a)
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label" for="{{$a['key']}}">{{$a['desc']}}</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" id="{{$a['key']}}" name="{{$a['key']}}" value="{{$a['value']}}">
                    </div>
                </div>
            @endforeach
            <div class="form-group row">
                <div class="col-sm-12 ml-auto">
                    <button type="submit" class="btn btn-primary">Güncelle</button>
                </div>
            </div>
        </form>
    </div>
    <div class="row col-6 mt-5">
        {{print_r(tumAyarlar())}}
    </div>
    </div>
   </div>
@endsection

