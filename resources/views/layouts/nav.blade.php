<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <strong>Lelangin</strong>Store.com
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse font-weight-bold" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a id="searchnav" class="nav-link" href="#" data-toggle="dropdown">
                        <i class="fa fa-search"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right p-3" aria-labelledby="searchnav">
                        <li class="dropdown-submenu">
                            <form action="{{ url('search') }}" method="get">
                                <input type="text" class="form-control form-control-sm" name="q"
                                    placeholder="Pencarian">
                            </form>
                        </li>
                    </ul>
                </li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('login') ? 'active' : '' }}"
                            href="{{ route('login') }}">{{ __('Log In') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('register') ? 'active' : '' }}"
                                href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            {{ strtoupper(Auth::user()->username) }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            @if (Auth::user()->role == 'admin')
                                <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle font-weight-bold" href="#">
                                        Administrator
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item font-weight-bold" href="#">
                                                Kategori
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item font-weight-bold" href="#">
                                                Brand
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item font-weight-bold" href="#">
                                                Pengguna
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item font-weight-bold" href="#">
                                                Verifikasi Akun
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item font-weight-bold" href="#">
                                                Daftar Lelang
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <div class="dropdown-divider"></div>
                            @elseif (Auth::user()->role == 'user')
                                @if (Auth::user()->email_verified_at == null)
                                    <li>
                                        <a class="dropdown-item font-weight-bold" href="{{ url('/email/verify') }}">
                                            Verifikasi Email!
                                        </a>
                                    </li>
                                @else
                                    @if (Auth::user()->kyc == 0 && kycstatus() == 0)
                                        <li>
                                            <a class="dropdown-item font-weight-bold"
                                                href="{{ route('kycverification') }}">
                                                Verifikasi Data Diri!
                                            </a>
                                        </li>
                                    @elseif(kycstatus() > 0)
                                        <li class="dropdown-item font-weight-bold">
                                            Menunggu Verifikasi KYC
                                        </li>
                                    @elseif(Auth::user()->kyc == 1)
                                        <li>
                                            <a class="dropdown-item font-weight-bold" href="#">
                                                Profil
                                            </a>
                                        </li>
                                    @endif
                                @endif
                                <div class="dropdown-divider"></div>
                            @endif
                            <li>
                                <a class="dropdown-item font-weight-bold" href="#">
                                    Pengaturan
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item font-weight-bold" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Keluar
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="notification" class="nav-link" href="#" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false" v-pre>
                            <i class="fas fa-bell"></i>
                            <span class="badge badge-pill badge-danger">0</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="notification">
                            <a class="dropdown-item" style="cursor: pointer;">
                                <span class="fas fa-exclamation-circle"></span>
                                Tidak Ada Pemberitahuan
                            </a>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
