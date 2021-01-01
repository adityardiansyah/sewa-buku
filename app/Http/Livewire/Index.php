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
        $news = $this->get_buku('all');
        $barter = $this->get_buku(3);
        $sewa = $this->get_buku(2);
        $pinjam = $this->get_buku(1);
        $jual = $this->get_buku(4);
        
        return view('livewire.index', [
            'news' => $news,
            'barter' => $barter,
            'pinjam' => $pinjam,
            'jual' => $jual,
            'sewa' => $sewa
        ]);
    }

    public function get_buku($jenis)
    {
        $data = Buku::latest()->where('status', 0);
        
        if($jenis == 'all'){
            $data = $data->where('jenis_id', '!=', 3);
        }else{
            $data = $data->where('jenis_id', $jenis);
        }
        
        $data = $data->limit(8)->get();
        foreach ($data as $key => $value) {
            $image = json_decode($value->gambar, TRUE);
            $value->image = !empty($image[0]) ? $image[0] : '';
            $value->slug = Str::slug($value->judul);
            $jenis = Jenis::find($value->jenis_id);
            $pemilik = User::find($value->user_id);
            $value->jenis = $jenis->nama;
            $value->kota = $pemilik->kota;
        }
        return $data;
    }
}
