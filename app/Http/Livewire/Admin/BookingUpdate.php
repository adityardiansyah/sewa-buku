<?php

namespace App\Http\Livewire\Admin;

use App\Booking;
use Livewire\Component;

class BookingUpdate extends Component
{
    protected $listeners = [
        'updateBooking' => 'handleUpdateBooking'
    ];

    public function render()
    {
        return view('livewire.admin.booking-update');
    }

    public function handleUpdateBooking($id)
    {
        $data = Booking::find($id);
        
    }
}
