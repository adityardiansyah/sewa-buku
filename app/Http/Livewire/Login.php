<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;

    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt(['email' => $this->email, 'password' => $this->password])){
            return redirect()->route('index');
        }else{
            session()->flash('error','Alamat Email atau Password anda salah!');
            return redirect()->route('login');
        }
    }

    public function render()
    {
        return view('livewire.login');
    }
}
