<?php

namespace App\Http\Livewire;

use App\Buku;
use Livewire\Component;
use Str;

class Index extends Component
{
    public function render()
    {
        $news = Buku::latest()->where('status', 0)->limit(8)->get();
        foreach ($news as $key => $value) {
            $image = json_decode($value->gambar, TRUE);
            $value->image = !empty($image[0])? $image[0] : '' ;
            $value->slug = Str::slug($value->judul);
        }
        return view('livewire.index', [
            'news' => $news
        ]);
    }

}
