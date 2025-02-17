<?php

namespace App\Livewire\Charts;

use App\Models\PhieuMuon;
use App\Models\PhieuTra;
use Carbon\Carbon;
use Livewire\Component;

class MuonTraSachChart extends Component
{
    public $months = [];
    public $borrowCounts = [];
    public $returnCounts = [];

    public function mount()
    {
        // Chọn khoảng thời gian 6 tháng gần đây (có thể điều chỉnh lại)
        $start = Carbon::now()->startOfMonth()->subMonths(100);
        // Tạo chuỗi các tháng từ $start đến tháng hiện tại
        $period = new \DatePeriod(
            $start,
            new \DateInterval('P1M'),
            Carbon::now()->addMonth()->startOfMonth()
        );

        foreach ($period as $dt) {
            $monthLabel = $dt->format('Y-m'); // Ví dụ: "2025-01"
            $this->months[] = $monthLabel;

            // Đếm số phiếu mượn trong tháng
            $borrowCount = PhieuMuon::whereYear('ngay_muon', $dt->format('Y'))
                ->whereMonth('ngay_muon', $dt->format('m'))
                ->count();
            $this->borrowCounts[] = $borrowCount;

            // Đếm số phiếu trả trong tháng
            $returnCount = PhieuTra::whereYear('ngay_tra', $dt->format('Y'))
                ->whereMonth('ngay_tra', $dt->format('m'))
                ->count();
            $this->returnCounts[] = $returnCount;
        }
    }
    public function render()
    {
        return view('livewire.charts.muon-tra-sach-chart', [
            'months'       => $this->months,
            'borrowCounts' => $this->borrowCounts,
            'returnCounts' => $this->returnCounts,
        ]);
    }
}