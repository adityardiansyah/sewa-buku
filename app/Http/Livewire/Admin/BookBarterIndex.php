<?php

namespace App\Http\Livewire\Admin;

use App\Barter;
use App\Buku;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class BookBarterIndex extends Component
{
    use WithPagination;
    public $search;

    public function render()
    {
        return view('livewire.admin.book-barter-index', [
            'data' => ($this->search == '') ? Buku::latest()->where('jenis_id', '=', 3)->where('user_id', Auth::user()->id)->paginate(10) : Buku::latest()->where('jenis_id', '=', 3)->where('judul', 'LIKE', '%' . $this->search . '%')->where('user_id', Auth::user()->id)->paginate(10)
        ]);
    }

    public function delete($id)
    {
        if ($id) {
            $data = Buku::find($id);
            foreach (json_decode($data->gambar, TRUE) as $key => $value) {
                $url = storage_path('app/public/' . $value);
                if (is_file($url)) {
                    unlink($url);
                }
            }
            $data->delete();
            $barter = Barter::where('buku_id', $id)->first();
            foreach (json_decode($barter->gambar, TRUE) as $key => $value) {
                $url = storage_path('app/public/' . $value);
                if (is_file($url)) {
                    unlink($url);
                }
            }
            $barter->delete();
            //flash message
            session()->flash('message', array('type' => 'success', 'content' => 'Data berhasil dihapus'));
            return redirect()->route('admin.book-barter-index');
        }
    }

    public function edit($id)
    {
        if ($id) {
            return redirect()->route('admin.book-barter-update', $id);
        }
    }

    
}
