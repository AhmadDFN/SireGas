<!-- Navbar Start -->
<nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
    @if (Session::has('success'))
        <div id="toast-container"></div>
    @endif
    <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
        <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
    </a>
    <a href="#" class="sidebar-toggler flex-shrink-0">
        <i class="fa fa-bars"></i>
    </a>
    <div class="navbar-nav align-items-center ms-auto">
        <a class="sidebar-control sidebar-main-toggle hidden-xs" style="margin-left: 15px;">
            <marquee style="margin-top: 10px">SireGas - Sistem Rekap Gas</marquee>
        </a>
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                @if (@Auth::user()->username)
                    <img class="rounded-circle me-lg-2"
                        src="https://ui-avatars.com/api/?name={{ @Auth::user()->username }}&background=007BFF&color=FFF"
                        alt="{{ @Auth::user()->username }}" style="width: 40px; height: 40px;">
                    <span class="d-none d-lg-inline-flex"
                        style="text-transform: uppercase;
                    ">{{ @Auth::user()->username }}</span>
                @else
                    <img class="rounded-circle me-lg-2"
                        src="https://ui-avatars.com/api/?name=Admin&background=007BFF&color=FFF" alt="Jhon Doe"
                        style="width: 40px; height: 40px;">
                    <span class="d-none d-lg-inline-flex">Administrator</span>
                @endif
            </a>
            <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                <a href="{{ route('signout') }}" class="dropdown-item">Log Out</a>
            </div>
        </div>
    </div>
</nav>
<!-- Navbar End -->
