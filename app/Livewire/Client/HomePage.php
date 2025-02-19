<?php

namespace App\Livewire\Client;

use App\Models\DatSach;
use App\Models\Khoa;
use App\Models\MonHoc;
use App\Models\Nganh;
use App\Models\NhaXuatBan;
use App\Models\Sach as ModelsSach;
use App\Models\TacGia;
use App\Models\TaiLieuMo;
use App\Models\TheLoai;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Trang chủ - ITCLib')]

class HomePage extends Component
{
    use WithPagination;
    public $search;
    public $sinh_vien_id;
    public function updatedSearch()
    {
        $this->resetPage();
    }
    public function mount()
    {
        $sinhVien = Auth::guard('student')->user();
        $this->sinh_vien_id = $sinhVien ? $sinhVien->id : null;
    }

    public function render()
    {
        $querySach = ModelsSach::query();
        $queryTaiLieu = TaiLieuMo::query();
        if (!empty($this->search)) {
            $querySach->where('ten_sach', 'like', '%' . $this->search . '%');
        }
        if (!empty($this->search)) {
            $queryTaiLieu->where('ten_tai_lieu', 'like', '%' . $this->search . '%');
        }
        $sachs = $querySach->paginate(10);
        $tailieus = $queryTaiLieu->paginate(10);
        $datSach = DatSach::with('cuonSach.sach')
            ->where('sinh_vien_id', $this->sinh_vien_id)
            ->first();
        $recommendedBooks = collect();
        if ($datSach && $datSach->cuonSach && $datSach->cuonSach->sach) {
            $currentBook = $datSach->cuonSach->sach;
            $recommendedBooks = ModelsSach::where('id', '<>', $currentBook->id)
                ->where(function ($query) use ($currentBook) {
                    $query->where('nganh_id', $currentBook->nganh_id);
                })
                ->get();
        }
        return view('livewire.client.home-page', ['sachs' => $sachs, 'tailieus' => $tailieus, 'recommendedBooks'   => $recommendedBooks,]);
    }
    public function showSachDetails($id)
    {
        return redirect()->route('ChiTietSach', ['id' => $id]);
    }
}
