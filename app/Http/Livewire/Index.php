<?php

namespace App\Http\Livewire;

use App\Buku;
use App\Jenis;
use App\User;
use Livewire\Component;
use Str;

class Index extends Component
{
    public function render()
    {
        $news = Buku::latest()->where('status', 0)->where('jenis_id', '!=', 3)->limit(8)->get();
        foreach ($news as $key => $value) {
            $image = json_decode($value->gambar, TRUE);
            $value->image = !empty($image[0])? $image[0] : '' ;
            $value->slug = Str::slug($value->judul);
            $jenis = Jenis::find($value->jenis_id);
            $pemilik = User::find($value->user_id);
            $value->jenis = $jenis->nama;
            $value->kota = $pemilik->kota;
        }

        $barter = Buku::latest()->where('status', 0)->where('jenis_id', 3)->limit(8)->get();
        foreach ($barter as $key => $value) {
            $image = json_decode($value->gambar, TRUE);
            $value->image = !empty($image[0]) ? $image[0] : '';
            $value->slug = Str::slug($value->judul);
            $jenis = Jenis::find($value->jenis_id);
            $pemilik = User::find($value->user_id);
            $value->jenis = $jenis->nama;
            $value->kota = $pemilik->kota;
        }
        return view('livewire.index', [
            'news' => $news,
            'barter' => $barter,
        ]);
    }

}
