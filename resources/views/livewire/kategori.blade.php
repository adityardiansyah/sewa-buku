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
                <h4>Kategori {{ $keyword->nama }}</h4>
            </div>
        </div>
        {{-- <div class="col-2">
            <button class="btn btn-primary float-right" data-toggle="modal" data-target="#modalFilter"><i class="fa fa-filter"></i> FILTER</button>
        </div> --}}
    </div>
    <div class="row mt-4">
        <div class="col-9">
            <div class="row">
                @forelse($data as $item)
                <div class="col-md-4">
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
            <br>
            <div class="row">
                <div class="m-auto">
                    {{ $data->links() }}
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card">
                <h4 class="card-header">Kategori</h4>
                <div class="card-body p-2 list">
                    <ul>
                        @foreach ($kategori as $item)
                        <a href="{{ url('kategori/'.$item->slug) }}">    
                            <li>
                                {{ $item->nama }}
                            </li>
                        </a>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="modal right fade" id="modalFilter" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
		<div class="modal-dialog" role="document">
			<div class="modal-content">

				<div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel2">Filter</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>

				<div class="modal-body">
                <form action="{{ url('kategori/') }}" method="GET">
                        <div class="form-group">
                            <label for="">Kategori Buku</label>
                            <select class="form-control form-control-sm" name="cari_kategori" id="">
                                <option value="">Tidak Ada</option>
                                @foreach ($kategori as $item)
                                    <option value="{{ $item->id }}" {{ $item->id == $cari_kategori? 'selected' : ''}}>{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Cari</button>
                    </form>
				</div>

			</div><!-- modal-content -->
		</div><!-- modal-dialog -->
	</div><!-- modal -->
</div>
@endsection