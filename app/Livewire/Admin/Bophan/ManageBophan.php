<?php

namespace App\Livewire\Admin\Bophan;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Quản lý bộ phận - ITCLib')]

class ManageBophan extends Component
{
    public function render()
    {
        return view('livewire.admin.bophan.manage-bophan');
    }
}
