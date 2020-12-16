<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('public/assets/vendors/iconfonts/mdi/font/css/materialdesignicons.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('public/assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/vendors/css/vendor.bundle.addons.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/vertical-layout-light/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="../../images/favicon.png" />
    <script src="{{ asset('public/js/app.js') }}" defer></script>
    <livewire:styles/>
    @yield('css')
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo" href="index.html"><img src="{{ asset('public/assets/images/logo.png') }}" alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{ asset('public/assets/images/logo.png') }}" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end justify-content-lg-start">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-menu"></span>
                </button>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                            <span class="nav-profile-name mr-2">Hi, {{ Auth::user()->nama }}</span>
                            <img src="{{ asset('public/assets/images/user.jpg') }}" alt="profile" />
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                            <a class="dropdown-item" href="{{ url('/') }}">
                                <i class="mdi mdi-view-quilt text-primary"></i>
                                Halaman Utama
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('dashboard') }}">
                            <i class="mdi mdi-view-quilt menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/booking') }}">
                            <i class="mdi mdi-format-list-checks menu-icon"></i>
                            <span class="menu-title">Daftar Booking</span>
                        </a>
                    </li>
                    @if(Auth::user()->hak_akses == 1)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('user') }}">
                            <i class="mdi mdi-account menu-icon"></i>
                            <span class="menu-title">User</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('category') }}">
                            <i class="mdi mdi-shape-outline menu-icon"></i>
                            <span class="menu-title">Kategori</span>
                        </a>
                    </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#add-buku" aria-expanded="false" aria-controls="add-buku">
                            <i class="mdi mdi-book-plus menu-icon"></i>
                            <span class="menu-title">Tambah Buku</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="add-buku">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="{{ url('book-create') }}">Sewa / Pinjaman</a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{ url('book-barter-create') }}">Tukar Buku / Barter</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#list-buku" aria-expanded="false" aria-controls="list-buku">
                            <i class="mdi mdi-book-plus menu-icon"></i>
                            <span class="menu-title">Daftar Buku</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="list-buku">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="{{ url('book-index') }}">Sewa / Pinjam</a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{ url('book-barter-index') }}">Tukar Buku / Barter</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <i class="mdi mdi-logout menu-icon"></i>
                            <span class="menu-title">Logout</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021 <a href="adityasyah.com" target="_blank">AdityaSyah</a>. All rights reserved.</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="{{ asset('public/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('public/assets/vendors/js/vendor.bundle.addons.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="{{ asset('public/assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('public/assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('public/assets/js/template.js') }}"></script>
    <script src="{{ asset('public/assets/js/settings.js') }}"></script>
    <script src="{{ asset('public/assets/js/todolist.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ asset('public/assets/js/dashboard.js') }} "></script>
    <script src="{{ asset('public/assets/js/tooltips.js') }} "></script>
    <script src="{{ asset('public/assets/js/popover.js') }} "></script>
    <script src="{{ asset('public/assets/js/dropify.js') }} "></script>
    <script src="{{ asset('public/assets/js/editorDemo.js') }} "></script>
    <script src="{{ asset('public/assets/vendors/summernote/dist/summernote-bs4.min.js') }}"></script>
    <!-- End custom js for this page-->
    <livewire:scripts/>
    @yield('js')
<script>
    $('.dropdown-toggle').dropdown()
</script>
</body>

</html>