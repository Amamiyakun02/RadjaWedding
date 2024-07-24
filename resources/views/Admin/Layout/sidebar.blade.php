<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{ route('admin.dashboard') }}"
                        aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span
                            class="hide-menu">Dashboard</span></a></li>
                {{--Menu Kelola--}}
                {{--Fitur Pengguna--}}
                <li class="sidebar-item"> <a class="sidebar-link" href="{{ route('pengguna') }}" aria-expanded="false">
                        <i class="icon-user"></i>
                        <span class="hide-menu">Pengguna </span>
                    </a>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link" href="{{ route('barang') }}" aria-expanded="false">
                        <i class="fas fa-archive"></i>
                        <span class="hide-menu">Barang</span>
                    </a>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link" href="{{ route('layanan') }}" aria-expanded="false">
                        <i class="fas fa-diagnoses"></i>
                        <span class="hide-menu">Jasa & Layanan</span>
                    </a>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link" href="{{ route('paket') }}" aria-expanded="false">
                        <i class="fas fa-box-open"></i>
                        <span class="hide-menu">Bundle Penyewaan</span>
                    </a>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link" href="{{ route('booking') }}" aria-expanded="false">
                        <i data-feather="file-text" class="feather-icon"></i>
                        <span class="hide-menu">Booking</span>
                    </a>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link" href="{{ route('riwayat') }}" aria-expanded="false">
                        <i class="fas fa-list-alt"></i>
                        <span class="hide-menu">Riwayat</span>
                    </a>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link" href="{{ route('pengembalian') }}"
                        aria-expanded="false">
                        <i class="fas fa-clipboard-list"></i>
                        <span class="hide-menu">Pengembalian Barang</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
