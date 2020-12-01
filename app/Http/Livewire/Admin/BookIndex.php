<?php

namespace App\Http\Livewire\Admin;

use App\Buku;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class BookIndex extends Component
{
    use WithPagination;

    public $search;

    protected $listeners = ['bookStored' => 'handleBookStored'];

    public function render()
    {
        return view('livewire.admin.book-index', [
            'data' => ($this->search == '')? Buku::latest()->where('user_id', Auth::user()->id)->paginate(10) : Buku::latest()->where('judul','LIKE','%'.$this->search.'%')->where('user_id', Auth::user()->id)->paginate(10)
        ]);
    }

    public function handleBookStored()
    {
        session()->flash('message', array('type' => 'success', 'content' => 'Data berhasil disimpan'));
    }
}
