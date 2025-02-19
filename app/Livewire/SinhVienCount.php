<?php

namespace App\Livewire;

use App\Models\SinhVien;
use Livewire\Component;

class SinhVienCount extends Component
{
    public $SinhVienCount;
    public $bgColor;
    public function mount()
    {
        $this->SinhVienCount = SinhVien::count();
        $this->bgColor = 'bg-red-500';
    }
    public function render()
    {
        return view('livewire.sinh-vien-count');
    }
}