<?php

namespace App\Livewire\Admin\Nganh;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Quản lý ngành - ITCLib')]

class ManageNganh extends Component
{
    public function render()
    {
        return view('livewire.admin.nganh.manage-nganh');
    }
}
