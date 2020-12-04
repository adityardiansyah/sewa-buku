<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barter extends Model
{
    protected $table = 'tukar_buku';
    protected $fillable = ['buku_id', 'author', 'tahun', 'gambar','judul', 'penerbit', 'deskripsi'];

}
