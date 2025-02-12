<?php

namespace App\Livewire\Admin\User;

use Livewire\Attributes\Title;
use Livewire\Component;
ITCLib
#[Title('Quản lý user - ITCLib')]

class ManageUser extends Component
{
    public function render()
    {
        return view('livewire.admin.user.manage-user');
    }
}
