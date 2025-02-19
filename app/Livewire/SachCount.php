<?php

namespace App\Livewire;

use App\Models\Sach;
use Livewire\Component;

class SachCount extends Component
{
    public $SachCount;
    public $bgColor;
    public function mount()
    {
        $this->SachCount = Sach::count();
        $this->bgColor = 'bg-green-500';
    }
    public function render()
    {
        return view('livewire.sach-count');
    }
}