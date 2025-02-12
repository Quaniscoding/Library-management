<?php

namespace App\Livewire;

use App\Models\Sach;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Trang chủ - ITCLib')]

class HomePage extends Component
{
    public function render()
    {
        $sachs = Sach::all();
        return view('livewire.home-page', ['sachs' => $sachs]);
    }
}
