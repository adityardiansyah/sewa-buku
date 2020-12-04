<?php

namespace App\Http\Livewire\Admin;

use App\Barter;
use App\Buku;
use App\Category;
use App\Jenis;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class BookBarterUpdate extends Component
{
    use WithFileUploads;
    public $judul, $author, $status, $image, $image_update, $jenis_id, $kategori_id, $tahun, $jml_halaman, $harga, $penerbit, $deskripsi, $id_buku;
    public $judul1, $author1, $image1, $image1_update , $tahun1, $penerbit1, $deskripsi1, $id_barter;

    public function render()
    {
        return view('livewire.admin.book-barter-update', [
            'kategori' => Category::get(),
            'jenis' => Jenis::get()
        ]);
    }

    public function mount($id)
    {
        $data = Buku::find($id);
        $this->id_buku = $data['id'];
        $this->kategori_id = $data['kategori_id'];
        $this->image = json_decode($data['gambar'], TRUE);
        $this->jenis_id = $data['jenis_id'];
        $this->judul = $data['judul'];
        $this->author = $data['author'];
        $this->tahun = $data['tahun'];
        $this->jml_halaman = $data['jml_halaman'];
        $this->harga = $data['harga'];
        $this->penerbit = $data['penerbit'];
        $this->deskripsi = $data['deskripsi'];
        $this->status = $data['status'];

        $barter = Barter::where('buku_id', $id)->first();
        $this->id_barter = $barter->id;
        $this->image1 = json_decode($barter->gambar);
        $this->judul1 = $barter->judul;
        $this->author1 = $barter->author;
        $this->tahun1 = $barter->tahun;
        $this->penerbit1 = $barter->penerbit;
        $this->deskripsi1 = $barter->deskripsi;
    }

    public function delete_buku($id, $image, $type)
    {
        $images = [];
        if ($type == '0') {
            $data = Buku::find($id);
        }elseif($type == '1'){
            $data = Barter::where('buku_id',$id)->first();
        }
        foreach (json_decode($data->gambar, TRUE) as $key => $value) {
            if ($value != $image) {
                array_push($images, $value);
            } else {
                $url = storage_path('app/public/' . $value);
                if (is_file($url)) {
                    unlink($url);
                }
            }
        }
        $data->gambar = json_encode($images);
        $data->save();

        return redirect()->route('admin.book-barter-update', $id);
    }

    public function update()
    {
        $this->validate([
            'kategori_id' => 'required',
            'judul' => 'required',
            'author' => 'required',
            'tahun' => 'required',
            'jml_halaman' => 'required',
            'harga' => 'required',
            'penerbit' => 'required',
            'deskripsi' => 'required',
        ]);
        try {
            $gambar = $this->image;
            if (!empty($this->image_update)) {
                foreach ($this->image_update as $key => $value) {
                    $this->image_update[$key] = $value->store("buku", 'public');
                    array_push($gambar, $this->image_update[$key]);
                }
            }

            $gambar1 = $this->image1;
            if (!empty($this->image1_update)) {
                foreach ($this->image1_update as $key => $value) {
                    $this->image1_update[$key] = $value->store("buku", 'public');
                    array_push($gambar1, $this->image1_update[$key]);
                }
            }
            $book = Buku::find($this->id_buku);
            $book->update([
                'user_id' => Auth::user()->id,
                'kategori_id' => $this->kategori_id,
                'gambar' => json_encode($gambar),
                'judul' => $this->judul,
                'author' => $this->author,
                'tahun' => $this->tahun,
                'jml_halaman' => $this->jml_halaman,
                'harga' => $this->harga,
                'penerbit' => $this->penerbit,
                'deskripsi' => $this->deskripsi,
                'status' => $this->status
            ]);
            $barter = Barter::find($this->id_barter);
            $barter->update([
                'gambar' => json_encode($gambar1),
                'judul' => $this->judul1,
                'author' => $this->author1,
                'tahun' => $this->tahun1,
                'penerbit' => $this->penerbit1,
                'deskripsi' => $this->deskripsi1
            ]);
            session()->flash('message', array('type' => 'success', 'content' => 'Data berhasil diedit'));

            return redirect()->to('/book-barter-index');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
