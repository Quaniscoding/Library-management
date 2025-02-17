<?php

namespace App\Livewire\Admin\Sach;

use App\Exports\SachExport;
use App\Models\Khoa;
use App\Models\MonHoc;
use App\Models\Nganh;
use App\Models\NhaXuatBan;
use App\Models\Sach;
use App\Models\TacGia;
use App\Models\TheLoai;
use Flasher\Prime\FlasherInterface;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class Main extends Component
{
    use WithPagination, WithFileUploads;
    public $id, $anh_bia, $ten_sach, $tac_gia_id, $nha_xuat_ban_id, $the_loai_id, $nam_xuat_ban, $so_trang, $isbn, $mon_hoc_id, $nganh_id, $khoa_id, $so_luong;

    public $deleteSachId;
    public $searchName = '';
    public $tinh_trang = '';
    // Các biến filter cho các mối quan hệ
    public $selected_tacgia = '';
    public $selected_nhaxuatban = '';
    public $selected_theloai = '';
    public $selected_monhoc = '';
    public $selected_nganh = '';
    public $selected_khoa = '';

    // Reset trang khi cập nhật filter (để phân trang hoạt động đúng)
    public function updatingSearchName()
    {
        $this->resetPage();
    }
    public function updatingTinhTrang()
    {
        $this->resetPage();
    }
    public function updatingSelectedTacgia()
    {
        $this->resetPage();
    }
    public function updatingSelectedNhaxuatban()
    {
        $this->resetPage();
    }
    public function updatingSelectedTheloai()
    {
        $this->resetPage();
    }
    public function updatingSelectedMonhoc()
    {
        $this->resetPage();
    }
    public function updatingSelectedNganh()
    {
        $this->resetPage();
    }
    public function updatingSelectedKhoa()
    {
        $this->resetPage();
    }
    public $isEditMode = false;
    public $isModalOpen = false;
    public $isConfirmModalOpen = false;
    public $filterType = 'year'; // Mặc định lọc theo năm. Giá trị có thể là 'year', 'month', 'week'
    public $filterValue; // Giá trị cụ thể (năm, tháng, tuần) nếu cần lọc chính xác
    public $chartData = [];
    public function render()
    {
        // Khởi tạo query từ model Sach
        $query = Sach::query();

        // Filter theo tên sách
        if (!empty($this->searchName)) {
            $query->where('ten_sach', 'like', '%' . $this->searchName . '%');
        }

        // Filter theo tình trạng
        if (!empty($this->tinh_trang)) {
            $query->whereHas('cuonSachs', function ($q) {
                $q->where('tinh_trang', $this->tinh_trang);
            });
        }

        // Filter theo tác giả
        if (!empty($this->selected_tacgia)) {
            $query->where('tac_gia_id', $this->selected_tacgia);
        }

        // Filter theo nhà xuất bản
        if (!empty($this->selected_nhaxuatban)) {
            $query->where('nha_xuat_ban_id', $this->selected_nhaxuatban);
        }

        // Filter theo thể loại
        if (!empty($this->selected_theloai)) {
            $query->where('the_loai_id', $this->selected_theloai);
        }

        // Filter theo môn học
        if (!empty($this->selected_monhoc)) {
            $query->where('mon_hoc_id', $this->selected_monhoc);
        }

        // Filter theo ngành
        if (!empty($this->selected_nganh)) {
            $query->where('nganh_id', $this->selected_nganh);
        }

        // Filter theo khoa
        if (!empty($this->selected_khoa)) {
            $query->where('khoa_id', $this->selected_khoa);
        }

        $sachs = $query->paginate(10);

        // Lấy dữ liệu cho các select filter
        $tacgias = TacGia::all();
        $nhaxuatbans = NhaXuatBan::all();
        $theloais   = TheLoai::all();
        $monhocs    = MonHoc::all();
        $nganhs     = Nganh::all();
        $khoas      = Khoa::all();

        return view('livewire.admin.sach.main', compact(
            'sachs',
            'tacgias',
            'nhaxuatbans',
            'theloais',
            'monhocs',
            'nganhs',
            'khoas'
        ));
    }
    public function exportExcel()
    {
        $fileName = 'sach_' . now()->format('Ymd_His') . '.xlsx';
        // Nếu muốn xuất theo khoảng thời gian, bạn có thể truyền $filterType và $filterValue vào export class
        return Excel::download(new SachExport($this->filterType, $this->filterValue), $fileName);
    }
    public function openModal()
    {
        $this->isModalOpen = true;
    }

    public function closeModal()
    {
        $this->resetForm();
        $this->isModalOpen = false;
    }

    public function openConfirmModal($id)
    {
        $this->deleteSachId = $id;
        $this->isConfirmModalOpen = true;
    }
    public function closeConfirmModal()
    {
        $this->deleteSachId = null;
        $this->isConfirmModalOpen = false;
    }
    public function resetForm()
    {
        $this->id = null;
        $this->anh_bia = '';
        $this->ten_sach = '';
        $this->tac_gia_id = '';
        $this->nha_xuat_ban_id = '';
        $this->the_loai_id = '';
        $this->nam_xuat_ban = '';
        $this->so_trang = '';
        $this->isbn = '';
        $this->mon_hoc_id = '';
        $this->nganh_id = '';
        $this->khoa_id = '';
        $this->so_luong = '';
        $this->isEditMode = false;
    }

    public function createSach(FlasherInterface $flasher)
    {
        $this->validate([
            'anh_bia' => 'nullable|image|max:2048',
            'ten_sach' => 'required',
            'tac_gia_id' => 'required',
            'nha_xuat_ban_id' => 'required',
            'the_loai_id' => 'required',
            'nam_xuat_ban' => 'nullable|regex:/^\d{4}$/',
            'so_trang' => 'nullable',
            'so_luong' => 'nullable',
            'isbn' => 'nullable',
            'mon_hoc_id' => 'required',
            'nganh_id' => 'required',
            'khoa_id' => 'required',
        ]);

        // Kiểm tra trùng lặp tên sách
        $exists = Sach::where('ten_sach', $this->ten_sach)->exists();
        if ($exists) {
            $existsAuthor = Sach::where('ten_sach', $this->ten_sach)->where('tac_gia_id', $this->tac_gia_id)->exists();
            if ($existsAuthor) {
                $flasher->addError('Sách đã tồn tại.');
                return;
            } else {
                return;
            }
        }
        $path = $this->anh_bia ? $this->anh_bia->store('books', 'public') : null;
        Sach::create([
            'anh_bia' => $path,
            'ten_sach' => $this->ten_sach,
            'tac_gia_id' => $this->tac_gia_id,
            'nha_xuat_ban_id' => $this->nha_xuat_ban_id,
            'the_loai_id' => $this->the_loai_id,
            'nam_xuat_ban' => $this->nam_xuat_ban,
            'so_luong' => $this->so_luong,
            'so_trang' => $this->so_trang,
            'isbn' => $this->isbn,
            'mon_hoc_id' => $this->mon_hoc_id,
            'nganh_id' => $this->nganh_id,
            'khoa_id' => $this->khoa_id,
        ]);

        $flasher->addSuccess('Tạo nhân viên thành công!');
        $this->closeModal();
        $this->resetForm();
    }

    public function editSach($id)
    {

        $sach = Sach::findOrFail($id);
        $this->id = $sach->id;
        $this->anh_bia = $sach->anh_bia;
        $this->ten_sach = $sach->ten_sach;
        $this->tac_gia_id = $sach->tac_gia_id;
        $this->nha_xuat_ban_id = $sach->nha_xuat_ban_id;
        $this->the_loai_id = $sach->the_loai_id;
        $this->nam_xuat_ban = $sach->nam_xuat_ban;
        $this->so_trang = $sach->so_trang;
        $this->so_luong = $sach->so_luong;
        $this->isbn = $sach->isbn;
        $this->mon_hoc_id = $sach->mon_hoc_id;
        $this->nganh_id = $sach->nganh_id;
        $this->khoa_id = $sach->khoa_id;
        $this->isEditMode = true;
        $this->openModal();
    }

    public function updateSach(FlasherInterface $flasher)
    {
        $this->validate([
            'anh_bia' => 'nullable|image|max:2048',
            'ten_sach' => 'required',
            'tac_gia_id' => 'required',
            'nha_xuat_ban_id' => 'required',
            'the_loai_id' => 'required',
            'so_luong' => 'nullable',
            'nam_xuat_ban' => 'nullable|regex:/^\d{4}$/',
            'so_trang' => 'nullable|integer',
            'isbn' => 'nullable|string',
            'mon_hoc_id' => 'required',
            'nganh_id' => 'required',
            'khoa_id' => 'required',
        ]);

        $sach = Sach::findOrFail($this->id);

        if ($this->anh_bia) {
            if ($sach->anh_bia) {
                Storage::disk('public')->delete($sach->anh_bia);
            }
            $path = $this->anh_bia->store('books', 'public');
        } else {
            $path = $sach->anh_bia;
        }

        $sach->update([
            'anh_bia' => $path,
            'ten_sach' => $this->ten_sach,
            'tac_gia_id' => $this->tac_gia_id,
            'nha_xuat_ban_id' => $this->nha_xuat_ban_id,
            'the_loai_id' => $this->the_loai_id,
            'nam_xuat_ban' => $this->nam_xuat_ban,
            'so_trang' => $this->so_trang,
            'so_luong' => $this->so_luong,
            'isbn' => $this->isbn,
            'mon_hoc_id' => $this->mon_hoc_id,
            'nganh_id' => $this->nganh_id,
            'khoa_id' => $this->khoa_id,
        ]);

        $flasher->addSuccess('Cập nhật sách thành công!');
        $this->closeModal();
        $this->resetForm();
    }

    public function deleteSach(FlasherInterface $flasher)
    {
        if ($this->deleteSachId) {
            Sach::findOrFail($this->deleteSachId)->delete();
            $this->closeConfirmModal();
            $flasher->addSuccess('Xoá sách thành công!');
        }
    }
}
