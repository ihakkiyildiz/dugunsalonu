@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row mt-5 mb-5">
            <div class="col-12 col-md-12 mx-auto">
                <h1 class="text-muted text-center">Hizmetlerimiz Sayfası Ayarları</h1>
                <!--FORM-->
                <a href="{{ route('yonetim.Hizmetler.create') }}"
                    class="btn col-6 col-md-2 float-right mb-4 btn-hero-sm btn-hero-primary">Ekle <i
                        class="fa fa-plus-circle"></i></a>
                <table class="table table-hover table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Hizmet Adı</th>
                            <th scope="col" class="text-center">İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hizmetler as $h)
                            <tr>
                                <th scope="row">{{ $loop->index + 1 }}.</th>
                                <td>{{ $h->sayfatitle }}</td>
                                <td colspan="2" class="float-right">

                                    <a href="{{ route('yonetim.Hizmetler.edit', $h->id) }}"
                                        class="btn btn-hero-primary btn-hero-sm"><i class="fa fa-edit"></i> Düzenle</a>

                                    <a href="#" type="submit" class="btn btn-hero-danger btn-hero-sm"><i
                                            class="fa fa-trash"></i> Sil</a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('js')

    <script>

    </script>
@endsection

@section('css')
    <style>

    </style>
@endsection
