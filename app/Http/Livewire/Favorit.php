<?php

namespace App\Http\Livewire;

use App\Favorit as AppFavorit;
use App\Jenis;
use App\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Str;

class Favorit extends Component
{
    public function render()
    {
        $data = AppFavorit::select('buku.*')->leftJoin('buku','buku.id','list_favorit.buku_id')
        ->where('list_favorit.user_id', Auth::user()->id)->paginate(20);
        foreach ($data as $key => $value) {
            $image = json_decode($value->gambar, TRUE);
            $value->image = !empty($image[0]) ? $image[0] : '';
            $value->slug = Str::slug($value->judul);
            $jenis = Jenis::find($value->jenis_id);
            $pemilik = User::find($value->user_id);
            $value->jenis = $jenis->nama;
            $value->kota = $pemilik->kota;
        }

        return view('livewire.favorit', ['data' => $data]);
    }
}
