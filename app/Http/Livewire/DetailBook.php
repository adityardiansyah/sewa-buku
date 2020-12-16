<?php

namespace App\Http\Livewire;

use App\Barter;
use App\Booking;
use App\Buku;
use App\Favorit;
use App\Jenis;
use App\Ulasan;
use App\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DetailBook extends Component
{
    use AuthorizesRequests;
    public $id_buku, $judul, $author,$jenis, $image, $jenis_id, $kategori_id, $tahun, $jml_halaman, $harga, $penerbit, $deskripsi;
    public $pemilik, $bookingStatus, $favoritStatus, $ulasan;
    public $judul1, $author1, $image1, $image1_update, $tahun1, $penerbit1, $deskripsi1, $id_barter;

    public function render()
    {
        return view('livewire.detail-book');
    }

    public function mount($id)
    {
        $data = Buku::findOrFail($id);
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
        $this->jenis = Jenis::find($this->jenis_id);
        $this->pemilik = User::find($data->user_id);
        if(!empty(Auth::user()->id)){
            $booking = Booking::where('user_id', Auth::user()->id)->where('buku_id', $id)->where('status', 0)->first();
            $favorit = Favorit::where('buku_id', $id)->where('user_id', Auth::user()->id)->first();
        }else{
            $booking = '';
            $favorit = '';
        }
        $this->bookingStatus = empty($booking)? TRUE : FALSE;
        $this->favoritStatus = !empty($favorit)? TRUE : FALSE;

        if($this->jenis_id == 3){
            $barter = Barter::where('buku_id', $id)->first();
            $this->id_barter = $barter->id;
            $this->image1 = json_decode($barter->gambar);
            $this->judul1 = $barter->judul;
            $this->author1 = $barter->author;
            $this->tahun1 = $barter->tahun;
            $this->penerbit1 = $barter->penerbit;
            $this->deskripsi1 = $barter->deskripsi;
        }
        $this->ulasan = Ulasan::select('ulasan.*','user.nama')->leftJoin('user','user.id','ulasan.user_id')->where('buku_id', $id)->get();
        
    }

    public function booking()
    {
        $total_booking = Booking::get()->count();
        Booking::create([
            'kode' => 'BOOK-'.$total_booking,
            'user_id' => Auth::user()->id,
            'buku_id' => $this->id_buku,
            'status' => 0
        ]);
        session()->flash('message', array('type' => 'success', 'content' => 'Booking buku berhasil, silakan hubungi pemilik buku, untuk konfirmasi booking buku terkait!'));
        return redirect()->route('booking');
    }

    public function favorit($id)
    {
        if(empty(Auth::user())){
            return redirect()->to('login');
        }else{
            $cek = Favorit::where('buku_id', $id)->where('user_id', Auth::user()->id)->first();
            if(empty($cek)){
                Favorit::create([
                    'buku_id' => $id,
                    'user_id' => Auth::user()->id
                ]);
                session()->flash('message', array('type' => 'success', 'content' => 'Berhasil dimasukkan whiselist'));
                $this->favoritStatus = TRUE;
            }else{                
                $cek->delete();
                session()->flash('message', array('type' => 'success', 'content' => 'Berhasil dihapus dari whiselist'));
                $this->favoritStatus = FALSE;
            }
        }
    }
}
