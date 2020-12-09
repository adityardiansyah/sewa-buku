@section('title')
    Daftar Booking
@endsection
<div>
    <div class="row">
        <div class="col-12">
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
            <h3 class="card-header mb-4">
                Daftar Booking
            </h3>
            @forelse ($data as $item)
            <div class="card mt-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col-1">
                            <img src="{{ asset('storage/'.$item->gambar) }}" class="img-fluid" alt="">
                        </div>
                        <div class="col-11">
                            <span class="badge {{ $item->status }} float-right">
                                {{ $item->status_booking }}
                            </span>
                            <a href="{{ url('detail/'.$item->id) }}" class="text-black">
                                <b>{{ $item->judul }}</b>
                            </a>
                            <p>
                                Kode Booking : <b>{{ $item->kode }}</b> <br>
                            </p>
                            <span class="badge badge-secondary float-right">
                                <b>Tanggal Booking : </b><i>{{ date('d-m-Y H:i:s', strtotime($item->waktu_booking)) }}</i>
                            </span>
                            <p class="m-0">
                                Nama Pemilik : {{ $item->nama }} (<a href="tel:{{ $item->no_telp }}">{{ $item->no_telp }}</a>)
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <h2 class="text-center">
                Tidak ada booking
            </h2>
            @endforelse
        </div>
    </div>
</div>
