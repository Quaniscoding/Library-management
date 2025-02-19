<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class UserCount extends Component
{
    public $userCount;
    public $bgColor;
    public function mount()
    {
        $this->userCount = User::count();
        $this->bgColor = 'bg-yellow-500';
    }
    public function render()
    {
        return view('livewire.user-count');
    }
}