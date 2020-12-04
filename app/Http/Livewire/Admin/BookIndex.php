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
            'data' => ($this->search == '')? Buku::latest()->where('user_id', Auth::user()->id)->where('jenis_id','!=', 3)->paginate(10) : Buku::latest()->where('judul','LIKE','%'.$this->search.'%')->where('user_id', Auth::user()->id)->where('jenis_id', '!=', 3)->paginate(10)
        ]);
    }

    public function handleBookStored()
    {
        session()->flash('message', array('type' => 'success', 'content' => 'Data berhasil disimpan'));
    }

    public function delete($id)
    {
        if($id){
            $data = Buku::find($id);
            foreach (json_decode($data->gambar, TRUE) as $key => $value) {
                $url = storage_path('app/public/' . $value);
                if (is_file($url)) {
                    unlink($url);
                }
            }

            $data->delete();
            //flash message
            session()->flash('message', array('type' => 'success', 'content' => 'Data berhasil dihapus'));
            return redirect()->route('admin.book-index');
        }
    }

    public function edit($id)
    {
        if($id){
            return redirect()->route('admin.book-update', $id);
        }
    }
}
