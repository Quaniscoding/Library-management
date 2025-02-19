<?php

namespace App\Livewire\Table;

use App\Models\DeXuat;
use Livewire\Component;

class NewDeXuat extends Component
{
    public $todayCount;
    public function render()
    {
        $dexuats = DeXuat::with('sinhvien')->latest()->take(5)->get();
        $this->todayCount = DeXuat::whereDate('created_at', today())->count();
        return view('livewire.table.new-de-xuat', compact('dexuats'));
    }
}