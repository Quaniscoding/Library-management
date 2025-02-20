<?php

namespace App\Livewire\Auth;

use App\Models\SinhVien;
use App\Models\User;
use Flasher\Prime\FlasherInterface;
use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Lấy lại mật khẩu - ITCLib')]

class Forgot extends Component
{
    public $email;
    public function save(FlasherInterface $flasher)
    {
        $this->validate([
            'email' => 'required|email|max:255',
        ], [
            'email.required' => 'Email là bắt buộc.',
            'email.email' => 'Vui lòng nhập một địa chỉ email hợp lệ.',
        ]);
        $userExists = User::where('email', $this->email)->exists();
        $sinhVienExists = SinhVien::where('email', $this->email)->exists();

        if (!$userExists && !$sinhVienExists) {
            $flasher->addError('Email không tồn tại trong hệ thống.');
            return;
        }

        // Xác định broker dựa trên nguồn dữ liệu
        $broker = $userExists ? 'users' : 'students';
        try {
            $status = Password::broker($broker)->sendResetLink(['email' => $this->email]);
            if ($status === Password::RESET_LINK_SENT) {
                session()->flash('success', __('A password reset link has been sent to your email address.'));
                $flasher->addSuccess('Đường link tạo lại mật khẩu đã được gửi tới email của bạn!');
                $this->email = '';
            } else {
                $flasher->addError('Lỗi khi gửi link reset');
            }
        } catch (\Exception $e) {
            $flasher->addError('Lỗi hệ thống');
        }
    }
    public function render()
    {
        return view('livewire.auth.forgot');
    }
}
