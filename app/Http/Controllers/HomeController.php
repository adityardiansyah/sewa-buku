<?php

namespace App\Http\Controllers;

use App\Buku;
use App\Category;
use App\Jenis;
use App\User;
use Illuminate\Http\Request;
use Str;

class HomeController extends Controller
{
    public function search(Request $request)
    {
        $search = $request->search;
        $cari_kategori = $request->cari_kategori;
        $type = $request->type;
        $keyword = $request->value;
        
        $data = Buku::latest()->where('judul', 'LIKE', '%' . $search . '%');
        
        if($cari_kategori){
            $data = $data->where('kategori_id', $cari_kategori);
        } 
        if ($type) {
            if($type == 'judul'){
                $data = $data->where('judul', 'LIKE', '%' . $value . '%');
            }else{
                $data = $data->where($type, $value);
            }
        }
        $data = $data->where('status', 0)->paginate(20);
        foreach ($data as $key => $value) {
            $image = json_decode($value->gambar, TRUE);
            $value->image = !empty($image[0]) ? $image[0] : '';
            $value->slug = Str::slug($value->judul);
            $jenis = Jenis::find($value->jenis_id);
            $pemilik = User::find($value->user_id);
            $value->jenis = $jenis->nama;
            $value->kota = $pemilik->kota;
        }
        $kategori = Category::orderBy('nama','asc')->get();
        return view('livewire.search', compact('data','search','kategori','cari_kategori','type', 'keyword'));
    }

    public function kategori($slug)
    {
        $keyword = Category::where('slug', $slug)->first();
        $data = Buku::where('kategori_id',$keyword->id)->paginate(18);
        $kategori = Category::orderBy('nama', 'asc')->get();
        $cari_kategori = $keyword->id;
        foreach ($data as $key => $value) {
            $image = json_decode($value->gambar, TRUE);
            $value->image = !empty($image[0]) ? $image[0] : '';
            $value->slug = Str::slug($value->judul);
            $jenis = Jenis::find($value->jenis_id);
            $pemilik = User::find($value->user_id);
            $value->jenis = $jenis->nama;
            $value->kota = $pemilik->kota;
        }

        return view('livewire.kategori', compact('kategori','keyword', 'data','cari_kategori'));
    }
}
