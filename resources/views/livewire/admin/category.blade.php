<div>
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-body">
                            <h4 class="card-title">Kategori</h4>
                            @if($statusUpdated)
                                @livewire('admin.category-update')
                            @else
                                @livewire('admin.category-create')
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mt-4">
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
                                    <th>Induk Kategori</th>
                                    <th>Nama Kategori</th>
                                    <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($data as $item)
                                    <tr>
                                        <td>{{ $item->parent->nama }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>
                                            <button type="button" class="btn btn-inverse-danger btn-rounded btn-icon" wire:click="delete({{$item->id}})">
                                            <i class="mdi mdi-trash-can-outline"></i>
                                            </button>
                                            <button type="button" class="btn btn-inverse-info btn-rounded btn-icon" wire:click="edit({{ $item->id }})">
                                            <i class="mdi mdi-pencil"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="3">
                                            <p class="text-center">Data tidak ada</p>
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                                </table>
                            </div>
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