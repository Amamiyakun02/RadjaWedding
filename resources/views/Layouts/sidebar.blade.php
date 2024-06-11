<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon rotate-n-15">
{{--            <i class="fas fa-laugh-wink"></i>--}}
        </div>
        <div class="sidebar-brand-text mx-3">Radja Wedding</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>DASHBOARD</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Riwayat</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Cek Riwayat:</h6>
                <a class="collapse-item" href="buttons.html">Pesanan</a>
                <a class="collapse-item" href="cards.html">Paket Pesanan</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Kelola</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Kelola :</h6>
                <a class="collapse-item" href="/barang">Barang</a>
                <a class="collapse-item" href="/layanan">Layanan</a>
                <a class="collapse-item" href="/pesanan">Pesanan</a>
                <a class="collapse-item" href="/paket">Paket Pemesanan</a>
                <a class="collapse-item" href="/pengguna">Pengguna</a>
            </div>
        </div>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
       Tambah
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Tambah</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Tambah:</h6>
                <a class="collapse-item" href="/barang/tambah">Barang</a>
                <a class="collapse-item" href="/layanan/tambah">Layanan
                <a class="collapse-item" href="/paket/tambah">Paket</a>
                <a class="collapse-item" href="/pemesanan/tambah">Pemesanan</a>
                <a class="collapse-item" href="/pengguna/tambah">Pengguna</a>
            </div>
        </div>

         <!-- Divider -->
    <hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
   Status
</div>

    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseStatus"
            aria-expanded="true" aria-controls="collapseStatus">
            <i class="fas fa-fw fa-folder"></i>
            <span>Status</span>
        </a>
        <div id="collapseStatus" class="collapse" aria-labelledby="headingStatus" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Status :</h6>
                <a class="collapse-item" href="{{ asset('Assets-Admin/') }}login.html">Barang</a>
                <a class="collapse-item" href="{{ asset('Assets-Admin/') }}register.html">Pemesanan</a>
                <a class="collapse-item" href="{{ asset('Assets-Admin/') }}forgot-password.html">Pengembalian</a>
            </div>
        </div>
    </li>
    <!-- Nav Item - Charts -->
    <!-- Sidebar Message -->

</ul>
