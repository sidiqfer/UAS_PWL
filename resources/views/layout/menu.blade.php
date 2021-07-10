<nav class="bottom-navbar">
    <div class="container">
        <ul class="nav page-navigation">
            @if (Auth::user())
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/') }}">
                    <span class="menu-title">Beranda</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('koleksi') }}">
                    <span class="menu-title">Koleksi Buku</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('informasi') }}">
                    <span class="menu-title">Informasi</span>
                </a>
            </li>

            <!-- Menu untuk admin -->
            <li class="nav-item">
                <a class="nav-link" href="">
                    <span class="menu-title">|</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/index') }}">
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <span class="menu-title">Data Master</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="submenu">
                    <ul class="submenu-item">
                        <li class="nav-item"><a class="nav-link" href="{{ url('admin/anggota') }}">Anggota</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('admin/buku') }}">Buku</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('admin/kategori') }}">Kategori</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('admin/pengarang') }}">Pengarang</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('admin/penerbit') }}">Penerbit</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/transaksi') }}">
                    <span class="menu-title">Transaksi</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('admin') }}">
                    <span class="menu-title">Manajemen User</span>
                </a>
            </li>
            @else
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/') }}">
                    <span class="menu-title">Beranda</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('koleksi') }}">
                    <span class="menu-title">Koleksi Buku</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('informasi') }}">
                    <span class="menu-title">Informasi</span>
                </a>
            </li>
            @endif
        </ul>
    </div>
</nav>