<?php

namespace App\Http\Livewire;

use App\Booking as AppBooking;
use App\Buku;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Booking extends Component
{
    public function render()
    {
        $data = AppBooking::select('buku.*', 'user.nama', 'user.no_telp', 'booking.kode','booking.created_at as waktu_booking','booking.status')
            ->leftJoin('buku', 'buku.id', 'booking.buku_id')
            ->leftJoin('user', 'user.id', 'buku.user_id')
            ->where('booking.user_id', Auth::user()->id)->latest()->get();
        foreach ($data as $key => $value) {
            $gambar = json_decode($value->gambar, TRUE);
            $value->gambar = !empty($gambar[0])? $gambar[0]: '';
            $value->status_booking = ($value->status == 0) ? $value->status == 1 ? 'Diterima' : 'Belum direspon' : 'Ditolak';
            $value->status = ($value->status == 0) ? $value->status == 1 ? 'badge-success' : 'badge-warning' : 'badge-danger';
        }

        return view('livewire.booking', [
            'data' => $data
        ]);
    }

}
