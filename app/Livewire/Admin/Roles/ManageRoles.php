<?php

namespace App\Livewire\Admin\Roles;

use Livewire\Attributes\Title;
use Livewire\Component;
ITCLib
#[Title('Quản lý roles - ITCLib')]

class ManageRoles extends Component
{
    public function render()
    {
        return view('livewire.admin.roles.manage-roles');
    }
}
