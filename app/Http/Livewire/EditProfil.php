<?php

namespace App\Http\Livewire;

use App\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EditProfil extends Component
{
    public $user_id;
    public $nama;
    public $email;
    public $password;
    public $kota;
    public $no_telp;
    public $alamat;

    public function mount()
    {
        $this->user_id = Auth::user()->id;
        $this->nama = Auth::user()->nama;
        $this->email = Auth::user()->email;
        $this->kota = Auth::user()->kota;
        $this->no_telp = Auth::user()->no_telp;
        $this->alamat = Auth::user()->alamat;
    }

    public function render()
    {
        return view('livewire.edit-profil');
    }

    public function update()
    {
        $data = User::find($this->user_id);
        $data->update([
            'nama' => $this->nama,
            'email' => $this->email,
            'kota' => $this->kota,
            'no_telp' => $this->no_telp,
            'alamat' => $this->alamat,
        ]);
        if(!empty($this->password)){
            $data->password = bcrypt($this->password);
            $data->save();
        }
        session()->flash('message', array('type' => 'success', 'content' => 'Edit profil berhasil'));
    }
}
