<div>
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="row">
                <div class="col-md-8">
                    <h3><i class="mdi mdi-book-multiple menu-icon"></i> Daftar Barter Buku</h3>
                </div>
                <div class="col-md-4 text-right">
                    <div class="form-group">
                        <div class="input-group">
                        <input type="text" class="form-control" placeholder="Cari disini ..." aria-label="Cari disini ..." wire:model="search">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card ">
                <div class="row">
                    <div class="col-md-12">
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
                            <div class="table-responsive">
                                <table class="table table-hover">
                                <thead>
                                    <tr>
                                    <th>Judul Buku</th>
                                    <th>Kategori</th>
                                    <th>Author</th>
                                    <th>Penerbit</th>
                                    <th>Tahun</th>
                                    <th>Jumlah Halaman</th>
                                    <th>Harga</th>
                                    <th>Status</th>
                                    <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($data as $item)
                                    <tr>
                                        <td>{{ $item->judul }}</td>
                                        <td>{{ $item->kategori->nama }}</td>
                                        <td>{{ $item->author }}</td>
                                        <td>{{ $item->penerbit }}</td>
                                        <td>{{ $item->tahun }}</td>
                                        <td>{{ $item->jml_halaman }}</td>
                                        <td>{{ $item->harga }}</td>
                                        <td><span class="badge {{ $item->status == 0? 'badge-success' : 'badge-danger' }}">{{ $item->status == 0? 'Aktif' : 'Non Aktif' }}</span></td>
                                        <td>
                                            <button type="button" class="btn btn-inverse-danger btn-rounded btn-icon" wire:click="delete({{$item->id}})" data-toggle="tooltip" data-placement="top" title="Hapus">
                                            <i class="mdi mdi-trash-can-outline"></i>
                                            </button>
                                            <button type="button" class="btn btn-inverse-info btn-rounded btn-icon" wire:click="edit({{ $item->id }})" data-toggle="tooltip" data-placement="top" title="Edit">
                                            <i class="mdi mdi-pencil"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="9">
                                            <p class="text-center">Data tidak ada</p>
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                                </table>
                            </div>
                            <div class="row">
                                {{ $data->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@section('js')

@endsection