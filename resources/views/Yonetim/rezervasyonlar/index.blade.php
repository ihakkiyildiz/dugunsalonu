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
                        <table class="table table-hover table-striped table-responsive" id="rezervasyonlarTablo">
                            <thead class="bg-primary-dark-op">
                                <tr>
                                    <th scope="col" class="block-title text-body-color-light">id</th>
                                    <th scope="col" class="block-title text-body-color-light">Tarih</th>
                                    <th scope="col" class="block-title text-body-color-light">Ad Soyad</th>
                                    <th scope="col" class="block-title text-body-color-light">Telefon</th>
                                    <th scope="col" class="block-title text-body-color-light">Not</th>
                                    <th scope="col"></th>

                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <input type="hidden" name="salon_id" id="salon_id" />
                                    <th scope="row">1.</th>
                                    <td>
                                        12.08.2020
                                    </td>
                                    <td>
                                        Abdullah YILDIZ
                                    </td>
                                    <td>
                                        05078873651
                                    </td>
                                    <td class="w-25">
                                        Her şeyin düzgün olmasını istiyorum. Elinizden geleni yaparsanız sevinirim.
                                    </td>
                                    <td class="text-right">
                                        <a href="#" class="btn btn-hero-success btn-hero-sm"><i class="fa fa-check"></i></a>
                                        <a href="#" class="btn btn-hero-primary btn-hero-sm"><i class="fa fa-edit"></i></a>
                                        <a href="#" type="submit" class="btn btn-hero-danger btn-hero-sm"><i
                                                class="fa fa-trash"></i></a>
                                    </td>
                                </tr>

                                <tr>
                                    <input type="hidden" name="salon_id" id="salon_id" />
                                    <th scope="row">2.</th>
                                    <td>
                                        12.08.2020
                                    </td>
                                    <td>
                                        İsmail Hakkı YILDIZ
                                    </td>
                                    <td>
                                        05xxxxxxx
                                    </td>
                                    <td class="w-25">
                                        Pazar günü şirket toplantısı için düzenlenmesini istiyorum.
                                    </td>
                                    <td class="text-right w-auto">
                                        <a href="#" class="btn btn-hero-success btn-hero-sm"><i class="fa fa-check"></i></a>
                                        <a href="#" class="btn btn-hero-primary btn-hero-sm"><i class="fa fa-edit"></i></a>
                                        <a href="#" type="submit" class="btn btn-hero-danger btn-hero-sm"><i
                                                class="fa fa-trash"></i></a>
                                    </td>
                                </tr>

                                <tr>
                                    <input type="hidden" name="salon_id" id="salon_id" />
                                    <th scope="row">3.</th>
                                    <td>
                                        12.08.2020
                                    </td>
                                    <td>
                                        Ali Ülger
                                    </td>
                                    <td>
                                        05xxxxxxx
                                    </td>
                                    <td class="w-25">
                                        Keyfi rezervasyon yapıyorum o gün kimse evlenmesin :d
                                    </td>
                                    <td class="text-right">
                                        <a href="#" class="btn btn-hero-success btn-hero-sm"><i class="fa fa-check"></i></a>
                                        <a href="#" class="btn btn-hero-primary btn-hero-sm"><i class="fa fa-edit"></i></a>
                                        <a href="#" type="submit" class="btn btn-hero-danger btn-hero-sm"><i
                                                class="fa fa-trash"></i></a>
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
    <script src="{{ asset('assets/js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready(() => {
            $("#rezervasyonlarTablo").DataTable({
                "language": {
                    "sDecimal": ",",
                    "sEmptyTable": "Tabloda herhangi bir veri mevcut değil",
                    "sInfo": "_TOTAL_ kayıttan _START_ - _END_ arasındaki kayıtlar gösteriliyor",
                    "sInfoEmpty": "Kayıt yok",
                    "sInfoFiltered": "(_MAX_ kayıt içerisinden bulunan)",
                    "sInfoPostFix": "",
                    "sInfoThousands": ".",
                    "sLengthMenu": "Sayfada _MENU_ kayıt göster",
                    "sLoadingRecords": "Yükleniyor...",
                    "sProcessing": "İşleniyor...",
                    "sSearch": "Ara:",
                    "sZeroRecords": "Eşleşen kayıt bulunamadı",
                    "oPaginate": {
                        "sFirst": "İlk",
                        "sLast": "Son",
                        "sNext": "Sonraki",
                        "sPrevious": "Önceki"
                    },
                    "oAria": {
                        "sSortAscending": ": artan sütun sıralamasını aktifleştir",
                        "sSortDescending": ": azalan sütun sıralamasını aktifleştir"
                    },
                    "select": {
                        "rows": {
                            "_": "%d kayıt seçildi",
                            "0": "",
                            "1": "1 kayıt seçildi"
                        }
                    }
                }
            });
        });
        /*
            "lengthMenu": "Sayfa Başına _MENU_ Öge Gösteriliyor",
            "zeroRecords": "Bulunamadı.",
            "info": "Sayfa Sayısı: _PAGES_ Mevcut Sayfa: _PAGE_",
            "infoEmpty": "Hiç rezervasyon yok",
            "search": "Ara",
        */

    </script>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/datatables/dataTables.bootstrap4.css') }}">
    <style>

    </style>
@endsection
