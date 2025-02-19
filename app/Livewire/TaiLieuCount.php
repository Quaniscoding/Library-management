<?php

namespace App\Livewire;

use App\Models\TaiLieuMo;
use Livewire\Component;

class TaiLieuCount extends Component
{
    public $TaiLieuCount;
    public $bgColor;
    public function mount()
    {
        $this->TaiLieuCount = TaiLieuMo::count();
        $this->bgColor = 'bg-orange-500';
    }

    public function render()
    {
        return view('livewire.tai-lieu-count');
    }
}