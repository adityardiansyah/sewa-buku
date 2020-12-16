<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - Platform Sewa Menyewakan Buku</title>
    {{-- <link rel="stylesheet" href="{{ asset('public/assets/dist/css/bootstrap.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('public/assets/vendors/iconfonts/mdi/font/css/materialdesignicons.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('public/assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/vendors/css/vendor.bundle.addons.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/vertical-layout-light/style.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/vendors/iconfonts/font-awesome/css/font-awesome.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('public/assets/css/fontawesome-all.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('public/assets/css/style.css') }}">
    <script src="{{ asset('public/js/app.js') }}" defer></script>
    @yield('css')
    @livewireStyles
</head>
<body>
    @livewire('header')
    <div class="container mt-4 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <!-- component -->
                @yield('content')
                <!-- end component -->
            </div>
        </div>
    </div>
    @livewire('footer')
    <script src="{{ asset('public/assets/js/jquery.js') }}"></script>
    <script src="{{ asset('public/assets/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('public/assets/vendors/js/vendor.bundle.addons.js') }}"></script>
    <script src="{{ asset('public/assets/js/tooltips.js') }} "></script>
    <script src="{{ asset('public/assets/js/popover.js') }} "></script>
    @livewireScripts
    @yield('js')
    <script>
        $('.dropdown-toggle').dropdown()
    </script>
</body>
</html>