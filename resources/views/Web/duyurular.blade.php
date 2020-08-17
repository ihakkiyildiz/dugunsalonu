@extends('layouts.webpages')
@section('content')
    @if($durum)

           @foreach($duyurular as $d)
                <div class="row mb-2">
                    <div class="col-md-12">
                        <div class="card flex-md-row mb-4 box-shadow h-md-250">

                            <img class="flex-auto img-fluid d-md-block duyuruImg" alt="{{$d->duyurutitle}}" src="{{$d->image}}" data-holder-rendered="true">
                            <div class="card-body d-flex flex-column align-items-start">
                                <h4 class="mb-0">
                                    <a class="duyuruHover font-weight-lighter" href="{{route('web.duyurular',$d->seourl)}}">{{$d->duyurutitle}}</a>
                                </h4>
                                <small class="mb-2 text-muted">{{date('d.m.Y',strtotime($d->created_at))}}</small>
                                <p class="card-text mb-auto fs-10">
                                   {!! $d->icerik !!}
                                </p>
                                <a href="{{route('web.duyurular',$d->seourl)}}" class="duyuruHover font-weight-bold mt-4 fs-9">Duyurunun Devamı <svg class="svg-inline--fa fa-arrow-right fa-w-14" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="arrow-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M190.5 66.9l22.2-22.2c9.4-9.4 24.6-9.4 33.9 0L441 239c9.4 9.4 9.4 24.6 0 33.9L246.6 467.3c-9.4 9.4-24.6 9.4-33.9 0l-22.2-22.2c-9.5-9.5-9.3-25 .4-34.3L311.4 296H24c-13.3 0-24-10.7-24-24v-32c0-13.3 10.7-24 24-24h287.4L190.9 101.2c-9.8-9.3-10-24.8-.4-34.3z"></path></svg><!-- <i class="fa fa-arrow-right"></i> --></a>
                            </div>
                        </div>
                    </div>
                </div>
    @endforeach


    @else

        <div class="row">

            <div class="col-md-3">
                <img src="{{$duyurular->image}}" width="255" height="360">
            </div>
            <div class="col-md-8 mt-4">
                <h3 class="mb-3 letterSpace-3 font-weight-lighter text-dark">{{$duyurular->duyurutitle}}</h3>
                {!! $duyurular->icerik !!}
            </div>
        </div>
    @endif
@endsection
