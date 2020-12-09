@section('title')
    Pencarian
@endsection
@extends('layouts.master')
@section('css')
    <style>
        .modal.left .modal-dialog,
        .modal.right .modal-dialog {
            position: fixed;
            margin: auto;
            width: 320px;
            height: 100%;
            -webkit-transform: translate3d(0%, 0, 0);
                -ms-transform: translate3d(0%, 0, 0);
                -o-transform: translate3d(0%, 0, 0);
                    transform: translate3d(0%, 0, 0);
        }

        .modal.left .modal-content,
        .modal.right .modal-content {
            height: 100%;
            overflow-y: auto;
        }
        
        .modal.left .modal-body,
        .modal.right .modal-body {
            padding: 15px 15px 80px;
        }
        .modal.right.fade .modal-dialog {
            right: 0;
            -webkit-transition: opacity 0.3s linear, right 0.3s ease-out;
            -moz-transition: opacity 0.3s linear, right 0.3s ease-out;
                -o-transition: opacity 0.3s linear, right 0.3s ease-out;
                    transition: opacity 0.3s linear, right 0.3s ease-out;
        }
        
        .modal.right.fade.in .modal-dialog {
            right: 0;
        }

    /* ----- MODAL STYLE ----- */
        .modal-content {
            border-radius: 0;
            border: none;
        }

        .modal-header {
            border-bottom-color: #EEEEEE;
            background-color: #FAFAFA;
        }
    </style>
@endsection
@section('content')
    <div>
    <div class="row mt-5">
        <div class="col-10">
            <div class="section-title">
                <h4>Cari "{{ $search }}"</h4>
            </div>
        </div>
        <div class="col-2">
            <button class="btn btn-primary float-right" data-toggle="modal" data-target="#modalFilter"><i class="fa fa-filter"></i> FILTER</button>
        </div>
    </div>
    <div class="row mt-4">
        @forelse($data as $item)
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
        @empty
            <h2 class="text-center m-auto">
                Buku tidak ada
            </h2>
        @endforelse
    </div>

    <div class="modal right fade" id="modalFilter" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
		<div class="modal-dialog" role="document">
			<div class="modal-content">

				<div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel2">Filter</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>

				<div class="modal-body">
					<form action="" method="GET">
                        <div class="form-group">
                            <label for="">Kategori Buku</label>
                            <select class="form-control form-control-sm" name="cari_kategori" id="">
                                <option value="">Tidak Ada</option>
                                @foreach ($kategori as $item)
                                    <option value="{{ $item->id }}" {{ $item->id == $cari_kategori? 'selected' : ''}}>{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Lainnya</label>
                            <select class="form-control form-control-sm" id="" name="type">
                                <option value="">Tidak Ada</option>
                                <option value="judul" {{ $type == 'judul'? 'selected' : ''}}>Judul</option>
                                <option value="penerbit" {{ $type == 'penerbit'? 'selected' : ''}}>Penerbit</option>
                                <option value="author" {{ $type == 'author'? 'selected' : ''}}>Author</option>
                            </select>
                            <input type="text" name="value" class="form-control form-control-sm" placeholder="cari disini ..." value="{{ $value }}">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Cari</button>
                    </form>
				</div>

			</div><!-- modal-content -->
		</div><!-- modal-dialog -->
	</div><!-- modal -->
</div>
@endsection