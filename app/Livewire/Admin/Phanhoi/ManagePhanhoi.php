<?php

namespace App\Livewire\Admin\Phanhoi;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Quản lý phản hồi sinh viên - ITCLib')]

class ManagePhanhoi extends Component
{
    public function render()
    {
        return view('livewire.admin.phanhoi.manage-phanhoi');
    }
}
