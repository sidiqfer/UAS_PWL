<nav class="navbar top-navbar col-lg-12 col-12 p-0">
    <div class="container">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <a class="navbar-brand brand-logo" href="{{ url('/') }}">
                <!-- <img src="../../images/logo-light.svg" alt="logo"/> -->
                <span class="h3 font-weight-bold text-dark mb-0">Bukuku.</span>
            </a>
            <a class="navbar-brand brand-logo-mini" href="{{ url('/') }}">
                <!-- <img src="../../images/logo-mini.svg" alt="logo"/> -->
                <span class="h4 font-weight-bold text-dark mb-0">Bukuku.</span>
            </a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center">
            <ul class="flex-grow-1 justify-content-center navbar-nav mr-lg-2">
                <li class="nav-item nav-search d-none d-lg-block">
                    <form action="{{ route('search') }}" method="post" class="search-form pt-1">
                        @csrf
                        <div class="input-group">
                            <input name="q" type="text" class="form-control search"
                                placeholder="Cari berdasarkan judul, penulis, atau pengarang"
                                aria-label="Recipient's username" required>
                            <div class="input-group-append">
                                <button class="btn btn-sm btn-search" type="submit">
                                    <i class="ti-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right">
                @if (Auth::user())
                <li class="nav-item">
                    <a class="nav-link text-dark font-weight-bold" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        Logout &nbsp;
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link text-dark font-weight-bold" href="{{route('login')}}">
                        Login &nbsp;
                    </a>
                </li>
                @endif
            </ul>
            <!-- <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item nav-profile dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
                        <img src="https://www.joispot.com/assets/img/user.jpg" alt="profile" />
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                        <a class="dropdown-item">
                            <i class="ti-settings text-primary"></i>
                            Settings
                        </a>
                        <a class="dropdown-item">
                            <i class="ti-power-off text-primary"></i>
                            Logout
                        </a>
                    </div>
                </li>
            </ul> -->
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                data-toggle="horizontal-menu-toggle">
                <span class="ti-menu"></span>
            </button>
        </div>
    </div>
</nav>