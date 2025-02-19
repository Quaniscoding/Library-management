<?php

namespace App\Livewire\Table;

use App\Models\Phat;
use Livewire\Component;

class BiPhat extends Component
{
    public $todayCount;
    public function render()
    {
        $biphats = Phat::with(['sinhvien', 'sach', 'phieutra'])->latest()->take(5)->get();
        $this->todayCount = Phat::whereDate('created_at', today())->count();
        return view('livewire.table.bi-phat', compact('biphats'));
    }
}