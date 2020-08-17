<section class="container text-center mt-4 d-block d-md-none">
    <div>
        <a href="{{ route('web.index') }}"><img src="{{ cekAyar('logo') ?? asset('/css/img/logo.png') }}"
                alt="Ana Sayfa"></a>
    </div>
</section>

<!--LOGO & NAVBAR-->
<section class="container text-center mt-4 d-none d-md-block">
    <nav class="navbar navbar-light navbar-expand-md w-100">
        <a href="{{ route('web.index') }}" class="navbar-brand"><img
                src="{{ cekAyar('logo') ?? asset('/css/img/logo.png') }}" alt="Ana Sayfa"></a>
        <button class="navbar-toggler navbar-brand border-0 w-100" type="button" data-toggle="collapse"
            data-target="#NAV" aria-controls="NAV" aria-expanded="false" style="outline:none" aria-label="Gezintiyi Aç">
            <span class="navbar-toggler-icon fs-10"></span>
        </button>

        <div id="NAV" class="collapse navbar-collapse text-left mt-3">
            <ul class="navbar-nav list-group fs-10">
                <li class="nav-item active dNavItem">
                    <a href="{{ route('web.index') }}" class="nav-link text-uppercase"><i
                            class="fa fa-home mr-1 navIcon"></i> Ana
                        Sayfa</a>
                    <hr class="mt-0 mb-1" />
                </li>
                <li class="nav-item dropdown dNavItem">
                    <a class="nav-link text-uppercase dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-info-circle mr-1 navIcon"></i> Hakkımızda
                    </a>
                    <div class="dropdown-menu fs-10 mt-0" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item px-3 mainDropdown" href="{{ route('web.sayfa', 'hakkinda') }}"><i
                                class="fas fa-bullseye mr-1 navIcon fs-9"></i> Hakkımızda</a>
                        <hr class="mb-0 mt-2 mx-3">
                        <a class="dropdown-item px-3 mainDropdown" href="{{ route('web.sayfa', 'misyon') }}"><i
                                class="fas fa-bullseye mr-1 navIcon fs-9"></i> Misyonumuz</a>
                        <hr class="mb-0 mt-2 mx-3">
                        <a class="dropdown-item px-3 mainDropdown" href="{{ route('web.sayfa', 'vizyon') }}"><i
                                class="fas fa-bullseye mr-1 navIcon fs-9"></i> Vizyonumuz</a>

                    </div>
                    <hr class="mt-0 mb-1" />
                </li>
                <li class="nav-item dNavItem">
                    <a href="{{route('web.hizmetler')}}" class="nav-link text-uppercase"><i
                            class="fa fa-sticky-note mr-1 navIcon"></i>
                        Hizmetlerimiz</a>
                    <hr class="mt-0 mb-1" />
                </li>
                <li class="nav-item dNavItem">
                    <a href="{{route('web.salonlar')}}" class="nav-link text-uppercase"><i
                            class="fas fa-images mr-1 navIcon"></i>
                        Salonlarımız</a>
                    <hr class="mt-0 mb-1" />
                </li>
                <li class="nav-item dNavItem">
                    <a href="{{route('web.duyurular')}}" class="nav-link text-uppercase"><i
                            class="fa fa-newspaper mr-1 navIcon"></i>
                        Duyurular</a>
                    <hr class="mt-0 mb-1" />
                </li>
                <li class="nav-item dNavItem">
                    <a href="{{route('web.ziyaretcidefteri')}}" class="nav-link text-uppercase"><i
                            class="fas fa-pencil-alt mr-1 navIcon"></i>
                        Z. Defteri</a>
                    <hr class="mt-0 mb-1" />
                </li>
                <li class="nav-item dNavItem">
                    <a href="{{route('web.iletisim')}}" class="nav-link text-uppercase"><i class="fa fa-phone-alt mr-1 navIcon"></i>
                        İletişim</a>
                </li>
            </ul>
        </div>
    </nav>
</section>

<!--NAVBAR MOBİL-->
<section class="container text-center mt-2 d-block d-md-none">
    <div>
        <nav class="navbar navbar-light bg-grey">
            <button class="navbar-toggler navbar-brand border-0 w-100" type="button" data-toggle="collapse"
                data-target="#NAV" aria-controls="NAV" aria-expanded="false" style="outline:none"
                aria-label="Gezintiyi Aç">
                <span class="navbar-toggler-icon fs-10"></span>
            </button>

            <div id="NAV" class="collapse navbar-collapse text-left mt-3">
                <ul class="navbar-nav list-group fs-10">
                    <li class="nav-item active">
                        <a href="{{ route('web.index') }}" class="nav-link text-uppercase"><i
                                class="fa fa-home mr-3"></i> Ana
                            Sayfa</a>
                        <hr class="mt-0 mb-1" />
                    </li>
                    <li class="nav-item dropdown dNavItem">
                        <a class="nav-link text-uppercase dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-info-circle mr-2 navIcon"></i> Hakkımızda
                        </a>
                        <div class="dropdown-menu fs-10 mt-0" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item px-3 mainDropdown" href="{{route('web.sayfa','hakkinda')}}"><i
                                    class="fas fa-bullseye mr-2 navIcon fs-9"></i> Hakkımızda</a>
                            <hr class="mb-0 mt-2 mx-3">
                            <a class="dropdown-item px-3 mainDropdown" href="{{route('web.sayfa','misyon')}}"><i
                                    class="fas fa-bullseye mr-2 navIcon fs-9"></i> Misyonumuz</a>
                            <hr class="mb-0 mt-2 mx-3">
                            <a class="dropdown-item px-3 mainDropdown" href="{{route('web.sayfa','vizyon')}}"><i
                                    class="fas fa-bullseye mr-2 navIcon fs-9"></i> Vizyonumuz</a>

                        </div>
                        <hr class="mt-0 mb-1" />
                    </li>
                    <li class="nav-item dNavItem">
                        <a href="{{route('web.hizmetler')}}" class="nav-link text-uppercase"><i
                                class="fa fa-sticky-note mr-2 navIcon"></i>
                            Hizmetlerimiz</a>
                        <hr class="mt-0 mb-1" />
                    </li>
                    <li class="nav-item dNavItem">
                        <a href="{{route('web.salonlar')}}" class="nav-link text-uppercase"><i
                                class="fas fa-images mr-2 navIcon"></i>
                            Salonlarımız</a>
                        <hr class="mt-0 mb-1" />
                    </li>
                    <li class="nav-item dNavItem">
                        <a href="{{route('web.duyurular')}}" class="nav-link text-uppercase"><i
                                class="fa fa-newspaper mr-2 navIcon"></i>
                            Duyurular</a>
                        <hr class="mt-0 mb-1" />
                    </li>
                    <li class="nav-item dNavItem">
                        <a href="{{route('web.ziyaretcidefteri')}}" class="nav-link text-uppercase"><i
                                class="fas fa-pencil-alt mr-2 navIcon"></i>
                            Z. Defteri</a>
                        <hr class="mt-0 mb-1" />
                    </li>
                    <li class="nav-item dNavItem">
                        <a href="{{route('web.iletisim')}}" class="nav-link text-uppercase"><i
                                class="fa fa-phone-alt mr-2 navIcon"></i>
                            İletişim</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</section>
