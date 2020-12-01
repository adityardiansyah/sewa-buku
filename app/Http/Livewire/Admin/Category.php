<?php

namespace App\Http\Livewire\Admin;

use App\Category as AppCategory;
use Illuminate\Support\Facades\App;
use Livewire\Component;

class Category extends Component
{
    public $statusUpdated = false;
    protected $listeners = [
        'storedCategory' => 'handleStored',
        'updatedCategory' => 'handleUpdatedCategory'
    ];
    
    public function render()
    {
        return view('livewire.admin.category', [
            'data' => AppCategory::latest()->get()
        ]);
    }

    public function handleStored()
    {
    }

    public function handleUpdatedCategory()
    {
        # code...
    }

    public function delete($id)
    {
        if ($id) {
            $data = AppCategory::find($id);
            $cek_induk = AppCategory::where('induk_id', $data->id)->first();
            if (empty($cek_induk)) {
                $data->delete();

                session()->flash('message', array('type' => 'success', 'content' => 'Data berhasil dihapus'));
            } else {
                session()->flash('message', array('type' => 'error', 'content' => 'Data gagal dihapus, karena memiliki sub kategori'));
            }
        }
    }

    public function edit($id)
    {
        if($id){
            $this->statusUpdated = true;
            $data = AppCategory::find($id);
            $this->emit('updateCategory', $data);
        }
    }
}
