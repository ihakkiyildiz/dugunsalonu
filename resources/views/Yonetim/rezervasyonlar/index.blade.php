@extends('layouts.backend')

@section('content')

    <div class="container mt-5 p-0 p-md-2">
        <div class="row mt-5 mb-5">
            <div class="col-12 col-md-12 mx-auto">
                <div class="block block-themed block-fx-shadow">
                    <div class="block-header bg-primary-dark">
                        <h2 class="block-title">Gelen Rezervasyonlar</h2>

                        <div class="block-options">
                            <button type="button" class="btn-block-option">
                                <a href="{{ route('yonetim.Rezervasyonlar.create') }}" class="btn btn-hero-light">
                                    <span class="d-none d-md-block">Rezervasyon Ekle <i class="si si-plus"></i></span>
                                    <span class="d-block d-md-none">Ekle <i class="si si-plus"></i></span>
                                </a>
                            </button>
                        </div>
                    </div>
                    <div class="block-content p-2 mt-3">

                        <!--FORM-->
                        {{$dataTable->table()}}
                    </div>
                </div>


            </div>

        </div>
    </div>
@endsection
@section('js')
    <script src="/assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/assets/js/plugins/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="/assets/js/plugins/datatables/buttons/dataTables.buttons.min.js"></script>
    <script src="/assets/js/plugins/datatables/buttons/buttons.print.min.js"></script>



    <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>

    {{$dataTable->scripts()}}
    <script>
        $(function () {
              $('#rezervasyontablo thead').addClass('bg-primary-dark-op text-light')
              $('#rezervasyontablo').addClass('table-hover table-stripped')
        })
        function sil(id) {
            if (confirm('Rezervasyonu Silmek İstediğinize Emin misiniz?')) {
                var url = "{{ route('yonetim.Rezervasyonlar.destroy', ':id') }}".replace(':id', id);
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
                var url = "{{ route('yonetim.Rezervasyonlar.update', ':id') }}".replace(':id', id);
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

@section('css')

@endsection
