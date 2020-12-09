<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Header extends Component
{
    public $search;

    public function render()
    {
        return view('livewire.header');
    }

    public function mount()
    {
        $this->search = request()->query('search');
    }
}
