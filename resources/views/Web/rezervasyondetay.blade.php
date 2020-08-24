@extends('layouts.web')
@section('title',"Rezervasyonlar - ".cekAyar('site-basligi'))
@section('ogtitle','Rezervasyon Detayları')
@section('ogsitename',env('APP_NAME'))
@section('ogsection',cekAyar('site-basligi').' - Rezervasyon Detayları')
@section('ogurl',url()->current())
@section('ogimage',cekAyar('logo'))
@section('content')

    <section class="container-fluid m-0 p-0">
        <div class="calendar-wrapper">
            <button id="btnPrev" type="button"><i class="fa fa-step-backward"></i> Önceki</button>
            <button id="btnNext" type="button">Sonraki <i class="fa fa-step-forward"></i></button>
            <div id="divCal"></div>
        </div>
    </section>

    <div class="modal" id="modal-block-vcenter" tabindex="-1" role="dialog" aria-labelledby="modal-block-vcenter"
        aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="block block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">
                            <b>ONLINE</b> <span class="font-weight-lighter">REZERVASYON</span>
                        </h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="fa fa-fw fa-times"></i>
                            </button>
                        </div>
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
                                                        <option disabled selected>~Lütfen Seçiniz~</option>
                                                        @foreach ($salonlar as $s)
                                                            <option value="{{ $s->id }}">{{ $s->adi }}</option>
                                                        @endforeach
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
                    <div class="block-content block-content-full text-right bg-light">
                        <button type="button" class="btn btn-hero-sm btn-hero-danger" data-dismiss="modal">İptal</button>
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
                if(g<10){g='0'+g}
                if(a<10){a='0'+a}

                //d.setDate(t[0], t[1], t[2],0,0,0);
                $("#tarih2").val(t[0]+"-"+ a+"-"+ g)
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
    <script src="{{asset('assets/js/dashmix.core.min.js')}}"></script>
    <script src="{{asset('assets/js/dashmix.app.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/jquery.maskedinput/jquery.maskedinput.min.js')}}"></script>

    <script>

        jQuery(function() {
            Dashmix.helpers(['masked-inputs','slick']);
            $('#telefon').mask('(999) 999-9999');

        });
    </script>

    @if(\Illuminate\Support\Facades\Session::has('status'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

        <script>
            Swal.fire(
                '{{\Illuminate\Support\Facades\Session::get('status')=='ok'?'Başarılı İşlem':'Başarısız İşlem'}}',
                '{{\Illuminate\Support\Facades\Session::get('message')}}',
                '{{\Illuminate\Support\Facades\Session::get('type')=='danger'?'error':'success'}}'
            )
        </script>
    @endif
    @if($errors->any())
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
    <link rel="stylesheet" id="css-main" href="{{ asset('assets/css/dashmix.min.css') }}">
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

        @media (max-width: 760px) {
            .calendar-wrapper {
                width: 100%;
            }
        }

    </style>
@endsection
