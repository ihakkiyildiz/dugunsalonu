@extends('layouts.backend')

@section('content')

    <div class="container mt-5 p-0 p-md-2">
        <div class="row mt-5 mb-5">
            <div class="col-12 col-md-12 mx-auto">
                <div class="block block-themed block-fx-shadow">
                    <div class="block-header bg-primary-dark">
                        <h2 class="block-title">Videolar</h2>

                        <div class="block-options">
                            <button type="button" class="btn-block-option">
                                <a href="{{route('yonetim.Videolar.create')}}" class="btn btn-hero-light">
                                    <span class="d-none d-md-block">Video Ekle <i class="si si-plus"></i></span>
                                    <span class="d-block d-md-none">Ekle <i class="si si-plus"></i></span>
                                </a>
                            </button>
                        </div>
                    </div>
                    <div class="block-content p-2 mt-3">

                        <table class="table table-hover table-striped">
                            <thead class="bg-primary-dark-op">
                                <tr>
                                    <th scope="col" class="block-title text-body-color-light">#</th>
                                    <th scope="col" class="block-title text-body-color-light">Video</th>
                                    <th scope="col" class="block-title text-body-color-light">Düğün Salonu</th>
                                    <th scope="col" class="block-title text-body-color-light">Açıklama</th>
                                    <th scope="col" class="block-title text-body-color-light"></th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($videolar as $v)
                                <tr>
                                    <th scope="row">{{$loop->index+1}}.</th>
                                    <td class="p-2 m-0" style="width:17%"><iframe width="200" height="120" src="{{$v->youtubelink}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></td>
                                    <td>{{dugunsalonu($v->salon_id)}}</td>
                                    <td class="w-25">
                                        {{$v->aciklama}}
                                    </td>
                                    <td class="float-right"><a href="{{route('yonetim.Videolar.edit',$v->id)}}" class="btn btn-hero-sm btn-hero-primary">Göster <i
                                                class="si si-eye"></i></a> <a href="javascript:sil({{$v->id}});"
                                            class="btn btn-hero-sm btn-hero-danger">Sil <i class="si si-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach



                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-12 mx-auto my-5">
                                <div class="pag mx-auto">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>
    </div>
@endsection
@section('js')

    <script>
        function sil(id) {
            if (confirm('Video\'yu Silmek İstediğinize Emin misiniz?')) {
                var url = "{{ route('yonetim.Videolar.destroy', ':id') }}".replace(':id', id);
                $.ajax({
                    url: url,
                    method: "post",
                    data: {
                        '_token': "{{ csrf_token() }}",
                        '_method': "delete",
                        'id': id
                    },
                    success: function(d) {
                        if (d.status == 'ok')
                            location.reload();
                    }
                });

            }

        }

    </script>
@endsection
@section('css')
    <style>
        .pag {
            width: 13%;
        }

        .page-item {

            padding: 3px;
        }

        .page-link {
            border-radius: 10px;
            border: 1px solid #dadad0
        }

    </style>
@endsection
