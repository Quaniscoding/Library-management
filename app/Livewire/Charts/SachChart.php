<?php

namespace App\Livewire\Charts;

use App\Models\CuonSach;
use Livewire\Component;

class SachChart extends Component
{
    public $statuses;
    public $counts;
    public $check = ['con', 'muon', 'bao_tri', 'mat'];
    public function mount()
    {
        // Định nghĩa các trạng thái sách mà bạn muốn thống kê
        $this->statuses = ['Còn', 'Mượn', 'Bảo trì', 'Mất'];
        $this->counts   = [];

        // Đếm số lượng cuốn sách theo từng trạng thái
        foreach ($this->check as $status) {
            $this->counts[] = CuonSach::where('tinh_trang', $status)->count();
        }
    }

    public function render()
    {
        return view('livewire.charts.sach-chart', [
            'statuses' => $this->statuses,
            'counts'   => $this->counts,
        ]);
    }
}