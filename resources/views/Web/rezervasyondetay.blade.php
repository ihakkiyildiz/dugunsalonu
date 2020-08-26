@extends('layouts.web')
@section('title', 'Rezervasyonlar - ' . cekAyar('site-basligi'))
@section('ogtitle', 'Rezervasyon Detayları')
@section('ogsitename', env('APP_NAME'))
@section('ogsection', cekAyar('site-basligi') . ' - Rezervasyon Detayları')
@section('ogurl', url()->current())
@section('ogimage', cekAyar('logo'))
@section('content')

    <section class="container-fluid m-0 p-0">
        <div class="calendar-wrapper">
            <button id="btnPrev" type="button"><i class="fa fa-step-backward"></i> Önceki</button>
            <button id="btnNext" type="button">Sonraki <i class="fa fa-step-forward"></i></button>
            <div id="divCal"></div>
        </div>
    </section>
    <style>

    </style>
    <div class="modal" id="modal-block-vcenter" tabindex="-1" role="dialog" aria-labelledby="modal-block-vcenter"
        aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="block block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">
                            <b>ONLINE</b> <span class="font-weight-lighter">REZERVASYON</span>
                        </h3>
                    </div>
                    <div class="block-content">
                        <div class="row">

                            <div class="col-12 text-left mt-4">

                                <small class="font-weight-lighter">Rezervasyonunuzu gönderdikten sonra sizinle irtibata
                                    geçeceğiz</small>
                                <div class="row mt-4">
                                    <div class="col-12">
                                        <form action="{{ route('web.rezervasyon.post') }}" method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="col-12">
                                                    <small class="text-muted font-weight-lighter fs-8">ADINIZ
                                                        SOYADINIZ</small>
                                                    <input type="text" class="form-control fs-10 customInput" name="adsoyad"
                                                        id="adsoyad" placeholder="ADINIZ SOYADINIZ">
                                                </div>

                                                <div class="col-12">
                                                    <small class="text-muted font-weight-lighter fs-8">TELEFON
                                                        NUMARANIZ</small>
                                                    <input type="text" name="telefon" class="form-control fs-10 customInput"
                                                        id="telefon" placeholder="(5xx) xxx-xxxx">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <small class="text-muted font-weight-lighter fs-8">DÜĞÜN SALONU</small>
                                                    <select id="salon" name="salon" class="form-control fs-10 customInput">

                                                            <option value="{{ $salonlar->id }}">{{ $salonlar->adi }}</option>

                                                    </select>
                                                </div>

                                                <div class="col-12">
                                                    <small class="text-muted font-weight-lighter fs-8">REZERVASYON
                                                        TARİHİ</small>
                                                    <input type="date" class="form-control fs-10 customInput" name="tarih"
                                                        id="tarih2" value="{{ date('Y-m-d') }}" min="{{ date('Y-m-d') }}">
                                                </div>

                                                <div class="col-12">
                                                    <small class="text-muted font-weight-lighter fs-8">&nbsp;</small>
                                                    <input type="submit" class="fs-10 btn btn-block btnSubmit"
                                                        value="GÖNDER">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-content block-content-full bg-light">
                        <button type="button" class="btn btn-sm btn-danger col-3 btn-block float-right mb-3" data-dismiss="modal">İptal</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        var Cal = function(divId) {

            //Store div id
            this.divId = divId;

            // Days of week, starting on Sunday
            this.DaysOfWeek = [
                'Pzr',
                'Pzts',
                'Salı',
                'Çrş',
                'Prş',
                'Cuma',
                'Cmts'
            ];

            // Months, stating on January
            this.Months = ['Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran', 'Temmuz', 'Ağustos', 'Eylül', 'Ekim',
                'Kasım', 'Aralık'
            ];

            // Set the current month, year
            var d = new Date();

            this.currMonth = d.getMonth();
            this.currYear = d.getFullYear();
            this.currDay = d.getDate();

        };

        // Goes to next month
        Cal.prototype.nextMonth = function() {
            if (this.currMonth == 11) {
                this.currMonth = 0;
                this.currYear = this.currYear + 1;
            } else {
                this.currMonth = this.currMonth + 1;
            }
            this.showcurr();
        };

        // Goes to previous month
        Cal.prototype.previousMonth = function() {
            if (this.currMonth == 0) {
                this.currMonth = 11;
                this.currYear = this.currYear - 1;
            } else {
                this.currMonth = this.currMonth - 1;
            }
            this.showcurr();
        };

        // Show current month
        Cal.prototype.showcurr = function() {

            this.showMonth(this.currYear, this.currMonth);
            gunleriIsaretle();
        };


        // Show month (year, month)
        Cal.prototype.showMonth = function(y, m) {

            var d = new Date()
                // First day of the week in the selected month
                ,
                firstDayOfMonth = new Date(y, m, 1).getDay()
                // Last day of the selected month
                ,
                lastDateOfMonth = new Date(y, m + 1, 0).getDate()
                // Last day of the previous month
                ,
                lastDayOfLastMonth = m == 0 ? new Date(y - 1, 11, 0).getDate() : new Date(y, m, 0).getDate();

            var html = '<table>';

            // Write selected month and year
            html += '<thead><tr>';
            html += '<td colspan="7">' + this.Months[m] + ' ' + y + '</td>';
            html += '</tr></thead>';


            // Write the header of the days of the week
            html += '<tr class="days">';
            for (var i = 0; i < this.DaysOfWeek.length; i++) {
                html += '<td>' + this.DaysOfWeek[i] + '</td>';
            }
            html += '</tr>';


            // Write the days
            var i = 1;
            do {


                var dow = new Date(y, m, i).getDay();

                // If Sunday, start new row
                if (dow == 0) {
                    html += '<tr>';
                }
                // If not Sunday but first day of the month
                // it will write the last days from the previous month
                else if (i == 1) {
                    html += '<tr>';
                    var k = lastDayOfLastMonth - firstDayOfMonth + 1;
                    for (var j = 0; j < firstDayOfMonth; j++) {
                        html += '<td class="not-current">' + k + '</td>';
                        k++;
                    }
                }

                // Write the current day in the loop
                var chk = new Date();
                var chkY = chk.getFullYear();
                var chkM = chk.getMonth();
                if (chkY == this.currYear && chkM == this.currMonth && i == this.currDay) {
                    html += '<td class="bos"><span style="color:yellow">' + i + '</span></td>';
                } else if (chkY == this.currYear && chkM == this.currMonth && this.currDay > i) {
                    html += '<td class="dolu">' + i + '</td>';
                } else if (chkY > this.currYear || chkM > this.currMonth) {
                    html += '<td class="dolu">' + i + '</td>';
                } else {
                    html += '<td class="bos" data-tarih="' + y + '-' + (m + 1) + '-' + i + '" id="gun' + i + (m + 1) +
                        y + '">' + i + '</td>';
                }
                // If Saturday, closes the row
                if (dow == 6) {
                    html += '</tr>';
                }
                // If not Saturday, but last day of the selected month
                // it will write the next few days from the next month
                else if (i == lastDateOfMonth) {
                    var k = 1;
                    for (dow; dow < 6; dow++) {
                        html += '<td class="not-current">' + k + '</td>';
                        k++;
                    }
                }

                i++;
            } while (i <= lastDateOfMonth);

            // Closes table
            html += '</table>';

            // Write HTML to the div
            document.getElementById(this.divId).innerHTML = html;


        };

        // On Load of the window
        window.onload = function() {

            // Start calendar
            var c = new Cal("divCal");
            c.showcurr();

            // Bind next and previous button clicks
            getId('btnNext').onclick = function() {
                c.nextMonth();
            };
            getId('btnPrev').onclick = function() {
                c.previousMonth();
            };


            $(document).on("click", ".bos", function() {
                //alert($(this).data("tarih"))
                var yeniTarih = $(this).data("tarih");

                var t = yeniTarih.split("-");
                var d = new Date();
                var g = t[2];
                var a = t[1];
                if (g < 10) {
                    g = '0' + g
                }
                if (a < 10) {
                    a = '0' + a
                }

                //d.setDate(t[0], t[1], t[2],0,0,0);
                $("#tarih2").val(t[0] + "-" + a + "-" + g)
                $("#modal-block-vcenter").modal("show");
                console.log($("#tarih2").val())

            });

        }

        function gunleriIsaretle() {
            var arr = {!! $gunler !!};
            //        var arr = ["2020-08-16","2020-08-16","2020-08-16"];
            var gun = new Date();
            var list = "";
            var id = null;
            arr.forEach(function(key, ind) {
                list = key.split('-')
                id = "gun" + parseInt(list[2], 10) + parseInt(list[1], 10) + list[0];
                $('#' + id).removeClass('bos').addClass('dolu');
                console.log(id);
            })



        }

        // Get element by id
        function getId(id) {
            return document.getElementById(id);
        }

    </script>
    <script src="{{ asset('assets/js/dashmix.core.min.js') }}"></script>
    <script src="{{ asset('assets/js/dashmix.app.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery.maskedinput/jquery.maskedinput.min.js') }}"></script>

    <script>
        jQuery(function() {
            Dashmix.helpers(['masked-inputs', 'slick']);
            $('#telefon').mask('(999) 999-9999');

        });

    </script>

    @if (\Illuminate\Support\Facades\Session::has('status'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

        <script>
            Swal.fire(
                '{{ \Illuminate\Support\Facades\Session::get('
                status ') == '
                ok ' ? '
                Başarılı İşlem ' : '
                Başarısız İşlem ' }}',
                '{{ \Illuminate\Support\Facades\Session::get('
                message ') }}',
                '{{ \Illuminate\Support\Facades\Session::get('
                type ') == '
                danger ' ? '
                error ' : '
                success ' }}'
            )

        </script>
    @endif
    @if ($errors->any())
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

        <script>
            Swal.fire(
                'Başarısız İşlem',
                'Formda Hatalar Mevcut Tüm Alanları Doldurunuz',
                'error'
            )

        </script>
    @endif
@endsection

@section('css')
    <style>
        *,
        *:before,
        *:after {
            box-sizing: border-box;
        }

        .group:after {
            content: "";
            display: table;
            clear: both;
        }

        img {
            max-width: 100%;
            height: auto;
            vertical-align: baseline;
        }

        a {
            text-decoration: none;
        }

        /*RESİM BURAYA EKLENECEK*/
        .calendar-wrapper {
            width: 80%;
            margin: 3em auto;
            padding: 2em;
            border: 1px solid #dcdcff;
            border-radius: 5px;
            background: #fff;
            background-image: url("/css/img/takvimbg.jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }

        table {
            clear: both;
            width: 100%;
            border: 1px solid transparent;
            border-radius: 3px;
            border-collapse: collapse;
            color: #444;

        }

        td {
            height: 48px;
            text-align: center;
            vertical-align: middle;
            border: 1px solid rgb(194, 192, 192);
            width: 14.28571429%;
            cursor: pointer;

        }

        td.not-current {
            color: #c0c0c0;
        }

        thead td {
            border: none;
            color: #fff;
            text-transform: uppercase;
            font-size: 1.5em;
        }

        .days {
            color: #fff;
            font-weight: bold;
        }

        .normal,
        .dolu,
        .today {
            background-color: rgb(163, 73, 73);
            color: white;
        }

        #btnPrev {
            float: left;
            margin-bottom: 20px;
        }

        #btnPrev:before {
            content: '';
            font-family: FontAwesome;
            padding-right: 4px;
        }

        #btnNext {
            float: right;
            margin-bottom: 20px;
        }

        #btnNext:after {
            content: '';
            font-family: FontAwesome;
            padding-left: 4px;
        }

        #btnPrev,
        #btnNext {
            background: transparent;
            border: none;
            outline: none;
            font-size: 1em;
            color: #c0c0c0;
            cursor: pointer;
            font-family: "Roboto Condensed", sans-serif;
            text-transform: uppercase;
            -webkit-transition: all 0.3s ease;
            transition: all 0.3s ease;
        }

        #btnPrev:hover,
        #btnNext:hover {
            color: #fff;
            font-weight: bold;
        }


        .btnSubmit {
            font-size: 9pt;
            background-color: rgb(185, 151, 40);
            color: white;
            border-radius: 0;
        }

        .btnSubmit:hover {
            background-color: rgb(145, 118, 32);
            color: white;
        }

        .bos {
            background-color: rgb(73, 163, 73);
            color: white;
        }
        .modal-open {
            overflow: hidden;
        }

        .modal-open .modal {
            overflow-x: hidden;
            overflow-y: auto;
        }

        .modal {
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1050;
            display: none;
            width: 100%;
            height: 100%;
            overflow: hidden;
            outline: 0;
        }

        .modal-dialog {
            position: relative;
            width: auto;
            margin: 0.5rem;
            pointer-events: none;
        }

        .modal-dialog-centered {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-align: center;
      align-items: center;
  min-height: calc(100% - 1rem);
}

.modal-dialog-centered::before {
  display: block;
  height: calc(100vh - 1rem);
  content: "";
}

.modal-dialog-centered.modal-dialog-scrollable {
  -ms-flex-direction: column;
      flex-direction: column;
  -ms-flex-pack: center;
      justify-content: center;
  height: 100%;
}

.modal-dialog-centered.modal-dialog-scrollable .modal-content {
  max-height: none;
}

.modal-dialog-centered.modal-dialog-scrollable::before {
  content: none;
}


        .modal-content {
            position: relative;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-direction: column;
            flex-direction: column;
            width: 100%;
            pointer-events: auto;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid rgba(0, 0, 0, 0.2);
            border-radius: 0.3rem;
            outline: 0;
        }

        .block {
            margin-bottom: 1.75rem;
            background-color: #fff;
            box-shadow: 0 2px 6px rgba(230, 235, 244, 0.4);
            min-width: 100%;
        }

        .block-header {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-direction: row;
            flex-direction: row;
            -ms-flex-pack: justify;
            justify-content: space-between;
            -ms-flex-align: center;
            align-items: center;
            padding: 0.75rem 1.25rem;
            transition: opacity .25s ease-out;
        }

        .block-header.block-header-rtl {
            -ms-flex-direction: row-reverse;
            flex-direction: row-reverse;
        }

        .bg-primary-dark {
            background-color: #054d9e !important;
        }

        .block.block-themed>.block-header {
            border-bottom: none;
            color: #fff;
            background-color: #0665d0;
        }

        .block.block-themed>.block-header>.block-title {
            color: rgba(255, 255, 255, 0.9);
        }

        .block.block-themed .block-options .block-options-item {
            color: #fff;
        }

        .block.block-themed .btn-block-option {
            color: #fff;
            opacity: .7;
        }

        .block.block-transparent {
            background-color: transparent;
            box-shadow: none;
        }

        .block.block-mode-fullscreen.block-transparent {
            background-color: #fff;
        }

        .block-title {
            -ms-flex: 1 1 auto;
            flex: 1 1 auto;
            min-height: 1.75rem;
            margin: 0;
            font-size: 1.125rem;
            font-weight: 400;
            line-height: 1.75;
        }

        .block-header.block-header-rtl .block-options {
            padding-right: 1.25rem;
            padding-left: 0;
        }

        .block-options {
            -ms-flex: 0 0 auto;
            flex: 0 0 auto;
            padding-left: 1.25rem;
        }
        .block-content {
  transition: opacity .25s ease-out;
  width: 100%;
  margin: 0 auto;
  padding: 1.25rem 1.25rem 1px;
  overflow-x: visible;
}
.block-content.block-content-full {
  padding-bottom: 1.25rem;
}
.btn-hero-sm {
  padding: 0.375rem 1.25rem;
  font-size: 0.875rem;
  line-height: 1.5;
  border-radius: 0.25rem;
}
.btn-hero-danger {
  color: #fff;
  text-transform: uppercase;
  letter-spacing: .0625rem;
  font-weight: 700;
  padding: 0.625rem 1.5rem;
  font-size: 0.875rem;
  line-height: 1.5;
  border-radius: 0.25rem;
  background-color: #e04f1a;
  border: none;
  box-shadow: 0 0.125rem 0.75rem rgba(155, 55, 18, 0.25);
  transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, -webkit-transform 0.12s ease-out;
  transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, transform 0.12s ease-out;
  transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, transform 0.12s ease-out, -webkit-transform 0.12s ease-out;
}

.btn-hero-danger:hover {
  color: #fff;
  background-color: #e97044;
  box-shadow: 0 0.375rem 0.75rem rgba(155, 55, 18, 0.4);
  -webkit-transform: translateY(-1px);
          transform: translateY(-1px);
}

.btn-hero-danger:focus, .btn-hero-danger.focus {
  color: #fff;
  background-color: #e97044;
  box-shadow: 0 0.125rem 0.75rem rgba(155, 55, 18, 0.25);
}
        @media (max-width: 760px) {
            .calendar-wrapper {
                width: 100%;
            }
        }

        @media (min-width: 576px) {
  .modal-dialog {
    max-width: 500px;
    margin: 1.75rem auto;
  }
  .modal-dialog-scrollable {
    max-height: calc(100% - 3.5rem);
  }
  .modal-dialog-scrollable .modal-content {
    max-height: calc(100vh - 3.5rem);
  }
  .modal-dialog-centered {
    min-height: calc(100% - 3.5rem);
  }
  .modal-dialog-centered::before {
    height: calc(100vh - 3.5rem);
  }
  .modal-sm {
    max-width: 300px;
  }
}

    </style>
@endsection
