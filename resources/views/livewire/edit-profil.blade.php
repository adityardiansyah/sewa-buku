@section('title')
    Edit Profil
@endsection
<div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-0 rounded shadow">
                <div class="card-body">
                    <h5 class="text-center"> <i class="fa fa-user-edit"></i> EDIT PROFIL</h5>
                    <hr>
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
                    <form wire:submit.prevent="update">
                        <input type="hidden" wire:model="user_id">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">NAMA LENGKAP</label>
                                    <input type="text" wire:model.lazy="nama" class="form-control @error('nama') is-invalid @enderror"
                                        placeholder="Nama lengkap" required>
                                    @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">ALAMAT EMAIL</label>
                                    <input type="text" wire:model.lazy="email" class="form-control @error('email') is-invalid @enderror"
                                        placeholder="Alamat Email" required>
                                    @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        
                        <div class="row">
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">NOMOR TELEPON</label>
                                    <input type="text" wire:model.lazy="no_telp" class="form-control @error('no_telp') is-invalid @enderror"
                                        placeholder="Nomor Telepon" required>
                                    @error('no_telp')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">KOTA</label>
                                    <input type="text" wire:model.lazy="kota" class="form-control @error('kota') is-invalid @enderror"
                                        placeholder="Kota" required>
                                    @error('kota')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">PASSWORD</label><br>
                                    <small>*kosongi apabila tidak diubah</small>
                                    <input type="password" wire:model.lazy="password"
                                        class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                                    @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="font-weight-bold">ALAMAT</label>
                                    <input type="text" wire:model.lazy="alamat" class="form-control @error('alamat') is-invalid @enderror"
                                        placeholder="Alamat" required>
                                    @error('alamat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary btn-block">UBAH</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
