@extends('layouts.backend')

@section('content')

    <div class="container mt-5 p-0 p-md-2">
        <div class="row mt-5 mb-5">
            <div class="col-12 col-md-12 mx-auto">
                <div class="block block-themed block-fx-shadow">
                    <div class="block-header bg-primary-dark">
                        <h2 class="block-title">Ziyaretçi Yorumları</h2>

                        <div class="block-options">
                            <button type="button" class="btn-block-option">
                                <a href="{{ route('yonetim.ZiyaretciDefteri.create') }}" class="btn btn-hero-light">
                                    <span class="d-none d-md-block">Ziyaretçi Yorumu Ekle <i class="si si-plus"></i></span>
                                    <span class="d-block d-md-none">Ekle <i class="si si-plus"></i></span>
                                </a>
                            </button>
                        </div>
                    </div>
                    <div class="block-content p-2 mt-3">

                        <table class="table table-hover table-striped table-responsive-sm">
                            <thead class="bg-primary-dark-op">
                                <tr>
                                    <th scope="col" class="block-title text-body-color-light">#</th>
                                    <th scope="col" class="block-title text-body-color-light">Ad Soyad</th>
                                    <th scope="col" class="block-title text-body-color-light">E-Posta</th>
                                    <th scope="col" class="block-title text-body-color-light">Z. Notu</th>
                                    <th scope="col" class="block-title text-body-color-light"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($zd as $z)
                                <tr>
                                    <th scope="row">{{$loop->index+1}}.</th>
                                    <td><strong>{{$z->adsoyad}}</strong></td>

                                    <td>{{$z->email}}</td>
                                    <td class="w-25">{!! $z->mesaj !!}</td>
                                    <td class="float-right">
                                        <div class="form-group text-center">
                                            <div class="custom-control custom-switch">
                                               <input type="checkbox" class="custom-control-input" id="durum" onchange="javascript:durumdegistir({{$z->id}})" name="durum" @if($z->durum==1) checked @endif>
                                                <label class="custom-control-label" for="durum">Göster</label>
                                            </div>
                                        </div>

                                        <div class="text-center text-md-right">
                                        <a href="{{ route('yonetim.ZiyaretciDefteri.edit', $z->id) }}" class="btn btn-hero-primary btn-hero-sm">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="javascript:sil({{$z->id}})" class="btn btn-hero-danger btn-hero-sm mt-2 mt-md-0">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
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
            if (confirm('Ziyaretçi Yorumunu Silmek İstediğinize Emin misiniz?')) {
                var url = "{{ route('yonetim.ZiyaretciDefteri.destroy', ':id') }}".replace(':id', id);
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
        function durumdegistir(id)
        {
            if (confirm('Durumu değiştirmek istediğinize emin misiniz?')) {
                var url = "{{ route('yonetim.ZiyaretciDefteri.update', ':id') }}".replace(':id', id);
                $.ajax({
                    url: url,
                    method: "post",
                    data: {
                        '_token': "{{ csrf_token() }}",
                        '_method': "patch",
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
