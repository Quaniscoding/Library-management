<?php

namespace App\Livewire\Admin\DeXuat;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Quản lý đề xuất sách, tài liệu - ITCLib

class ManageDeXuat extends Component
{
    public function render()
    {
        return view('livewire.admin.de-xuat.manage-de-xuat');
    }
}
