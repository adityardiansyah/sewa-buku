@section('title')
    Daftar Booking
@endsection
@section('css')
    <style>
        
    </style>
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
            @forelse ($data as $key => $item)
            <div class="card mt-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col-1">
                            <img src="{{ asset('storage/'.$item->gambar) }}" class="img-fluid" alt="">
                        </div>
                        <div class="col-11">
                            <span class="badge {{ $item->badge_booking }} float-right">
                                {{ $item->status_bookings }}
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
                    @if(!empty($item->ulasan))
                        <b class="float-left">Rating : </b>
                        <div class="dis-starrating float-left d-flex flex-row-reverse ml-2">
                            <input type="radio" id="star5" name="rating" value="5" {{ $item->ulasan->rating == '5'? 'checked' : ''}}/><label for="star5" title="5 star"></label>
                            <input type="radio" id="star4" name="rating" value="4" {{ $item->ulasan->rating == '4'? 'checked' : ''}}/><label for="star4" title="4 star"></label>
                            <input type="radio" id="star3" name="rating" value="3" {{ $item->ulasan->rating == '3'? 'checked' : ''}}/><label for="star3" title="3 star"></label>
                            <input type="radio" id="star2" name="rating" value="2" {{ $item->ulasan->rating == '2'? 'checked' : ''}}/><label for="star2" title="2 star"></label>
                            <input type="radio" id="star1" name="rating" value="1" {{ $item->ulasan->rating == '1'? 'checked' : ''}}/><label for="star1" title="1 star"></label>
                        </div>
                        <br>
                        <br>
                        <b>Ulasan :</b>
                        <br>
                        <p>
                            {{ $item->ulasan->ulasan }}
                        </p>
                    @else
                    @if($item->status_booking == 1 || $item->status_booking == 2)
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header" role="tab" id="heading-4">
                                <h6 class="mb-0">
                                    Berikan Ulasan pada buku ini!
                                </h6>
                                </div>
                                <form wire:submit.prevent="ulasan({{ $item->id }})">
                                    <div class="card-body">
                                        <div wire:ignore>
                                            <label for="" class="float-left"> Rating : </label>
                                            <div class="starrating risingstar float-left d-flex flex-row-reverse ml-2">
                                                <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="5 star"></label>
                                                <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="4 star"></label>
                                                <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="3 star"></label>
                                                <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="2 star"></label>
                                                <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="1 star"></label>
                                            </div>
                                        </div>
                                        <textarea wire:model="ulasan" class="form-control" id="" cols="20" rows="10" placeholder="Masukkan Ulasan disini..."></textarea>
                                        <button type="submit" class="btn btn-primary mt-2 float-right  mb-4">Kirim</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endif
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
@section('js')
    <script src="{{ asset('public/assets/js/form-addons.js') }} "></script>
<script>
    $(':radio').change(function() {
        @this.set('rating', this.value);
    });
</script>
@endsection