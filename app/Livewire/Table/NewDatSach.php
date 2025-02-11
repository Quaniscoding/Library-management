<?php

namespace App\Livewire\Table;

use App\Models\DatSach;
use Livewire\Component;

class NewDatSach extends Component
{
    public function render()
    {
        $datSachs = DatSach::latest()->take(5)->get();
        return view('livewire.table.new-dat-sach', compact('datSachs'));
    }
}
