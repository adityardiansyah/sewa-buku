@section('css')
<link rel="stylesheet" href="{{ asset('public/assets/vendors/summernote/dist/summernote-bs4.css') }}">
    
@endsection
<div>
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-body">
                            <h4 class="card-title">Edit Buku</h4>
                            <form class="forms-sample" wire:submit.prevent="update" enctype="multipart/form-data">
                            <input type="hidden" wire:model="id_buku">
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
                                    <div class="form-group" wire:ignore>
                                    <label for="induk">Foto Buku</label>
                                    <input type="file" class="dropify" wire:model="imageUpdate" multiple/>
                                    </div>
                                    <div class="row">
                                        @foreach ($image as $item)
                                        <div class="col-6 p-1">
                                            <img src="{{ asset('storage/'.$item) }}" class="img-fluid" alt="">
                                            <button type="button" class="btn btn-inverse-danger btn-block" wire:click="delete({{$id_buku}}, '{{ $item }}')" data-toggle="tooltip" data-placement="top" title="Hapus">
                                                <i class="mdi mdi-trash-can-outline"></i>
                                            </button>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                            <label for="">Judul Buku</label>
                                            <input type="text" class="form-control" wire:model="judul" placeholder="Judul Buku" required>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                            <label for="">Author Buku</label>
                                            <input type="text" class="form-control" wire:model="author" placeholder="Author Buku" required>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                            <label for="">Penerbit Buku</label>
                                            <input type="text" class="form-control" wire:model="penerbit" placeholder="Penerbit Buku" required>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                            <label for="">Kategori Buku</label>
                                            <select class="form-control form-control-lg" id="" wire:model="kategori_id" required>
                                                <option value="0" {{ '0' == $kategori_id? 'selected': '' }}>Tidak Ada</option>
                                                @foreach ($kategori as $item)
                                                    <option value="{{ $item->id }}" {{ $item->id == $kategori_id? 'selected': '' }}>{{ $item->nama }}</option>
                                                @endforeach
                                            </select>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group"  wire:ignore>
                                            <label for="">Jenis Buku</label>
                                            <select class="form-control form-control-lg" id="" wire:model="jenis_id" required>
                                                <option value="0" {{ '0' == $jenis_id? 'selected': '' }}>Tidak Ada</option>
                                                @foreach ($jenis as $item)
                                                    <option value="{{ $item->id }}" {{ $item->id == $jenis_id? 'selected': '' }}>{{ $item->nama }}</option>
                                                @endforeach
                                            </select>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                            <label for="">Tahun Buku</label>
                                            <input type="text" class="form-control" wire:model="tahun" placeholder="Tahun Buku" required>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                            <label for="">Jumlah Halaman</label>
                                            <input type="text" class="form-control" wire:model="jml_halaman" placeholder="Jumlah Halaman" required>
                                            </div>
                                        </div>
                                        @if($jenis_id == 2)
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="">Harga Buku</label>
                                                <input type="text" class="form-control" wire:model="harga" placeholder="Harga Buku" required>
                                            </div>
                                        </div>
                                        @endif
                                        <div class="col-3">
                                            <div class="form-group">
                                            <label for="">Status Buku</label>
                                            <select class="form-control form-control-lg" id="" wire:model="status" required>
                                                <option value="0" {{ '0' == $status? 'selected': '' }}>Aktif</option>
                                                <option value="1" {{ '1' == $status? 'selected': '' }}>Tidak Aktif</option>
                                            </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group" wire:ignore>
                                            <label for="">Deskripsi Buku</label>
                                            <textarea id="summernote" name="deskripsi" id="deskripsi" required>
                                                {{ $deskripsi }}
                                            </textarea>
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
    $(document).ready(function(){

    $('#summernote').summernote({
        tabsize: 2,
        height: 250,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ],
        callbacks: {
            onChange: function(contents, $editable) {
            @this.set('deskripsi', contents);
        }
    }
        });    
});    
</script>
@endsection