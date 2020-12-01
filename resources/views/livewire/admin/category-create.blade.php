<div>
    <form class="forms-sample" wire:submit.prevent="store">
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
            <div class="col-md-6">
                <div class="form-group">
                <label for="induk">Induk Kategori</label>
                <select class="form-control form-control-lg" id="exampleFormControlSelect1" wire:model="induk_id" required>
                    <option value="0">Tidak Ada</option>
                    @foreach ($kategori as $item)
                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                    @endforeach
                </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                <label for="exampleInputUsername1">Nama Kategori</label>
                <input type="text" class="form-control" wire:model="nama" placeholder="Nama Kategori" required>
                </div>
            </div>
            <div class="col-md-12 text-right">
                <button type="submit" class="btn btn-primary mr-2" >Submit</button>
            </div>
        </div>
    </form>
</div>
