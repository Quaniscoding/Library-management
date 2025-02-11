<?php

namespace App\Livewire\Table;

use App\Models\Sach;
use Livewire\Component;

class NewBooks extends Component
{
    public function render()
    {
        $books = Sach::latest()->take(5)->get();

        return view('livewire.table.new-books', compact('books'));
    }
}
