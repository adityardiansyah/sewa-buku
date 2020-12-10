@section('title')
{{ $judul }}
@endsection
<div>
    <div class="row ">
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <div class="main-img">
                        <img id="expandedImg" src="{{ asset('storage/'.$image[0]) }}" class="img-fluid" alt="">
                    </div>
                    <div class="sub-main-img mt-2">
                        <div class="row">
                            @foreach ($image as $item)
                            <div class="col-4 p-1">
                                <img src="{{ asset('storage/'.$item) }}" class="img-fluid" alt="" onclick="imageMultiple(this);">
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <hr>
                    @if($bookingStatus)
                    <form id="booking" @if(empty(Auth::user())) action="{{ url('login') }}" method="{{ !empty(Auth::user())? '' : 'GET'}}" @else wire:submit.prevent="booking" @endif >
                        @csrf
                        <input type="hidden" name="type" value="{{ $id_buku }}">
                        <button class="btn btn-primary btn-block" >BOOKING BUKU</button>
                    </form>
                    @endif
                        <br>
                        <b>Informasi Pemilik Buku</b>
                    <br>
                    @if(empty(Auth::user()))
                    <small>
                        Ingin menghubungi pemilik buku? 
                        <b><a href="{{ url('login') }}">Login</a></b> 
                    </small>
                    @else
                    <br>
                    <p>
                        <b>Nama : </b>{{ $pemilik->nama }} <br>
                        <b>Email : </b><a href="mail:{{ $pemilik->email }}">{{ $pemilik->email }}</a> <br>
                        <b>Nomor Telepon : </b><a href="tel:{{ $pemilik->no_telp }}">{{ $pemilik->no_telp }}</a>
                    </p>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    @if(session()->has('message'))
                    @php
                        $message = Session::get('message');
                    @endphp
                        @if ($message['type'] == 'success')
                            <div class="alert alert-success">
                            {{ $message['content'] }}
                            </div>
                        @else
                            <div class="alert alert-danger">
                            {{ $message['content'] }}
                            </div>
                        @endif
                        <br>
                    @endif
                        <button type="button" class="btn btn-outline-danger btn-rounded btn-icon float-right {{ $favoritStatus ? 'active' : ''}}" wire:click="favorit({{ $id_buku }})">
                        <i class="mdi mdi-heart-outline"></i>
                    </button>
                    @if(!$bookingStatus)
                    <span class="badge badge-warning float-right mr-4">
                        Sudah Booking
                    </span>
                    @endif
                    <h3>{{ $judul }}</h3>
                    <h5>{{ $jenis->nama }}</h5>
                    <h2 class="harga">Rp {{ number_format($harga, 0,'.','.') }}</h2>
                    <hr>
                    <b>Deskripsi</b>
                    <p>
                        {!! $deskripsi !!}
                    </p>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-body">
                    <h4>Review Buku</h4>
                    <hr>

                </div>
            </div>
        </div>
    </div>
</div>
@section('js')
<script>
function imageMultiple(imgs) {
    var expandImg = document.getElementById("expandedImg");
    expandImg.src = imgs.src;
    expandImg.parentElement.style.display = "block";
}
</script>
@endsection