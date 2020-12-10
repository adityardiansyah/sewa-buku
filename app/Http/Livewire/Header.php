<?php

namespace App\Http\Livewire;

use App\Category;
use Livewire\Component;

class Header extends Component
{
    public $search;

    public function render()
    {
        return view('livewire.header', [
            'kategori' => Category::orderBy('nama','asc')->get()
        ]);
    }

    public function mount()
    {
        $this->search = request()->query('search');
    }
}
