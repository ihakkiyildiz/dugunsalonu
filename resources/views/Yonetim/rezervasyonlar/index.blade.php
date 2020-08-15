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
@endsection

@section('css')

@endsection
