<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>latihan</title>

        <!-- Custom fonts for this template-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        <link href="{{ asset('assets/admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="{{ asset('assets/admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
    </head>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/{{ strtolower(Auth::user()->role) }}">
                    <div class="sidebar-brand-text mx-3">example</div>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Dashboard -->
                <li class="{{ request()->is('maker') ? 'active' : '' }} nav-item">
                    <a class="nav-link" href="/{{ strtolower(Auth::user()->role) }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard {{ Auth::user()->role }}</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Data
                </div>

                @if (auth()->user()->role == 'Admin')
                <li class="{{ request()->is('/admin/kelas') ? 'active' : '' }} nav-item">
                    <a class="nav-link collapsed" href="{{ route('kelas.index') }}">
                        <i class="fas fa-user"></i>
                        <span>Kelas</span>
                    </a>
                </li>
                <li class="{{ request()->is('/admin/spp') ? 'active' : '' }} nav-item">
                    <a class="nav-link collapsed" href="{{ route('spp.index') }}">
                        <i class="fas fa-user"></i>
                        <span>Spp</span>
                    </a>
                </li>
                <li class="{{ request()->is('/admin/petugass') ? 'active' : '' }} nav-item">
                    <a class="nav-link collapsed" href="{{ route('petugass.index') }}">
                        <i class="fas fa-user"></i>
                        <span>Petugas</span>
                    </a>
                </li>
                <li class="{{ request()->is('/admin/siswa') ? 'active' : '' }} nav-item">
                    <a class="nav-link collapsed" href="{{ route('siswa.index') }}">
                        <i class="fas fa-user"></i>
                        <span>Siswa</span>
                    </a>
                </li>
                 <li class="{{ request()->is('/admin/pembayaran') ? 'active' : '' }} nav-item">
                    <a class="nav-link collapsed" href="{{ route('pembayaran.index') }}">
                        <i class="fas fa-user"></i>
                        <span>Pembayaran</span>
                    </a>
                </li>
                @endif

                @if (auth()->user()->role == 'Petugas')
                    <li class="{{ request()->is('/petugas/transaksi') ? 'active' : '' }} nav-item">
                        <a class="nav-link collapsed" href="{{ route('transaksi.index') }}">
                            <i class="fa-solid fa-file-invoice"></i>
                            <span>petugas</span>
                        </a>
                    </li>

                @endif

                {{-- @if (auth()->user()->role == 'Siswa')
                    <li class="{{ request()->is('/siswas/histori') ? 'active' : '' }} nav-item">
                        <a class="nav-link collapsed" href="{{ route('histori.index') }}">
                            <i class="fa-solid fa-file-invoice"></i>
                            <span>Histori</span>
                        </a>
                    </li>
                @endif --}}

                <li class="nav-item">
                    <a class="nav-link" href="/logout">
                        <i class="fas fa-fw fa-chart-area"></i>
                    <span>Logout</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">

            </ul>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <br>
                <div class="container">
                    <section class="content">
                        @yield('content')
                    </section>
                </div>
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('assets/admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('assets/admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('assets/admin/js/sb-admin-2.min.js') }}"></script>

    @yield('cjs')

    </body>
</html>
