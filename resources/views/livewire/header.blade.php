
<div>
    <nav class="navbar navbar-expand-lg navbar-light bg-white nav-custom">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03"
            aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">BOOKO</a>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav ml-4 mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Kategori <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <form class="form-inline ml-4 my-2 my-lg-0 cari mr-auto" method="GET" action="{{ route('search') }}">
                <input class="mr-sm-2 input-cari" type="search" placeholder="Search" aria-label="Search">
                <button class="my-2 my-sm-0 btn-cari" type="submit"><i class="fa fa-search"></i></button>
            </form>
            <ul class="navbar-nav ml-4 mt-2 mt-lg-0">
                @if (empty(Auth::user()->id))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('daftar')}}">Daftar </a>
                    </li>
                @else
                <li class="nav-item dropdown mr-2">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" data-display="static" aria-haspopup="true" aria-expanded="false">
                    Hi, {{ Auth::user()->nama }}
                    <img src="{{ asset('public/assets/images/user.jpg') }}" class="img-fluid nav-photo" alt="">
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#"><i class="fa fa-user-secret mr-3"></i> Dashboard</a>
                        <a class="dropdown-item" href="#"><i class="fa fa-book mr-3"></i> Buku Favorit</a>
                        <a class="dropdown-item" href="#"><i class="fa fa-user-edit mr-3"></i> Edit Profil</a>
                        <a class="dropdown-item" href="#"><i class="fa fa-sign-out-alt mr-3"></i> Logout</a>
                    </div>
                </li>
                @endif
            </ul>
        </div>
    </nav>
</div>
