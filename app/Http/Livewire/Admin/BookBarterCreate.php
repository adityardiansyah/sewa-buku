<?php

namespace App\Http\Livewire\Admin;

use App\Barter;
use App\Buku;
use App\Category;
use App\Jenis;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class BookBarterCreate extends Component
{
    use WithFileUploads;
    public $judul, $author, $image, $jenis_id, $kategori_id, $tahun, $jml_halaman, $harga, $penerbit, $deskripsi;
    public $judul1, $author1, $image1, $tahun1, $penerbit1, $deskripsi1;

    public function render()
    {
        return view('livewire.admin.book-barter-create', [
            'kategori' => Category::get(),
            'jenis' => Jenis::get()
        ]);
    }

    public function store()
    {
        $this->validate([
            'kategori_id' => 'required',
            'image.*' => 'image|mimes:jpeg,png,jpg',
            'judul' => 'required',
            'author' => 'required',
            'tahun' => 'required',
            'jml_halaman' => 'required',
            'harga' => 'required',
            'penerbit' => 'required',
            'deskripsi' => 'required',
        ]);
        try {
            $gambar = [];
            foreach ($this->image as $key => $value) {
                $this->image[$key] = $value->store("buku", 'public');
                array_push($gambar, $this->image[$key]);
            }
            $gambar1 = [];
            foreach ($this->image1 as $key => $value) {
                $this->image1[$key] = $value->store("buku", 'public');
                array_push($gambar1, $this->image1[$key]);
            }
            $book = Buku::create([
                'user_id' => Auth::user()->id,
                'kategori_id' => $this->kategori_id,
                'gambar' => json_encode($gambar),
                'jenis_id' => 3,
                'judul' => $this->judul,
                'author' => $this->author,
                'tahun' => $this->tahun,
                'jml_halaman' => $this->jml_halaman,
                'harga' => $this->harga,
                'penerbit' => $this->penerbit,
                'deskripsi' => $this->deskripsi,
                'status' => 0
            ]);
            Barter::create([
                'buku_id' => $book->id,
                'gambar' => json_encode($gambar1),
                'judul' => $this->judul1,
                'author' => $this->author1,
                'tahun' => $this->tahun1,
                'penerbit' => $this->penerbit1,
                'deskripsi' => $this->deskripsi1
            ]);
            session()->flash('message', array('type' => 'success', 'content' => 'Data berhasil disimpan'));

            return redirect()->to('/book-barter-index');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
