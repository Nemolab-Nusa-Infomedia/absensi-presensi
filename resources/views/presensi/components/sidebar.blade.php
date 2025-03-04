<div class="main-nav">
    <!-- Sidebar Logo -->
    <div class="logo-box">
        <a href="index.php" class="logo-dark">
            <img src="{{ asset('assets/images/logo/logo-hs.png') }}" class="logo-sm" alt="logo sm"/>
            <span class="logo-lg fw-bold align-middle" style="color: #0d47a1;">Hugo Studio</span>
        </a>

        <a href="index.php" class="logo-light">
            <img src="{{ asset('assets/images/logo/logo-hs.png') }}" class="logo-sm" alt="logo sm"/>
            <span class="logo-lg fw-bold align-middle" style="color: #0d47a1;">Hugo Studio</span>
        </a>
    </div>

    <!-- Menu Toggle Button (sm-hover) -->
    <button type="button" class="button-sm-hover"  aria-label="Show Full Sidebar">
        <iconify-icon icon="iconamoon:arrow-left-4-square-duotone" class="button-sm-hover-icon"></iconify-icon>
    </button>

    <div class="scrollbar" data-simplebar>
        <ul class="navbar-nav" id="navbar-nav">
            <li class="menu-title">General</li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('presensi-home') }}">
                    <span class="nav-icon">
                        <iconify-icon
                            icon="iconamoon:home-duotone"
                        ></iconify-icon>
                    </span>
                    <span class="nav-text"> Beranda </span>
                </a>
            </li>

            <li class="menu-title">Menu</li>


            <li class="nav-item">
                <a class="nav-link" href="{{ route('izin-cuti') }}">
                    <span class="nav-icon">
                        <i class='bx bx-food-menu'></i>
                    </span>
                    <span class="nav-text"> Izin/Cuti </span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('laporan-presensi') }}">
                    <span class="nav-icon">
                        <i class='bx bx-history'></i>
                    </span>
                    <span class="nav-text"> Laporan Presensi </span>
                </a>
            </li>

            <li class="menu-title">Akun</li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('akun') }}">
                    <span class="nav-icon">
                        <i class='bx bx-user fs-19 align-middle'></i>
                    </span>
                    <span class="nav-text"> Akun </span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-danger" href="{{ route('logout') }}">
                    <span class="nav-icon">
                        <i class="bx bx-log-out fs-19 align-middle"></i>
                    </span>
                    <span class="nav-text"> Logout </span>
                </a>
            </li>
        </ul>
    </div>
</div>
