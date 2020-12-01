<div>
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-body">
                            <h4 class="card-title">Tambah Buku</h4>
                            <form class="forms-sample" wire:submit.prevent="store">
                            <div class="row">
                                <div class="col-12">
                                    @if ($errors->any())
                                        <div class="alert alert-danger alert-bold" role="alert">
                                            <div class="alert-text">
                                                <ul class="mb-0">
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    @endif
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
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                    <label for="induk">Foto Buku</label>
                                    <input type="file" class="dropify" wire:model="image" multiple/>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                            <label for="exampleInputUsername1">Judul Buku</label>
                                            <input type="text" class="form-control" wire:model="judul" placeholder="Judul Buku" required>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                            <label for="exampleInputUsername1">Author Buku</label>
                                            <input type="text" class="form-control" wire:model="author" placeholder="Author Buku" required>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                            <label for="exampleInputUsername1">Penerbit Buku</label>
                                            <input type="text" class="form-control" wire:model="penerbit" placeholder="Penerbit Buku" required>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                            <label for="exampleInputUsername1">Kategori Buku</label>
                                            <select class="form-control form-control-lg" id="exampleFormControlSelect1" wire:model="kategori_id" required>
                                                <option value="0">Tidak Ada</option>
                                                @foreach ($kategori as $item)
                                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                @endforeach
                                            </select>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                            <label for="exampleInputUsername1">Jenis Buku</label>
                                            <select class="form-control form-control-lg" id="exampleFormControlSelect1" wire:model="jenis_id" required>
                                                <option value="0">Tidak Ada</option>
                                                @foreach ($jenis as $item)
                                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                @endforeach
                                            </select>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                            <label for="exampleInputUsername1">Tahun Buku</label>
                                            <input type="text" class="form-control" wire:model="tahun" placeholder="Tahun Buku" required>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                            <label for="exampleInputUsername1">Jumlah Halaman</label>
                                            <input type="text" class="form-control" wire:model="jml_halaman" placeholder="Jumlah Halaman" required>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                            <label for="exampleInputUsername1">Harga Buku</label>
                                            <input type="text" class="form-control" wire:model="harga" placeholder="Harga Buku" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 text-right">
                                    <button type="submit" class="btn btn-primary mr-2" >Submit</button>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@section('js')
<script>
    @if(session()->has('message'))
    console.log('okkk');
    showSwal('success-message');
    @php
        $message = Session::get('message');
    @endphp
        swal({
            title: 'Selamat!',
            text: "{{ $message['content'] }}",
            icon: "{{ $message['type'] }}",
            button: {
            text: "Oke",
            value: true,
            visible: true,
            className: "btn btn-primary"
            }
        })
    @endif
    (function($) {
    })(jQuery);
    </script>
@endsection