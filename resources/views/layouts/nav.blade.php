@php
    $currentRouteName = Route::currentRouteName();
    // dd($currentRouteName);
@endphp
<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center">
        <a href="{{route('dashboard')}}" class="logo pe-0">
            <img src="{{ asset('img/logo_mec.png')}}" alt="">
        </a>
        <i class="bi bi-list toggle-sidebar-btn" id="burger-menu"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">


                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }}</span>
                </a><!-- End Profile Iamge Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6>{{ Auth::user()->name }}</h6>
                        <span>Administrator MEC</span>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{route('logout')}}">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Log Out</span>
                        </a>
                    </li>

                </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->

        </ul>
    </nav><!-- End Icons Navigation -->

</header><!-- End Header -->

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link @if($currentRouteName != "dashboard") collapsed @else '' @endif" href="{{ route('dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->


        <li class="nav-item">
            <a class="nav-link @if($currentRouteName != "siswa.index") collapsed @else '' @endif" href="{{ route('siswa.index') }}">
                <i class="bi bi-mortarboard"></i>
                <span>Siswa</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link @if($currentRouteName != "mentor.index") collapsed @else '' @endif" href="{{ route('mentor.index') }}">
                <i class="bi bi-card-list"></i>
                <span>Mentor</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link @if($currentRouteName != "paket_kelas.index") collapsed @else '' @endif" href="{{ route('paket_kelas.index') }}">
                <i class="bi bi-boxes"></i>
                <span>Paket Kelas</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link @if($currentRouteName != "jadwal.index") collapsed @else '' @endif" href="{{ route('jadwal.index') }}">
                <i class="bi bi-calendar-event"></i>
                <span>Jadwal</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('transaksi.index') }}">
                <i class="bi bi-credit-card"></i>
                <span>Transaksi</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('sarpra.index') }}">
                <i class="bi bi-display"></i>
                <span> Sarana Prasarana </span>
            </a>
        </li>


    </ul>

</aside><!-- End Sidebar-->
