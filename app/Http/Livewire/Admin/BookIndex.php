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
        $data = ($this->search == '') ? Buku::latest()->where('user_id', Auth::user()->id)->where('jenis_id', '!=', 3)->paginate(10) : Buku::latest()->where('judul', 'LIKE', '%' . $this->search . '%')->where('user_id', Auth::user()->id)->where('jenis_id', '!=', 3)->paginate(10);
        foreach ($data as $key => $value) {
            if ($value->status == 0) {
                $value->status_bookings = 'Aktif';
                $value->badge_booking = 'badge-warning';
            } elseif ($value->status == 1) {
                $value->status_bookings = 'Disewa';
                $value->badge_booking = 'badge-primary';
            } elseif ($value->status == 2) {
                $value->status_bookings = 'Dipinjam';
                $value->badge_booking = 'badge-primary';
            } elseif ($value->status == 5) {
                $value->status_bookings = 'Tidak Aktif';
                $value->badge_booking = 'badge-danger';
            }
        }

        return view('livewire.admin.book-index', [
            'data' => $data
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

    public function kembali($id)
    {
        if($id){
            Buku::find($id)->update(['status' => 0]);
            session()->flash('message', array('type' => 'success', 'content' => 'Buku berhasil diaktifkan kembali'));
        }
    }
}
