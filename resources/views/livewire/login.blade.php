@section('title')
    Login
@endsection
<div>
    <div class="container" style="margin-top: 100px">
        <div class="row justify-content-center">
            <div class="col-md-4">
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
                <div class="card border-0 rounded shadow">
                    <div class="card-body">
                        <h5 class="text-center"> <i class="fa fa-user-circle"></i> LOGIN</h5>
                        <hr>
                        <form wire:submit.prevent="login">
                            <input type="hidden" value="{{ Request::get('type') }}" name="type" wire:model="type">
                            <div class="form-group">
                                <label class="font-weight-bold">ALAMAT EMAIL</label>
                                <input type="text" wire:model.lazy="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    placeholder="Alamat Email">
                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

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

                            <button type="submit" class="btn btn-primary btn-block">LOGIN</button>
                        </form>
                        <br>
                        <small>Belum punya akun? <a href="{{ url('daftar?type='.Request::get('type')) }}">Daftar</a></small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@section('js')
    <script></script>
@endsection