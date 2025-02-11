<?php

namespace App\Livewire\Client\Components;

use Flasher\Prime\FlasherInterface;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Phanhoi extends Component
{
    public $noi_dung;
    protected $rules = [
        'noi_dung' => 'required',
    ];
    public function submitProposal(FlasherInterface $flasher)
    {
        $this->validate();
        $sinhVien = Auth::guard('student')->user();
        \App\Models\PhanHoi::create([
            'sinh_vien_id'    => $sinhVien->id,
            'noi_dung'      => $this->noi_dung,
        ]);
        $flasher->addSuccess('Thông báo', 'Phản hồi của bạn đã được gửi thành công!');
        $this->reset(['noi_dung']);
    }
    public function render()
    {
        return view('livewire.client.components.phanhoi');
    }
}
