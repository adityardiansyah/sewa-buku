<?php

namespace App\Http\Livewire;

use App\Booking;
use App\Buku;
use App\Jenis;
use App\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DetailBook extends Component
{
    public $id_buku, $judul, $author,$jenis, $image, $jenis_id, $kategori_id, $tahun, $jml_halaman, $harga, $penerbit, $deskripsi;
    public $pemilik, $bookingStatus;

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
        $booking = Booking::where('user_id', Auth::user()->id)->where('buku_id', $id)->first();
        $this->bookingStatus = empty($booking)? TRUE : FALSE;

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
}
