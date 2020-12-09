<?php

namespace App\Http\Livewire;

use App\Buku;
use Livewire\Component;
use Livewire\WithPagination;
use Str;

class Search extends Component
{
    public $search;
    use WithPagination;

    public function render()
    {
        $data = Buku::latest()->where('judul','LIKE','%'.$this->search.'%')->where('status', 0)->paginate(20);
        foreach ($data as $key => $value) {
            $image = json_decode($value->gambar, TRUE);
            $value->image = !empty($image[0]) ? $image[0] : '';
            $value->slug = Str::slug($value->judul);
        }
        return view('livewire.search', [
            'data' => $data
        ]);
    }
}
