<?php

namespace App\Livewire\Admin\Nhanvien;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Quản lý nhân viên - ITCLib')]

class ManageNhanvien extends Component
{
    public function render()
    {
        return view('livewire.admin.nhanvien.manage-nhanvien');
    }
}
