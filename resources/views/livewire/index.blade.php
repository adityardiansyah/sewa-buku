@section('title')
    Home
@endsection
<div>
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img class="d-block w-100" src="{{ asset('public/assets/images/slider/1.png') }}" alt="First slide">
            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset('public/assets/images/slider/2.png') }}" alt="Second slide">
            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset('public/assets/images/slider/3.png') }}" alt="Third slide">
            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset('public/assets/images/slider/4.png') }}" alt="Third slide">
            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset('public/assets/images/slider/5.png') }}" alt="Third slide">
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-12">
            <div class="section-title">
                <h4>Buku Terbaru</h4>
                <a href="{{ url('search') }}" class="float-right">Lihat Lainnya <i class="fa fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        @foreach ($news as $item)
        <div class="col-md-3 mt-2 mt-2">
            <div class="card">
                <img class="card-img-top img-item" src="{{ asset('storage/'.$item->image) }}" alt="Card image cap">
                <div class="card-body">
                    <a href="{{ url('detail/'.$item->id) }}" class="judul"><h5>{{ $item->judul }}</h5></a>
                    <span class="badge badge-sm badge-info rounded mb-2" style=" font-weight: lighter;">{{ $item->jenis }}</span>
                    @if($item->jenis_id != 1)
                    <h5 class="text-primary">Rp {{ number_format($item->harga, 0,'.','.') }}</h5>
                    @endif
                    <p class="card-text text-right" style="font-size: 10pt;"><i class="fa fa-map-marker"></i> {{ $item->kota }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="row mt-5">
        <div class="col-12">
            <div class="section-title">
                <h4>Buku Dipinjamkan</h4>
                <a href="{{ url('search') }}" class="float-right">Lihat Lainnya <i class="fa fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        @foreach ($pinjam as $item)
        <div class="col-md-3 mt-2">
            <div class="card">
                <img class="card-img-top img-item" src="{{ asset('storage/'.$item->image) }}" alt="Card image cap">
                <div class="card-body">
                    <a href="{{ url('detail/'.$item->id) }}" class="judul"><h5>{{ $item->judul }}</h5></a>
                    <span  class="badge badge-sm badge-info rounded mb-2" style=" font-weight: lighter;">{{ $item->jenis }}</span>
                    {{-- <h5 class="text-primary">Rp {{ number_format($item->harga, 0,'.','.') }}</h5> --}}
                    <p class="card-text text-right" style="font-size: 10pt;"><i class="fa fa-map-marker"></i> {{ $item->kota }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="row mt-5">
        <div class="col-12">
            <div class="section-title">
                <h4>Buku Disewakan</h4>
                <a href="{{ url('search') }}" class="float-right">Lihat Lainnya <i class="fa fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        @foreach ($sewa as $item)
        <div class="col-md-3 mt-2">
            <div class="card">
                <img class="card-img-top img-item" src="{{ asset('storage/'.$item->image) }}" alt="Card image cap">
                <div class="card-body">
                    <a href="{{ url('detail/'.$item->id) }}" class="judul"><h5>{{ $item->judul }}</h5></a>
                    <span  class="badge badge-sm badge-info rounded mb-2" style=" font-weight: lighter;">{{ $item->jenis }}</span>
                    <h5 class="text-primary">Rp {{ number_format($item->harga, 0,'.','.') }}</h5>
                    <p class="card-text text-right" style="font-size: 10pt;"><i class="fa fa-map-marker"></i> {{ $item->kota }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="row mt-5">
        <div class="col-12">
            <div class="section-title">
                <h4>Buku Dijual</h4>
                <a href="{{ url('search') }}" class="float-right">Lihat Lainnya <i class="fa fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        @foreach ($jual as $item)
        <div class="col-md-3 mt-2 mt-2">
            <div class="card">
                <img class="card-img-top img-item" src="{{ asset('storage/'.$item->image) }}" alt="Card image cap">
                <div class="card-body">
                    <a href="{{ url('detail/'.$item->id) }}" class="judul"><h5>{{ $item->judul }}</h5></a>
                    <span class="badge badge-sm badge-info rounded mb-2" style=" font-weight: lighter;">{{ $item->jenis }}</span>
                    @if($item->jenis_id != 1)
                    <h5 class="text-primary">Rp {{ number_format($item->harga, 0,'.','.') }}</h5>
                    @endif
                    <p class="card-text text-right" style="font-size: 10pt;"><i class="fa fa-map-marker"></i> {{ $item->kota }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="row mt-5">
        <div class="col-12">
            <div class="section-title">
                <h4>Barter Buku</h4>
                <a href="{{ url('search') }}" class="float-right">Lihat Lainnya <i class="fa fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        @foreach ($barter as $item)
        <div class="col-md-3 mt-2">
            <div class="card">
                <img class="card-img-top img-item" src="{{ asset('storage/'.$item->image) }}" alt="Card image cap">
                <div class="card-body">
                    <a href="{{ url('detail/'.$item->id) }}" class="judul"><h5>{{ $item->judul }}</h5></a>
                    <span  class="badge badge-sm badge-info rounded mb-2" style=" font-weight: lighter;">{{ $item->jenis }}</span>
                    <h5 class="text-primary">Rp {{ number_format($item->harga, 0,'.','.') }}</h5>
                    <p class="card-text text-right" style="font-size: 10pt;"><i class="fa fa-map-marker"></i> {{ $item->kota }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
