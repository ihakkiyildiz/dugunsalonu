@extends('layouts.backend')

@section('content')
    <div class="container">
        <form class="js-validation" action="{{route('yonetim.Galeri.store')}}" method="POST" enctype="multipart/form-data" novalidate="novalidate">
            <div class="block block-rounded block-bordered">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Galeri Resim Ekle</h3>
                    <div class="block-options">
                        <button type="submit" class="btn btn-sm btn-light">
                            <i class="fa fa-fw fa-check"></i> Gönder
                        </button>
                    </div>
                </div>
                @csrf
                <div class="block-content block-content-full">
                    <div class="">
                        <!-- Regular -->
                        <h2 class="content-heading">Galeriye Resim Ekle</h2>
                        <div class="row items-push">
                            <div class="col-lg-4">
                                <p class="text-muted">
                                   Resimle İlgili Bilgileri Doldurmanız Gerekmektir.
                                </p>
                            </div>
                            <div class="col-lg-8 col-xl-5">
                                <div class="form-group">
                                    <label for="aciklama">Açıklama </label>
                                    <input type="text" class="form-control" id="aciklama" name="aciklama" placeholder="Açıklama">
                                </div>

                                <div class="form-group">
                                    <label for="link">Link </label>
                                    <input type="text" class="form-control" id="link" name="link" placeholder="Eğer URL olarak kullanılacaksa">
                                </div>
                                <div class="form-group">
                                    <label for="resim">Resim <span class="text-danger">*</span></label>
                                    <input type="file" class="form-control" id="resim" name="resim" placeholder="..Resim Seç">
                                </div>
                                <div class="form-group">
                                    <label for="yer">Yer <span class="text-danger">*</span></label>
                                    <select name="yer" id="yer">
                                        <option value="galeri">Galeri</option>
                                        <option value="alt">Alt Kısım</option>
                                        <option value="liste">Slider</option>
                                        <option value="site_ici" >Site İçinde Kullanılacaklar</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="sira">Sıra <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="sira" name="sira" value="0">
                                </div>
                                <div class="form-group">

                                    <input type="checkbox" class="form-check-input" id="durum" name="durum">
                                    <label for="durum">Durum <span class="text-danger">*</span></label>
                                </div>
                            </div>
                        </div>
                        <!-- END Regular -->



                        <!-- Submit -->
                        <div class="row items-push">
                            <div class="col-lg-7 offset-lg-4">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                        <!-- END Submit -->
                    </div>
                </div>
            </div>
        </form>
    </div>

    @endsection

@section('js')

    @endsection
