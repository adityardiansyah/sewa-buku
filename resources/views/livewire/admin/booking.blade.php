<div>
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="row">
                <div class="col-md-8">
                    <h3><i class="mdi mdi-book-multiple menu-icon"></i> Daftar Booking</h3>
                </div>
                <div class="col-md-4 text-right">
                    <div class="form-group">
                        <div class="input-group">
                        <input type="text" class="form-control" placeholder="Cari Kode Booking disini ..." aria-label="Cari Kode Booking disini ..." wire:model="search">
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
                                    <th>Kode Booking</th>
                                    <th>Nama Booking</th>
                                    <th>No Telepon</th>
                                    <th>Judul Buku</th>
                                    <th>Waktu</th>
                                    <th>Status</th>
                                    <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($data as $item)
                                    <tr>
                                        <td>{{ $item->kode }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->no_telp }}</td>
                                        <td>{{ $item->judul }}</td>
                                        <td>{{ date('d-m-Y H:i:s', strtotime($item->waktu_booking)) }}</td>
                                        <td><span class="badge {{ $item->badge_booking }}">{{ $item->status_bookings }}</span></td>
                                        <td>
                                            @if($item->status_booking == '0')
                                                <button type="button" class="btn btn-inverse-success btn-rounded btn-icon" wire:click="edit({{ $item->id }}, {{ $item->id_booking }}, 'setujui')" data-toggle="tooltip" data-placement="top" title="Setujui">
                                                <i class="mdi mdi-check"></i>
                                                </button>
                                                <button type="button" class="btn btn-inverse-danger btn-rounded btn-icon" wire:click="edit({{ $item->id }}, {{ $item->id_booking }}, 'tolak')" data-toggle="tooltip" data-placement="top" title="Tolak">
                                                <i class="mdi mdi-close"></i>
                                                </button>
                                            @endif
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6">
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