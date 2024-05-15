<!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="{{ url('/') }}" class="navbar-brand mx-4 mb-3">

            {{--  Nama Dan Logo  --}}
            <h3 class="text-primary"><img class="rounded-circle" src="{{ asset('dashmin/img/Logo.png') }}" alt="SireGas"
                    style="width: 30px; height: 30px;margin-right: 10px;margin-top:-5px;">SireGas</h3>
            {{--  End Nama dan Logo  --}}

        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            @if (@Auth::user()->username)
                <div class="position-relative">
                    <img class="rounded-circle"
                        src="https://ui-avatars.com/api/?name={{ @Auth::user()->username }}&background=007BFF&color=FFF"
                        alt="{{ @Auth::user()->username }}" style="width: 40px; height: 40px;">
                    <div
                        class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                    </div>
                </div>
                <div class="ms-3">
                    <h6 class="mb-0" style="text-transform: uppercase;
                    ">
                        {{ @Auth::user()->username }}</h6>
                    <span>Admin</span>
                </div>
            @else
                <div class="position-relative">
                    <img class="rounded-circle" src="https://ui-avatars.com/api/?name=Admin&background=007BFF&color=FFF"
                        alt="Admin" style="width: 40px; height: 40px;">
                    <div
                        class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                    </div>
                </div>
                <div class="ms-3">
                    <h6 class="mb-0">Administrator</h6>
                    <span>Admin</span>
                </div>
            @endif
        </div>

        <div class="navbar-nav w-100">
            <a href="{{ url('/') }}" class="nav-item nav-link {{ $title == 'Dashboard' ? 'active' : '' }}"><i
                    class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle {{ $title == 'Transaksi' ? 'active' : '' }}"
                    data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Transaksi</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{ url('transaksi') }}" class="dropdown-item">Data</a>
                    <a href="{{ url('transaksi/create') }}" class="dropdown-item">Tambah Data</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle {{ $title == 'Detail Transaksi' ? 'active' : '' }}"
                    data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Laporan</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{ url('detailtransaksi') }}" class="dropdown-item" target="blank_">Detail Transaksi</a>
                    <a href="{{ url('detailhutang') }}" class="dropdown-item">Detail Hutang</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle {{ $title == 'Pelanggan' ? 'active' : '' }}"
                    data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Pelanggan</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{ url('pelanggan') }}" class="dropdown-item">Data</a>
                    <a href="{{ url('pelanggan/create') }}" class="dropdown-item">Tambah Data</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle {{ $title == 'Pembayaran' ? 'active' : '' }}"
                    data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Pembayaran</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{ url('pembayaran') }}" class="dropdown-item">Data</a>
                    <a href="{{ url('pembayaran/create') }}" class="dropdown-item">Tambah Data</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle {{ $title == 'Pengadaan' ? 'active' : '' }}"
                    data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Pengadaan</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{ url('pengadaan') }}" class="dropdown-item">Data</a>
                    <a href="{{ url('pengadaan/create') }}" class="dropdown-item">Tambah Data</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle {{ $title == 'Produk' ? 'active' : '' }}"
                    data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Produk</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{ url('produk') }}" class="dropdown-item">Data</a>
                    <a href="{{ url('produk/create') }}" class="dropdown-item">Tambah Data</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle {{ $title == 'Akun' ? 'active' : '' }}"
                    data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Akun</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{ url('akun') }}" class="dropdown-item">Data</a>
                    <a href="{{ url('akun/create') }}" class="dropdown-item">Tambah Data</a>
                </div>
            </div>
        </div>
    </nav>
</div>
<!-- Sidebar End -->
