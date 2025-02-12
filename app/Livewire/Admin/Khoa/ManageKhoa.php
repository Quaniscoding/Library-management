<?php

namespace App\Livewire\Admin\Khoa;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Quản lý khoa - ITCLib')]

class ManageKhoa extends Component
{
    public function render()
    {
        return view('livewire.admin.khoa.manage-khoa');
    }
}
