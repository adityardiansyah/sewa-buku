<?php

namespace App\Http\Livewire\Admin;

use App\Category;
use Livewire\Component;
use Illuminate\Support\Str;

class CategoryCreate extends Component
{
    public $induk_id, $nama;

    public function render()
    {
        return view('livewire.admin.category-create', [
            'kategori' => Category::orderBy('nama', 'asc')->get()
        ]);
    }

    public function store()
    {
        Category::create([
            'induk_id' => $this->induk_id,
            'nama' => $this->nama,
            'slug' => Str::slug($this->nama)
        ]);
        $this->emit('storedCategory');
        $this->resetInput();
        session()->flash('message', array('type' => 'success', 'content' => 'Data berhasil disimpan'));
        // try{
        //     session()->flash('message', array('type' => 'success', 'content' => 'Data berhasil disimpan'));


        // }catch(\Exception $e){
        //     dd($e->getMessage());
        // }
    }

    public function resetInput()
    {
        $this->induk_id = null;
        $this->nama = null;
    }
}
