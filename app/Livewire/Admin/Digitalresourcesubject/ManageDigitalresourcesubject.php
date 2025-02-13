<?php

namespace App\Livewire\Admin\Digitalresourcesubject;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Quản lý DigitalResourceSubject - ITCLib')]

class ManageDigitalresourcesubject extends Component
{
    public function render()
    {
        return view('livewire.admin.digitalresourcesubject.manage-digitalresourcesubject');
    }
}
