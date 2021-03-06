@extends('layouts.backend')

@section('content')

    <div class="container mt-5 p-0 p-md-2">
        <div class="row mt-5 mb-5">
            <div class="col-12 col-md-12 mx-auto">
                <div class="block block-themed block-fx-shadow">
                    <div class="block-header bg-primary-dark">
                        <h2 class="block-title">Hizmetlerimiz Sayfası <small>Ayarları</small></h2>

                        <div class="block-options">
                            <button type="button" class="btn-block-option">
                                <a href="{{ route('yonetim.Hizmetler.create') }}" class="btn btn-hero-light">Hizmet Ekle <i
                                        class="si si-plus"></i></a>
                            </button>
                        </div>
                    </div>
                    <div class="block-content p-0">

                        <!--FORM-->
                        <table class="table table-hover table-striped">
                            <thead class="bg-primary-dark-op">
                                <tr>
                                    <th scope="col" class="block-title text-body-color-light">id</th>
                                    <th scope="col" class="block-title text-body-color-light">HİZMET ADI</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($hizmetler as $h)
                                    <tr>
                                        <th scope="row">{{ $loop->index + 1 }}.</th>
                                        <td>{{ $h->sayfatitle }}</td>
                                        <td colspan="2" class="float-right">

                                            <a href="{{ route('yonetim.Hizmetler.edit', $h->id) }}"
                                                class="btn btn-hero-primary btn-hero-sm"><i class="fa fa-edit"></i>
                                                Düzenle</a>

                                            <a href="javascript:sil({{ $h->id }})" type="submit"
                                                class="btn btn-hero-danger btn-hero-sm"><i class="fa fa-trash"></i> Sil</a>
                                        </td>
                                    </tr>
                                @endforeach

                                @if (count($hizmetler) == 0)
                                    <tr>
                                        <td colspan="3" class="text-center">
                                            <h4 class="text-muted">Hizmet Bulunmamaktadır.</h4>
                                        </td>
                                    </tr>
                                @endif
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
            if (confirm('Hizmeti Silmek İstediğinize Emin misiniz?')) {
                var url = "{{ route('yonetim.Hizmetler.destroy', ':id') }}".replace(':id', id);
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

    </style>
@endsection
