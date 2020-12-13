<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'booking';

    protected $fillable = ['kode','user_id','buku_id','status'];
}

// Status
// 0 = Belum ada respon
// 1 = Disewa
// 2 = Dipinjam
// 5 = Ditolak