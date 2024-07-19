<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{ route('admin.dashboard') }}"
                        aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span
                            class="hide-menu">Dashboard</span></a></li>
                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu">Quick Access</span></li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="ticket-list.html"
                        aria-expanded="false"><i data-feather="tag" class="feather-icon"></i>
                        <span class="hide-menu">Pesanan</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link" href="app-chat.html" aria-expanded="false">
                        <i data-feather="message-square" class="feather-icon"></i>
                        <span class="hide-menu">Laporan</span>
                    </a>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="app-calendar.html"
                        aria-expanded="false"><i data-feather="calendar" class="feather-icon"></i><span
                            class="hide-menu">Riwayat</span></a>
                </li>

                <li class="list-divider"></li>
{{--                Menu Kelola--}}
                <li class="nav-small-cap"><span class="hide-menu">Kelola Data</span></li>
{{--                Fitur Pengguna--}}
                <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <i data-feather="file-text" class="feather-icon"></i>
                        <span class="hide-menu">Pengguna </span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level base-level-line">
                        <li class="sidebar-item"><a href="{{ route('pengguna.create') }}" class="sidebar-link">
                                <span
                                    class="hide-menu"> Tambah Pengguna
                                </span>
                            </a>
                        </li>
                        <li class="sidebar-item"><a href="{{ route('pengguna') }}" class="sidebar-link"><span
                                    class="hide-menu"> Daftar Pengguna
                                </span></a>
                        </li>
                    </ul>
                </li>
{{--                End Fitur Pengguna--}}

{{--                Fitur Barang--}}
                <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <i data-feather="file-text" class="feather-icon"></i>
                        <span class="hide-menu">Barang </span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level base-level-line">
                        <li class="sidebar-item"><a href="{{ route('barang.create') }}" class="sidebar-link">
                                <span
                                    class="hide-menu"> Tambah Barang
                                </span>
                            </a>
                        </li>
                        <li class="sidebar-item"><a href="{{ route('barang') }}" class="sidebar-link"><span
                                    class="hide-menu"> Daftar Barang
                                </span></a>
                        </li>
                        <li class="sidebar-item"><a href="{{ route('barang.stock') }}" class="sidebar-link"><span
                                    class="hide-menu"> Stock Barang
                                </span></a>
                        </li>
                    </ul>
                </li>
{{--                End Fitur Barang--}}

{{--                Fitur Layanan--}}
                <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <i data-feather="file-text" class="feather-icon"></i>
                        <span class="hide-menu">Jasa & Layanan </span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level base-level-line">
                        <li class="sidebar-item"><a href="{{ route('layanan.create') }}" class="sidebar-link">
                                <span
                                    class="hide-menu"> Tambah Layanan
                                </span>
                            </a>
                        </li>
                        <li class="sidebar-item"><a href="{{ route('layanan') }}" class="sidebar-link"><span
                                    class="hide-menu"> Daftar Layanan
                                </span></a>
                        </li>
                    </ul>
                </li>
{{--                End Fitur Layanan--}}

{{--                Fitur Paket Bundle--}}
                <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <i data-feather="file-text" class="feather-icon"></i>
                        <span class="hide-menu">Bundle Penyewaan </span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level base-level-line">
                        <li class="sidebar-item"><a href="{{ route('paket.create') }}" class="sidebar-link">
                                <span
                                    class="hide-menu"> Tambah Bundle Penyewaan
                                </span>
                            </a>
                        </li>
                        <li class="sidebar-item"><a href="{{ route('paket') }}" class="sidebar-link"><span
                                    class="hide-menu"> Daftar Bundle Penyewaan
                                </span></a>
                        </li>
                    </ul>
                </li>
{{--                End Fitur Layanan--}}


{{--                Fitur Booking--}}
                <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <i data-feather="file-text" class="feather-icon"></i>
                        <span class="hide-menu">Booking </span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level base-level-line">
                        <li class="sidebar-item"><a href="{{ route('booking.create') }}" class="sidebar-link">
                                <span
                                    class="hide-menu"> Tambah Booking
                                </span>
                            </a>
                        </li>
                        <li class="sidebar-item"><a href="{{ route('booking') }}" class="sidebar-link"><span
                                    class="hide-menu"> Daftar Booking
                                </span></a>
                        </li>
                    </ul>
                </li>
{{--                End Fitur Booking--}}

{{--                Fitur Pembayaran--}}
                <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <i data-feather="file-text" class="feather-icon"></i>
                        <span class="hide-menu">Pembayaran </span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level base-level-line">
                        <li class="sidebar-item"><a href="{{ route('pembayaran.create') }}" class="sidebar-link">
                                <span
                                    class="hide-menu"> Tambah Pembayaran
                                </span>
                            </a>
                        </li>
                        <li class="sidebar-item"><a href="{{ route('pembayaran') }}" class="sidebar-link"><span
                                    class="hide-menu"> Daftar Pembayaran
                                </span></a>
                        </li>
                    </ul>
                </li>
{{--                End Fitur Pembayaran--}}

{{--                Fitur Pengembalian Barang--}}
                <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <i data-feather="file-text" class="feather-icon"></i>
                        <span class="hide-menu">Pengembalian Barang </span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level base-level-line">
                        <li class="sidebar-item"><a href="{{ route('pembayaran.create') }}" class="sidebar-link">
                                <span
                                    class="hide-menu"> Tambah Pengembalian Barang
                                </span>
                            </a>
                        </li>
                        <li class="sidebar-item"><a href="{{ route('pembayaran') }}" class="sidebar-link"><span
                                    class="hide-menu"> Daftar Pengembalian Barang
                                </span></a>
                        </li>
                    </ul>
                </li>
{{--                End Fitur Pengembalian Barang--}}

                <li class="list-divider"></li>
{{--                <li class="nav-small-cap"><span class="hide-menu">Extra</span></li>--}}
                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link" href="{{ route('logout') }}" aria-expanded="false"><i data-feather="log-out" class="feather-icon"></i><span class="hide-menu">Logout</span></a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
