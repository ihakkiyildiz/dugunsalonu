@extends('layouts.backend')

@section('content')

    <div class="container mt-5 p-0 p-md-2">
        <div class="row mt-5 mb-5">
            <div class="col-12 col-md-12 mx-auto">
                <div class="block block-themed block-fx-shadow">
                    <div class="block-header bg-primary-dark">
                        <h2 class="block-title">Duyurular</h2>

                        <div class="block-options">
                            <button type="button" class="btn-block-option">
                                <a href="{{ route('yonetim.Duyurular.create') }}" class="btn btn-hero-light">
                                    <span class="d-none d-md-block">Duyuru Ekle <i class="si si-plus"></i></span>
                                    <span class="d-block d-md-none">Ekle <i class="si si-plus"></i></span>
                                </a>
                            </button>
                        </div>
                    </div>
                    <div class="block-content p-2 mt-3">

                        <table class="table table-striped">
                            <tr>
                                <td>#</td>
                                <td>Resim</td>
                                <td>Duyuru</td>
                                <td>AKSİYON</td>
                            </tr>
                            @foreach($duyurular as $d)
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td><img src="{{$d->image}}" class="img-thumbnail" alt=""></td>
                                    <td>{{$d->duyurutitle}}</td>
                                    <td><a href="{{route('yonetim.Duyurular.edit',$d->id)}}" class="btn btn-sm btn-primary">Göster</a> <a href="javascript:sil({{$d->id}})" class="btn btn-sm btn-danger"> SİL</a></td>
                                </tr>
                                @endforeach
                        </table>

                    </div>
                </div>


            </div>

        </div>
    </div>
@endsection
@section('js')

    <script>
        function sil(id) {
            if (confirm('Duyuruyu Silmek İstediğinize Emin misiniz?')) {
                var url = "{{ route('yonetim.Duyurular.destroy', ':id') }}".replace(':id', id);
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

