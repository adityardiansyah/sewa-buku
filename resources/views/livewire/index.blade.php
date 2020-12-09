@section('title')
    Home
@endsection
<div>
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img class="d-block w-100" src="{{ asset('public/assets/images/main-slider/1.jpg') }}" alt="First slide">
            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset('public/assets/images/main-slider/2.jpg') }}" alt="Second slide">
            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset('public/assets/images/main-slider/3.jpg') }}" alt="Third slide">
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-12">
            <div class="section-title">
                <h4>Buku Terbaru</h4>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        @foreach ($news as $item)
        <div class="col-md-3">
            <div class="card">
                <img class="card-img-top img-item" src="{{ asset('storage/'.$item->image) }}" alt="Card image cap">
                <div class="card-body">
                    <a href="{{ url('detail/'.$item->id) }}" class="judul"><h5>{{ $item->judul }}</h5></a>
                    <span style="font-size: 11pt; font-weight: lighter;">Disewakan</span>
                    <h5 class="text-primary">Rp {{ number_format($item->harga, 0,'.','.') }}</h5>
                    <p class="card-text text-right" style="font-size: 10pt;"><i class="fa fa-map-marker-alt"></i> Kab. Sidoarjo</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
