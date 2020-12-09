<?php

namespace App\Http\Livewire;

use App\Buku;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Str;

class Login extends Component
{
    public $email;
    public $password;
    public $type;
    protected $queryString = ['type'];

    public function mount(Request $request)
    {
        $this->type = request()->query('type');
    }

    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt(['email' => $this->email, 'password' => $this->password])){
            $cek = User::where('email',$this->email)->first();
            if($cek->hak_akses == 1){
                return redirect()->route('dashboard');
            }else{
                if (empty($this->type)) {
                    return redirect()->route('index');
                } else {
                    $buku = Buku::find($this->type);
                    return redirect()->route('detail-book', [$this->type, Str::slug($buku->judul)]);
                }
            }
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
