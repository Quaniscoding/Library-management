<?php

namespace App\Livewire\Admin\Tacgia;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Quản lý tác giả - ITCLib')]

class ManageTacgia extends Component
{
    public function render()
    {
        return view('livewire.admin.tacgia.manage-tacgia');
    }
}
