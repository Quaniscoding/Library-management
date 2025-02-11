<?php

namespace App\Livewire\Table;

use App\Models\DeXuat;
use Livewire\Component;

class NewDeXuat extends Component
{

    public function render()
    {
        $dexuats = DeXuat::with('sinhvien')->latest()->take(5)->get();
        return view('livewire.table.new-de-xuat', compact('dexuats'));
    }
}
