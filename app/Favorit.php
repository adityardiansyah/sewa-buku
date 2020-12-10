<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorit extends Model
{
    protected $table = 'list_favorit';
    protected $fillable = ['buku_id','user_id'];
}
