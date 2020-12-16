<?php

namespace App\Http\Livewire;

use App\Booking as AppBooking;
use App\Buku;
use App\Ulasan;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Booking extends Component
{
    public $rating, $ulasan; 

    public function render()
    {
        $data = AppBooking::select('buku.*', 'user.nama', 'user.no_telp', 'booking.kode','booking.created_at as waktu_booking','booking.status as status_booking')
            ->leftJoin('buku', 'buku.id', 'booking.buku_id')
            ->leftJoin('user', 'user.id', 'buku.user_id')
            ->where('booking.user_id', Auth::user()->id)->latest()->get();
        foreach ($data as $key => $value) {
            $gambar = json_decode($value->gambar, TRUE);
            $value->gambar = !empty($gambar[0])? $gambar[0]: '';
            foreach ($data as $key => $value) {
                if ($value->status_booking == 0) {
                    $value->status_bookings = 'Belum ada Tanggapan';
                    $value->badge_booking = 'badge-warning';
                } elseif ($value->status_booking == 1) {
                    $value->status_bookings = 'Disewa';
                    $value->badge_booking = 'badge-primary';
                } elseif ($value->status_booking == 2) {
                    $value->status_bookings = 'Dipinjam';
                    $value->badge_booking = 'badge-primary';
                } elseif ($value->status_booking == 5) {
                    $value->status_bookings = 'Ditolak';
                    $value->badge_booking = 'badge-danger';
                }
                $value->ulasan = Ulasan::where('buku_id',$value->id)->where('user_id', Auth::user()->id)->first();
            }
            // $value->status_booking = ($value->status == 0) ? $value->status == 1 ? 'Diterima' : 'Belum direspon' : 'Ditolak';
            // $value->status = ($value->status == 0) ? $value->status == 1 ? 'badge-success' : 'badge-warning' : 'badge-danger';
        }

        return view('livewire.booking', [
            'data' => $data
        ]);
    }

    public function ulasan($id)
    {
        if($id){
            Ulasan::create([
                'user_id' => Auth::user()->id,
                'buku_id' => $id,
                'rating' => $this->rating,
                'ulasan' => $this->ulasan
            ]);
            session()->flash('message', array('type' => 'success', 'content' => 'Ulasan telah dikirim, Terima Kasih :)'));
        }else{
            dd($id);
        }
    }

}
