<?php

namespace App\Livewire\Client\Components;

use App\Models\CuonSach;
use App\Models\DatSach;
use App\Models\Phat;
use App\Models\PhieuMuon;
use App\Models\Sach;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Lịch sử mượn - ITCLib')]

class LichSuMuon extends Component
{
    use WithPagination;

    public $sinh_vien_id;

    public function mount()
    {
        $sinhVien = Auth::guard('student')->user();
        $this->sinh_vien_id = $sinhVien->id;
    }

    public function render()
    {
        // Thực hiện truy vấn với phân trang trực tiếp trong render()
        $datSachs = DatSach::with('cuonSach.sach')
            ->where('sinh_vien_id', $this->sinh_vien_id)
            ->paginate(10);
        $phats = Phat::where('sinh_vien_id', $this->sinh_vien_id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('livewire.client.components.lich-su-muon', compact('datSachs', 'phats'));
    }
}
