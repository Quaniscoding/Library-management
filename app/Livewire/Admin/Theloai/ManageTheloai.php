<?php

namespace App\Livewire\Admin\Theloai;

use Livewire\Attributes\Title;
use Livewire\Component;
ITCLib
#[Title('Quản lý thể loại - ITCLib')]

class ManageTheloai extends Component
{
    public function render()
    {
        return view('livewire.admin.theloai.manage-theloai');
    }
}
