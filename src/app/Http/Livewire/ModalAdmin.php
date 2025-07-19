<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ModalAdmin;

class Modal extends Component
{
    public $items;
    public $selectedItem = null;

    public function mount()
    {
        $this->item = Item::all();
    }

    public function showDetail($id)
    {
        $this->selectedItem = Item::findOrFail($id);
    }

    public function closeModal()
    {
        $this->selectedItem = null;
    }
    public function render()
    {
        return view('livewire.admin-item');
    }
}
