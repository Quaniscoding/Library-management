<?php

namespace App\Livewire\Admin\Digitalresourcemajor;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Quản lý DigitalResourceMajor - ITCLib')]


class ManageDigitalresourcemajor extends Component
{
    public function render()
    {
        return view('livewire.admin.digitalresourcemajor.manage-digitalresourcemajor');
    }
}
