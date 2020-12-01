<?php

namespace App\Http\Livewire\Admin;

use App\Buku;
use App\Category;
use App\Jenis;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class BookCreate extends Component
{
    use WithFileUploads;
    public $judul, $author, $image, $jenis_id, $kategori_id, $tahun, $jml_halaman, $harga, $penerbit;

    public function render()
    {
        return view('livewire.admin.book-create',[
            'kategori' => Category::get(),
            'jenis' => Jenis::get()
        ]);
    }

    public function store()
    {
        $this->validate([
            'kategori_id' => 'required',
            'image.*' => 'image|mimes:jpeg,png,jpg',
            'jenis_id' => 'required',
            'judul' => 'required',
            'author' => 'required',
            'tahun' => 'required',
            'jml_halaman' => 'required',
            'harga' => 'required',
            'penerbit' => 'required',
        ]);
        try{
            $gambar = [];
            foreach ($this->image as $key => $value) {
                $this->image[$key] = $value->store("buku", 'public');
                array_push($gambar, $this->image[$key]);
            }
            Buku::create([
                'user_id' => Auth::user()->id,
                'kategori_id' => $this->kategori_id,
                'gambar' => json_encode($gambar),
                'jenis_id' => $this->jenis_id,
                'judul' => $this->judul,
                'author' => $this->author,
                'tahun' => $this->tahun,
                'jml_halaman' => $this->jml_halaman,
                'harga' => $this->harga,
                'penerbit' => $this->penerbit,
                'status' => 0
            ]);
            return redirect()->to('/book-index');
            // $this->emit('bookStored');

        }catch(\Exception $e){
            dd($e->getMessage());
        }
    }
}
