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
                                    <th scope="col" class="block-title text-body-color-light">Telefon</th>
                                    <th scope="col" class="block-title text-body-color-light">E-Posta</th>
                                    <th scope="col" class="block-title text-body-color-light">Z. Notu</th>
                                    <th scope="col" class="block-title text-body-color-light"></th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <th scope="row">1.</th>
                                    <td><strong>Abdullah YILDIZ</strong></td>
                                    <td>05078873651</td>
                                    <td>abdullahyildiz@gmail.com</td>
                                    <td class="w-25">Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat debitis hic
                                        consequatur commodi odio voluptatem cupiditate deserunt. Similique eaque repellendus
                                        inventore itaque ex sed aspernatur, ut ea quis molestias doloremque.</td>
                                    <td class="float-right">
                                        <div class="form-group text-center">
                                            <div class="custom-control custom-switch">
                                    
                                                <input type="checkbox" class="custom-control-input" id="durum" name="durum" checked>
                                                <label class="custom-control-label" for="durum">Göster</label>
                                            </div>
                                        </div>

                                        <div class="text-center text-md-right">
                                        <a href="{{ route('yonetim.ZiyaretciDefteri.edit', 2) }}" class="btn btn-hero-primary btn-hero-sm">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="#" class="btn btn-hero-danger btn-hero-sm mt-2 mt-md-0">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>


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
