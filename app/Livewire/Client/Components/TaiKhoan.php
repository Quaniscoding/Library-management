<?php

namespace App\Livewire\Client\Components;

use Flasher\Prime\FlasherInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Illuminate\Support\Str;

class TaiKhoan extends Component
{
    public $ho_ten, $ngay_sinh, $gioi_tinh, $lop, $email, $sdt, $dia_chi, $tai_khoan, $current_password, $new_password, $confirm_password;

    public function mount()
    {
        $sinhVien = Auth::guard('student')->user();
        $this->ho_ten = $sinhVien->ho_ten;
        $this->ngay_sinh = $sinhVien->ngay_sinh;
        $this->gioi_tinh = $sinhVien->gioi_tinh;
        $this->lop = $sinhVien->lop;
        $this->email = $sinhVien->email;
        $this->sdt = $sinhVien->sdt;
        $this->dia_chi = $sinhVien->dia_chi;
        $this->tai_khoan = $sinhVien->tai_khoan;
    }

    public function updateProfile(FlasherInterface $flasher)
    {
        $sinhVien = Auth::guard('student')->user();
        $sinhVien->update([
            'ho_ten' => $this->ho_ten,
            'ngay_sinh' => $this->ngay_sinh,
            'gioi_tinh' => $this->gioi_tinh,
            'lop' => $this->lop,
            'email' => $this->email,
            'sdt' => $this->sdt,
            'dia_chi' => $this->dia_chi,
            'tai_khoan' => $this->tai_khoan,
        ]);

        $flasher->addSuccess('Thông báo', 'Cập nhật thông tin thành công!');
    }

    public function updatePassword(FlasherInterface $flasher)
    {
        // Validate các trường
        $this->validate([
            'current_password' => 'required',
            'new_password'     => 'required|min:6',
            'confirm_password' => 'same:new_password',
        ], [
            'current_password.required' => 'Vui lòng nhập mật khẩu hiện tại.',
            'new_password.required'     => 'Vui lòng nhập mật khẩu mới.',
            'new_password.min'          => 'Mật khẩu mới phải có ít nhất :min ký tự.',
            'confirm_password.same'     => 'Xác nhận mật khẩu không khớp với mật khẩu mới.',
        ]);


        $sinhVien = Auth::guard('student')->user();

        // Kiểm tra mật khẩu hiện tại có khớp không
        if (!Hash::check($this->current_password, $sinhVien->password)) {
            $this->addError('current_password', 'Mật khẩu hiện tại không đúng.');
            return;
        }

        // Cập nhật mật khẩu mới
        $sinhVien->update([
            'password' => Hash::make($this->new_password),
        ]);
        $flasher->addSuccess('Thông báo', 'Đổi mật khẩu thành công!');
        $this->reset(['current_password', 'new_password', 'confirm_password']);
        $this->dispatch('password-updated');
    }
    public function generatePassword()
    {
        $password = Str::random(12) . '!@#' . rand(10, 99);
        $this->new_password = $password;
        $this->confirm_password = $password;
    }
    public function render()
    {
        return view('livewire.client.components.tai-khoan');
    }
}
