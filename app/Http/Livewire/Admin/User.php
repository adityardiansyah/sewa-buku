<?php

namespace App\Http\Livewire\Admin;

use App\Buku;
use App\User as AppUser;
use Livewire\Component;

class User extends Component
{
    public function render()
    {
        return view('livewire.admin.user', [
            'data' => AppUser::latest()->get()
        ]);
    }

    public function delete($id)
    {
        $cek = Buku::where('user_id',$id)->first();
        if(empty($cek)){
            AppUser::find($id)->delete();
            session()->flash('message', array('type' => 'success', 'content' => 'Data berhasil dihapus'));
        }else{
            session()->flash('message', array('type' => 'error', 'content' => 'Data gagal dihapus, karena memiliki buku'));
        }
    }
}
