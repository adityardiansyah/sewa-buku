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
                            <form class="forms-sample" wire:submit.prevent="store" enctype="multipart/form-data">
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
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="card-title"><b>Buku yang akan ditukarkan</b></h4>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group" wire:ignore>
                                            <label for="induk">Foto Buku</label>
                                            <input type="file" class="dropify" wire:model="image" multiple required/>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                            <label for="">Judul Buku</label>
                                            <input type="text" class="form-control form-control-sm" wire:model="judul" placeholder="Judul Buku" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                            <label for="">Author Buku</label>
                                            <input type="text" class="form-control form-control-sm" wire:model="author" placeholder="Author Buku" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                            <label for="">Penerbit Buku</label>
                                            <input type="text" class="form-control form-control-sm" wire:model="penerbit" placeholder="Penerbit Buku" required>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                            <label for="">Kategori Buku</label>
                                            <select class="form-control form-control-sm" id="" wire:model="kategori_id" required>
                                                <option value="0">Tidak Ada</option>
                                                @foreach ($kategori as $item)
                                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                @endforeach
                                            </select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                            <label for="">Tahun Buku</label>
                                            <input type="text" class="form-control form-control-sm" wire:model="tahun" placeholder="Tahun Buku" required>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                            <label for="">Jumlah Halaman</label>
                                            <input type="text" class="form-control form-control-sm" wire:model="jml_halaman" placeholder="Jumlah Halaman" required>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                            <label for="">Harga Buku</label>
                                            <input type="text" class="form-control form-control-sm" wire:model="harga" placeholder="Harga Buku" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group" wire:ignore>
                                            <label for="">Deskripsi Buku</label>
                                            <textarea id="summernote" name="deskripsi" id="deskripsi" required>
                                            </textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h4 class="card-title"><b>Buku yang di inginkan</b></h4>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group" wire:ignore>
                                            <label for="induk">Foto Buku</label>
                                            <input type="file" class="dropify" wire:model="image1" multiple required/>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                            <label for="">Judul Buku</label>
                                            <input type="text" class="form-control form-control-sm" wire:model="judul1" placeholder="Judul Buku" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                            <label for="">Author Buku</label>
                                            <input type="text" class="form-control form-control-sm" wire:model="author1" placeholder="Author Buku" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                            <label for="">Penerbit Buku</label>
                                            <input type="text" class="form-control form-control-sm" wire:model="penerbit1" placeholder="Penerbit Buku" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                            <label for="">Tahun Buku</label>
                                            <input type="text" class="form-control form-control-sm" wire:model="tahun1" placeholder="Tahun Buku" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group" wire:ignore>
                                            <label for="">Deskripsi Buku</label>
                                            <textarea id="summernote2" name="deskripsi" id="deskripsi" required>
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
    $('#summernote2').summernote({
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
            @this.set('deskripsi1', contents);
        }
        }
    });    
</script>
@endsection