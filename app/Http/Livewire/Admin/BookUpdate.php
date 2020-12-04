<?php

namespace App\Http\Livewire\Admin;

use App\Buku;
use App\Category;
use App\Jenis;
use Livewire\Component;
use Livewire\WithFileUploads;

use function GuzzleHttp\json_decode;

class BookUpdate extends Component
{
    use WithFileUploads;
    public $id_buku, $judul, $author, $image, $imageUpdate, $jenis_id, $kategori_id, $tahun, $jml_halaman, $harga, $penerbit, $deskripsi, $status;

    public function render()
    {
        return view('livewire.admin.book-update', [
            'kategori' => Category::get(),
            'jenis' => Jenis::whereIn('id', [1, 2])->get()
        ]);
    }

    public function mount($id)
    {
        $data = Buku::find($id);
        $this->id_buku = $data['id'];
        $this->kategori_id = $data['kategori_id'];
        $this->image =json_decode($data['gambar'], TRUE);
        $this->jenis_id = $data['jenis_id'];
        $this->judul = $data['judul'];
        $this->author = $data['author'];
        $this->tahun = $data['tahun'];
        $this->jml_halaman = $data['jml_halaman'];
        $this->harga = $data['harga'];
        $this->penerbit = $data['penerbit'];
        $this->deskripsi = $data['deskripsi'];
        $this->status = $data['status'];
    }

    public function update()
    {
        $this->validate([
            'kategori_id' => 'required',
            'jenis_id' => 'required',
            'judul' => 'required',
            'author' => 'required',
            'tahun' => 'required',
            'jml_halaman' => 'required',
            'harga' => 'required',
            'penerbit' => 'required',
            'deskripsi' => 'required',
            'status' => 'required',
        ]);
        try{
            $gambar = $this->image;
            if(!empty($this->imageUpdate)){
                foreach ($this->imageUpdate as $key => $value) {
                    $this->imageUpdate[$key] = $value->store("buku", 'public');
                    array_push($gambar, $this->imageUpdate[$key]);
                }
            }
            
            $data = Buku::find($this->id_buku);
            $data->update([
                'kategori_id' => $this->kategori_id,
                'gambar' => json_encode($gambar),
                'jenis_id' => $this->jenis_id,
                'judul' => $this->judul,
                'author' => $this->author,
                'tahun' => $this->tahun,
                'jml_halaman' => $this->jml_halaman,
                'harga' => $this->harga,
                'penerbit' => $this->penerbit,
                'deskripsi' => $this->deskripsi,
                'status' => $this->status,
            ]);
            session()->flash('message', array('type' => 'success', 'content' => 'Data berhasil diedit'));
            $this->emit('editedBook');
            return redirect()->route('admin.book-update', $this->id_buku);
        }catch(\Exception $e){
            dd($e->getMessage());
        }
    }

    public function delete($id, $image)
    {
        if($id){
            $images = [];
            $data = Buku::find($id);
            foreach (json_decode($data->gambar, TRUE) as $key => $value) {
                if($value != $image){
                    array_push($images, $value);
                }else{
                    $url = storage_path('app/public/' . $value);
                    if (is_file($url)) {
                        unlink($url);
                    }
                }
            }
            $data->gambar = json_encode($images);
            $data->save();
        }
        return redirect()->route('admin.book-update', $id);

    }
}
