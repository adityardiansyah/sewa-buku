@section('title')
{{ $judul }}
@endsection
<div>
    <div class="row ">
        @if($jenis_id == 3)
            <div class="col-6">
                <h4 class="card-header">
                    Buku yang akan ditukar
                </h4>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="sub-main-img">
                                    <div class="row">
                                        @foreach ($image as $item)
                                        <div class="col-12">
                                            <img src="{{ asset('storage/'.$item) }}" class="img-fluid" alt="" onclick="imageMultiple(this);">
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="main-img">
                                    <img id="expandedImg" src="{{ asset('storage/'.$image[0]) }}" class="img-fluid" alt="">
                                </div>
                            </div>
                        </div>
                        <hr>
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
                        <button type="button" class="btn btn-outline-danger btn-rounded btn-icon float-right {{ $favoritStatus ? 'active' : ''}}" wire:click="favorit({{ $id_buku }})" data-toggle="tooltip" data-placement="top" title="Favorit">
                            <i class="mdi mdi-heart-outline"></i>
                        </button>
                        <h3>{{ $judul }}</h3>
                        <h5>{{ $jenis->nama }}</h5>
                        @if($jenis_id == 2)
                        <h2 class="harga">Rp {{ number_format($harga, 0,'.','.') }}</h2>
                        @endif
                        <p><b>Penerbit : </b> {{ $penerbit }}</p>
                        <p><b>Author : </b> {{ $author }}</p>
                        <hr>
                        <b>Deskripsi</b>
                        <p>
                            {!! $deskripsi !!}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <h4 class="card-header">
                    Buku yang diingikan
                </h4>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="sub-main-img">
                                    <div class="row">
                                        @foreach ($image1 as $item)
                                        <div class="col-12">
                                            <img src="{{ asset('storage/'.$item) }}" class="img-fluid" alt="" onclick="imageMultiple(this);">
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="main-img">
                                    <img id="expandedImg" src="{{ asset('storage/'.$image1[0]) }}" class="img-fluid" alt="">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h3>{{ $judul1 }}</h3>
                        <p><b>Penerbit : </b> {{ $penerbit1 }}</p>
                        <p><b>Author : </b> {{ $author1 }}</p>
                        <hr>
                        <b>Deskripsi</b>
                        <p>
                            {!! $deskripsi1 !!}
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card mt-4">
                    <div class="card-body">
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
                        <br>
                        <br>
                        @if($bookingStatus)
                        <form id="booking" @if(empty(Auth::user())) action="{{ url('login') }}" method="{{ !empty(Auth::user())? '' : 'GET'}}" @else wire:submit.prevent="booking" @endif >
                            @csrf
                            <input type="hidden" name="type" value="{{ $id_buku }}">
                            <button class="btn btn-primary btn-block" >BOOKING BUKU</button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        @else
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
                        <button type="button" class="btn btn-outline-danger btn-rounded btn-icon float-right {{ $favoritStatus ? 'active' : ''}}" wire:click="favorit({{ $id_buku }})" data-toggle="tooltip" data-placement="top" title="Favorit">
                            <i class="mdi mdi-heart-outline"></i>
                        </button>
                        @if(!$bookingStatus)
                        <span class="badge badge-warning float-right mr-4">
                            Sudah Booking
                        </span>
                        @endif
                        <h3>{{ $judul }}</h3>
                        <h5>{{ $jenis->nama }}</h5>
                        @if($jenis_id != 1)
                        <h2 class="harga">Rp {{ number_format($harga, 0,'.','.') }}</h2>
                        @endif
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
                        @forelse ($ulasan as $item)
                            <i class="float-right">
                                <small>{{ date('d-m-Y H:i:s', strtotime($item->created_at)) }}</small>
                            </i>
                            <b>{{ $item->nama }}</b>
                            <div class="dis-starrating ">
                                <input type="radio" id="star5" name="rating" value="5" {{ $item->rating == '5'? 'checked' : ''}}/><label for="star5" title="5 star"></label>
                                <input type="radio" id="star4" name="rating" value="4" {{ $item->rating == '4'? 'checked' : ''}}/><label for="star4" title="4 star"></label>
                                <input type="radio" id="star3" name="rating" value="3" {{ $item->rating == '3'? 'checked' : ''}}/><label for="star3" title="3 star"></label>
                                <input type="radio" id="star2" name="rating" value="2" {{ $item->rating == '2'? 'checked' : ''}}/><label for="star2" title="2 star"></label>
                                <input type="radio" id="star1" name="rating" value="1" {{ $item->rating == '1'? 'checked' : ''}}/><label for="star1" title="1 star"></label>
                            </div>
                            <p>
                                <i>
                                    "{{ $item->ulasan }}"
                                </i>
                            </p>
                            <hr>
                        @empty
                            <h5 class="text-center">Belum ada ulasan</h5>
                        @endforelse
                    </div>
                </div>
            </div>
        @endif
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