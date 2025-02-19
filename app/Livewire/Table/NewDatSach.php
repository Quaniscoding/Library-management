<?php

namespace App\Livewire\Table;

use App\Models\DatSach;
use Livewire\Component;

class NewDatSach extends Component
{
    public $todayCount;
    public function render()
    {
        $datSachs = DatSach::latest()->take(5)->get();
        $this->todayCount = DatSach::whereDate('created_at', today())->count();
        return view('livewire.table.new-dat-sach', compact('datSachs'));
    }
}