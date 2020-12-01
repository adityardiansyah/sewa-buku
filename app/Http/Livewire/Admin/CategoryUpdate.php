<?php

namespace App\Http\Livewire\Admin;

use App\Category;
use Livewire\Component;
use Illuminate\Support\Str;

class CategoryUpdate extends Component
{
    public $induk_id, $nama, $category_id, $cat_id;
    protected $listeners = ['updateCategory' => 'handleUpdateCategory'];

    public function render()
    {
        return view('livewire.admin.category-update', [
            'kategori' => Category::orderBy('nama', 'asc')->get()
        ]);
    }
    
    public function handleUpdateCategory($data)
    {
        $this->induk_id = $data['induk_id'];
        $this->nama = $data['nama'];
        $this->category_id = $data['id'];
    }

    public function update()
    {
        if ($this->category_id) {
            $data = Category::find($this->category_id);
            $data->update([
                'induk_id' => $this->induk_id,
                'nama' => $this->nama,
                'slug' => Str::slug($this->nama)
            ]);
            $this->resetInput();
            session()->flash('message', array('type' => 'success', 'content' => 'Data berhasil diubah'));
        }

        $this->emit('updatedCategory');
    }

    public function resetInput()
    {
        $this->induk_id = null;
        $this->nama = null;
    }
}
