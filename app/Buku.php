<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'buku';
    protected $fillable = ['user_id', 'kategori_id','author','tahun','gambar','jenis_id','judul','jml_halaman','harga','penerbit','status','deskripsi'];

    public function kategori()
    {
        return $this->belongsTo('App\Category');
    }

    public function jenis()
    {
        return $this->belongsTo('App\Jenis');
    }
}
