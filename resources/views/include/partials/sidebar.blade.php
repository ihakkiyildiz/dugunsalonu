
<nav id="sidebar" aria-label="Main Navigation">
    <!-- Side Header -->
    <div class="bg-header-dark">
        <div class="content-header bg-white-10">
            <!-- Logo -->
            <a class="link-fx font-w600 font-size-lg text-white" href="{{route('yonetim.index')}}">
                <span class="smini-visible">
                    <span class="text-white-75">D</span><span class="text-white">x</span>
                </span>
                <span class="smini-hidden">
                    <span class="text-white">Vadi Park</span>
                </span>
            </a>
            <!-- END Logo -->

            <!-- Options -->

            <!-- END Options -->
        </div>
    </div>
    <!-- END Side Header -->

    <!-- Side Navigation -->
    <div class="content-side content-side-full">
        <ul class="nav-main">
            <li class="nav-main-item">
                <a class="nav-main-link" href="{{route('yonetim.index')}}">
                    <i class="nav-main-link-icon si si-home"></i>
                    <span class="nav-main-link-name">Ana Sayfa</span>

                </a>
            </li>
            <li class="nav-main-item">
                <a class="nav-main-link" href="{{request()->getSchemeAndHttpHost()}}" target="_blank">
                    <i class="nav-main-link-icon si si-cursor"></i>
                    <span class="nav-main-link-name">Siteye Git</span>

                </a>
            </li>
            <li class="nav-main-heading">GENEL AYARLAR</li>
            <li class="nav-main-item">
                <a class="nav-main-link" href="{{route('yonetim.Ayarlar.index')}}">
                    <i class="nav-main-link-icon si si-settings"></i><span class="nav-main-link-name">Ayarlar</span>
                </a>
            </li>
            <li class="nav-main-item">
                <a class="nav-main-link" href="{{route('yonetim.Galeri.index')}}">
                    <i class="nav-main-link-icon fas fa-images"></i><span class="nav-main-link-name">Galeri</span>
                </a>
            </li>
            <li class="nav-main-item">
                <a class="nav-main-link" href="{{route('yonetim.Videolar.index')}}">
                    <i class="nav-main-link-icon fas fa-images"></i><span class="nav-main-link-name">Videolar</span>
                </a>
            </li>
            <li class="nav-main-heading">SAYFA YÖNETİMİ</li>
            <li class="nav-main-item">
                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                    <i class="nav-main-link-icon fa fa-outdent"></i>
                    <span class="nav-main-link-name">Sabit Sayfalar</span>
                </a>
                <ul class="nav-main-submenu">
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{route('yonetim.Hakkinda.index')}}">
                            <span class="nav-main-link-name">Hakkımızda</span>

                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{route('yonetim.Vizyon.index')}}">
                            <span class="nav-main-link-name">Vizyon</span>

                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{route('yonetim.Misyon.index')}}">
                            <span class="nav-main-link-name">Misyon</span>

                        </a>
                    </li>

                </ul>
            </li>
            <li class="nav-main-item">
                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                    <i class="nav-main-link-icon fab fa-servicestack"></i>
                    <span class="nav-main-link-name">Hizmetlerimiz</span>
                </a>
                <ul class="nav-main-submenu">
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{route('yonetim.Hizmetler.index')}}">
                            <span class="nav-main-link-name">Hizmetlerimiz</span>
                        </a>
                    </li>

                </ul>
            </li>
            <li class="nav-main-item">
                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                    <i class="nav-main-link-icon fa fa-bullhorn"></i>
                    <span class="nav-main-link-name">Duyurular</span>
                </a>
                <ul class="nav-main-submenu">
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{route('yonetim.Duyurular.index')}}">
                            <span class="nav-main-link-name">Duyurular</span>
                        </a>
                    </li>

                </ul>
            </li>
            <li class="nav-main-item">
                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                    <i class="nav-main-link-icon far fa-building"></i>
                    <span class="nav-main-link-name">Salonlar</span>
                </a>
                <ul class="nav-main-submenu">
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{route('yonetim.Salonlar.index')}}">
                            <span class="nav-main-link-name">Salonlar</span>
                        </a>
                    </li>

                </ul>
            </li>
            <li class="nav-main-item">
                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                    <i class="nav-main-link-icon fa fa-list-alt"></i>
                    <span class="nav-main-link-name">Rezervasyonlar</span>
                </a>
                <ul class="nav-main-submenu">
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{route('yonetim.Rezervasyonlar.index')}}">
                            <span class="nav-main-link-name">Gelen Rezervasyonlar</span>
                        </a>
                    </li>

                </ul>
            </li>

            <li class="nav-main-heading">İLETİŞİM ALANI</li>

                       <li class="nav-main-item">
                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                    <i class="nav-main-link-icon si si-notebook"></i>
                    <span class="nav-main-link-name">Ziyaretçi Defteri</span>
                </a>
                <ul class="nav-main-submenu">
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{route('yonetim.ZiyaretciDefteri.index')}}">
                            <span class="nav-main-link-name">Defter Yönetimi</span>
                        </a>
                    </li>

                </ul>


            <li class="nav-main-item">
                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                    <i class="nav-main-link-icon si si-users"></i>
                    <span class="nav-main-link-name">Kullanıcılar</span>
                </a>
                <ul class="nav-main-submenu">
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{route('yonetim.Kullanicilar.index')}}">
                            <span class="nav-main-link-name">Kullanıcılar</span>
                        </a>
                    </li>

                </ul>
            </li>

        </ul>
    </div>
    <!-- END Side Navigation -->
</nav>
