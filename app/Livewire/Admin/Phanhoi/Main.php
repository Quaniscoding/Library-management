<?php

namespace App\Livewire\Admin\Phanhoi;

use App\Models\PhanHoi;
use Flasher\Prime\FlasherInterface;
use Livewire\Component;

class Main extends Component
{
    public $searchName = '', $trang_thai, $id;
    public $deletePhanHoiId;
    public $isModalOpen = false;
    public $isConfirmModalOpen = false;
    public function render()
    {
        $phanhois = PhanHoi::where('noi_dung', 'like', '%' . $this->searchName . '%')->paginate(10);
        return view('livewire.admin.phanhoi.main', compact('phanhois'));
    }
    public function openConfirmModal($id)
    {
        $this->deletePhanHoiId = $id;
        $this->isConfirmModalOpen = true;
    }
    public function closeConfirmModal()
    {
        $this->deletePhanHoiId = null;
        $this->isConfirmModalOpen = false;
    }
    public function delete(FlasherInterface $flasher)
    {
        if ($this->deletePhanHoiId) {
            PhanHoi::findOrFail($this->deletePhanHoiId)->delete();
            $this->closeConfirmModal();
            $flasher->addSuccess('Xoá phản hồi thành công!');
        }
    }
    public function openModal()
    {
        $this->isModalOpen = true;
    }
    public function edit($id)
    {
        $phanhoi = PhanHoi::findOrFail($id);
        $this->id = $phanhoi->id;
        $this->trang_thai = $phanhoi->trang_thai;
        $this->openModal();
    }
    public function closeModal()
    {
        $this->isModalOpen = false;
    }
    public function update(FlasherInterface $flasher)
    {

        $phanhoi = PhanHoi::findOrFail($this->id);
        $phanhoi->update([
            'trang_thai' => $this->trang_thai,
        ]);
        $flasher->addSuccess('Cập nhật trạng thái thành công!');
        $this->closeModal();
    }
}
