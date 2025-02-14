<?php

namespace App\Livewire\Client;

use App\Models\Khoa;
use App\Models\MonHoc;
use App\Models\Nganh;
use App\Models\NhaXuatBan;
use App\Models\Sach;
use App\Models\TacGia;
use App\Models\TaiLieuMo;
use App\Models\TheLoai;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Trang chủ - ITCLib')]

class HomePage extends Component
{
    use WithPagination;
    public $search;

    public function render()
    {
        $querySach = Sach::query();
        $queryTaiLieu = TaiLieuMo::query();
        if (!empty($this->search)) {
            $querySach->where('ten_sach', 'like', '%' . $this->search . '%');
        }
        if (!empty($this->search)) {
            $queryTaiLieu->where('ten_tai_lieu', 'like', '%' . $this->search . '%');
        }
        $sachs = $querySach->paginate(10);
        $tailieus = $queryTaiLieu->paginate(10);
        return view('livewire.client.home-page', ['sachs' => $sachs, 'tailieus' => $tailieus]);
    }
    public function showSachDetails($id)
    {
        return redirect()->route('ChiTietSach', ['id' => $id]);
    }
}
