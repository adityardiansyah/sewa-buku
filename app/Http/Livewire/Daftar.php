<?php

namespace App\Http\Livewire;

use App\User;
use Livewire\Component;

class Daftar extends Component
{
    public $nama;
    public $email;
    public $password;
    public $kota;
    public $no_telp;
    public $alamat;
    public $password_confirmation;

    public function store()
    {
        $this->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:user',
            'password' => 'required|confirmed',
            'kota' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
        ]);

        $user = User::create([
            'nama' => $this->nama,
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'kota' => $this->kota,
            'no_telp' => $this->no_telp,
            'alamat' => $this->alamat,
            'hak_akses' => 2,
            'status' => 1,
        ]);

        if($user){
            session()->flash('success','Daftar Akun Berhasil');
            return redirect()->route('login');
        }
    }

    public function render()
    {
        return view('livewire.daftar');
    }
}
