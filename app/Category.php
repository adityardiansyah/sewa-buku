<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'kategori';
    protected $fillable = ['induk_id','nama','slug'];

    public function children()
    {
        return $this->hasMany('App\Category', 'induk_id', 'id');
    }

    public function parent()
    {
        return $this->hasOne('App\Category', 'id', 'induk_id')->withDefault([
            'nama' => 'Tidak Ada',
        ]);
    }
}
