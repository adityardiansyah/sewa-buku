<div>
    <div class="row mt-5">
        <div class="col-10">
            <div class="section-title">
                <h4>Daftar Buku Favorit</h4>
            </div>
        </div>
        {{-- <div class="col-2">
            <button class="btn btn-primary float-right" data-toggle="modal" data-target="#modalFilter"><i class="fa fa-filter"></i> FILTER</button>
        </div> --}}
    </div>
    <div class="row mt-4">
        @forelse($data as $item)
        <div class="col-md-3">
            <div class="card">
                <img class="card-img-top img-item" src="{{ asset('storage/'.$item->image) }}" alt="Card image cap">
                <div class="card-body">
                    <a href="{{ url('detail/'.$item->id) }}" class="judul"><h5>{{ $item->judul }}</h5></a>
                    <span style="font-size: 11pt; font-weight: lighter;">{{ $item->jenis }}</span>
                    <h5 class="text-primary">Rp {{ number_format($item->harga, 0,'.','.') }}</h5>
                    <p class="card-text text-right" style="font-size: 10pt;"><i class="fa fa-map-marker"></i> {{ $item->kota }}</p>
                </div>
            </div>
        </div>
        @empty
            <h2 class="text-center m-auto">
                Buku tidak ada
            </h2>
        @endforelse
    </div>
    <div class="row">
        <div class="m-auto">
            {{ $data->links() }}
        </div>
    </div>
</div>
