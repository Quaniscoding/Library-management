<?php

namespace App\Livewire\Table;

use App\Models\PhanHoi;
use Livewire\Component;

class NewPhanHoi extends Component
{
    public function render()
    {
        $phanhois = PhanHoi::with('sinhvien')->latest()->take(5)->get();
        return view('livewire.table.new-phan-hoi', compact('phanhois'));
    }
}
