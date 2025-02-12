<?php

namespace App\Livewire\Admin\Monhoc;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Quản lý môn học - ITCLib')]

class ManageMonhoc extends Component
{
    public function render()
    {
        return view('livewire.admin.monhoc.manage-monhoc');
    }
}
