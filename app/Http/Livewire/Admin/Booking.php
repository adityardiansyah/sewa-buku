<?php

namespace App\Http\Livewire\Admin;

use App\Booking as AppBooking;
use App\Buku;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Booking extends Component
{
    use WithPagination;
    public $search;


    public function render()
    {
        $data = AppBooking::select('buku.*', 'booking.id as id_booking','user.nama', 'user.no_telp', 'booking.kode', 'booking.created_at as waktu_booking', 'booking.status as status_booking')
        ->leftJoin('buku', 'buku.id', 'booking.buku_id')
        ->leftJoin('user', 'user.id', 'buku.user_id')
        ->where('buku.user_id',Auth::user()->id)
        ->where('booking.kode','LIKE','%'.$this->search.'%')
        ->orderBy('booking.created_at','desc')->paginate(20);

        foreach ($data as $key => $value) {
            if($value->status_booking == 0){
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
        }

        return view('livewire.admin.booking', [
            'data' => $data
        ]);
    }
    
    public function edit($id, $id_booking, $type)
    {
        if($type == 'setujui'){
            Buku::find($id)->update(['status' => 2]); //sedang disewa
            AppBooking::find($id_booking)->update(['status' => 1]); //sedang disewa
    
            session()->flash('message', array('type' => 'success', 'content' => 'Booking berhasil disetujui'));
        }elseif($type == 'tolak'){
            // Buku::find($id)->update(['status' => 5]); //booking sedang ditolak
            AppBooking::find($id_booking)->update(['status' => 5]); //booking sedang ditolak

            session()->flash('message', array('type' => 'success', 'content' => 'Booking berhasil ditolak'));
        }
    }
    
}
