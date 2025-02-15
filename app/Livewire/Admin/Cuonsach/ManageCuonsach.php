<?php

namespace App\Livewire\Admin\Cuonsach;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Quản lý sách trong thư viện - ITCLib')]


class ManageCuonsach extends Component
{
    public function render()
    {
        return view('livewire.admin.cuonsach.manage-cuonsach');
    }
}
