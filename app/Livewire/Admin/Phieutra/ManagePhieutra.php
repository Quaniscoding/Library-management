<?php

namespace App\Livewire\Admin\Phieutra;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Quản lý phiếu trả - ITCLib')]

class ManagePhieutra extends Component
{
    public function render()
    {
        return view('livewire.admin.phieutra.manage-phieutra');
    }
}
