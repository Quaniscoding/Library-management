<?php

namespace App\Livewire\Admin\Rolehaspermission;

use Livewire\Attributes\Title;
use Livewire\Component;
ITCLib
#[Title('Quản lý rolehaspermission - ITCLib')]

class ManageRolehaspermission extends Component
{
    public function render()
    {
        return view('livewire.admin.rolehaspermission.manage-rolehaspermission');
    }
}
