<?php

namespace App\Livewire\Table;

use App\Models\Phat;
use Livewire\Component;

class BiPhat extends Component
{

    public function render()
    {
        $biphats = Phat::with(['sinhvien', 'sach', 'phieutra'])->latest()->take(5)->get();
        return view('livewire.table.bi-phat', compact('biphats'));
    }
}
