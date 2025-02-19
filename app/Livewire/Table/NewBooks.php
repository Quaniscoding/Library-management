<?php

namespace App\Livewire\Table;

use App\Models\Sach;
use Livewire\Component;

class NewBooks extends Component
{
    public $todayCount;
    public function render()
    {
        $books = Sach::latest()->take(5)->get();

        $this->todayCount = Sach::whereDate('created_at', now())->count();
        return view('livewire.table.new-books', compact('books'));
    }
}