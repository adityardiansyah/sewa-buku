@section('title')
    Daftar Akun
@endsection
<div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-0 rounded shadow">
                <div class="card-body">
                    <h5 class="text-center"> <i class="fa fa-user-plus"></i> REGISTER</h5>
                    <hr>
                    <form wire:submit.prevent="store">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">NAMA LENGKAP</label>
                                    <input type="text" wire:model.lazy="nama" class="form-control @error('nama') is-invalid @enderror"
                                        placeholder="Nama lengkap">
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
                                        placeholder="Alamat Email">
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
                                    <label class="font-weight-bold">PASSWORD</label>
                                    <input type="password" wire:model.lazy="password"
                                        class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                                    @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">KONFIRMASI PASSWORD</label>
                                    <input type="password" wire:model.lazy="password_confirmation"
                                        class="form-control" placeholder="Konfirmasi Password">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">KOTA</label>
                                    <input type="text" wire:model.lazy="kota" class="form-control @error('kota') is-invalid @enderror"
                                        placeholder="Kota">
                                    @error('kota')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">NOMOR TELEPON</label>
                                    <input type="text" wire:model.lazy="no_telp" class="form-control @error('no_telp') is-invalid @enderror"
                                        placeholder="Nomor Telepon">
                                    @error('no_telp')
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
                                        placeholder="Alamat">
                                    @error('alamat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary btn-block">REGISTER</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
