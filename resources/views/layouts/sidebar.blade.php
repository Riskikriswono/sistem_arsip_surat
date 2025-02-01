<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <img src="{{asset('/logo/logo.png')}}" alt="" width="40px">
            {{-- <i class="fas fa-laugh-wink"></i> --}}
        </div>
        <div class="sidebar-brand-text mx-3">Arsip <sup></sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    {{-- {{request()->is('/home') ? 'active' : ''}} --}}
    <li class="nav-item {{ (request()->is('home*')) ? 'active' : '' }}">
        <a class="nav-link" href="{{url('/home')}}">
            <i class="fa-solid fa-grid-horizontal"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu Kelola Data
    </div>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item -data pegawai -->
    <li class="nav-item {{ (request()->is('datapegawai*')) ? 'active' : '' }}">
        <a class="nav-link" href="{{url('/datapegawai')}}">
            <i class="fa-solid fa-users"></i>
            <span>Data Pegawai</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item {{ (request()->is('suratmasuk*')) ? 'active' : '' }}">
        <a class="nav-link" href="{{url('/suratmasuk')}}">
            <i class="fa-solid fa-books"></i>
            <span>Surat Masuk</span></a>
    </li>
    <li class="nav-item {{ (request()->is('suratkeluar*')) ? 'active' : '' }}">
        <a class="nav-link" href="{{url('/suratkeluar')}}">
            <i class="fa-thin fa-books"></i>
            <span>Surat Keluar</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <li class="nav-item">
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf

            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();"><i class="fa-solid fa-right-from-bracket"></i>
                logout
            </a>
        </form>
    </li>
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></i></button>
    </div>

</ul>
