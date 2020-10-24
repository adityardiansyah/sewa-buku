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
        <div class="col-md-3">
            <div class="card">
                <img class="card-img-top" src="{{ asset('public/assets/images/buku/123.jpg') }}" alt="Card image cap">
                <div class="card-body">
                    <h5>Remember Us</h5>
                    <span style="font-size: 11pt; font-weight: lighter;">Disewakan</span>
                    <h5>Rp30.000</h5>
                    <p class="card-text text-right" style="font-size: 10pt;"><i class="fa fa-map-marker-alt"></i> Kab. Sidoarjo</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <img class="card-img-top" src="{{ asset('public/assets/images/buku/123.jpg') }}" alt="Card image cap">
                <div class="card-body">
                    <h5>Remember Us</h5>
                    <span style="font-size: 11pt; font-weight: lighter;">Disewakan</span>
                    <h5>Rp30.000</h5>
                    <p class="card-text text-right" style="font-size: 10pt;"><i class="fa fa-map-marker-alt"></i> Kab. Sidoarjo</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <img class="card-img-top" src="{{ asset('public/assets/images/buku/123.jpg') }}" alt="Card image cap">
                <div class="card-body">
                    <h5>Remember Us</h5>
                    <span style="font-size: 11pt; font-weight: lighter;">Disewakan</span>
                    <h5>Rp30.000</h5>
                    <p class="card-text text-right" style="font-size: 10pt;"><i class="fa fa-map-marker-alt"></i> Kab. Sidoarjo</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <img class="card-img-top" src="{{ asset('public/assets/images/buku/123.jpg') }}" alt="Card image cap">
                <div class="card-body">
                    <h5>Remember Us</h5>
                    <span style="font-size: 11pt; font-weight: lighter;">Disewakan</span>
                    <h5>Rp30.000</h5>
                    <p class="card-text text-right" style="font-size: 10pt;"><i class="fa fa-map-marker-alt"></i> Kab. Sidoarjo</p>
                </div>
            </div>
        </div>
    </div>
</div>
