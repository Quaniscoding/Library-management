<?php

namespace App\Livewire\Auth;

use Flasher\Prime\FlasherInterface;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;

#[Title('Đăng nhập - ITCLib')]

class SinhvienLogin extends Component
{
    public $email;
    public $password;

    public function login(FlasherInterface $flasher)
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ], [
            'email.required' => 'Email là bắt buộc.',
            'email.email' => 'Vui lòng nhập một địa chỉ email hợp lệ.',
            'password.required' => 'Mật khẩu là bắt buộc.',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
        ]);

        if (Auth::guard('student')->attempt(['email' => $this->email, 'password' => $this->password])) {
            $flasher->addSuccess('Đăng nhập thành công!');
            // Nếu đăng nhập bằng tài khoản sinh viên, chuyển hướng đến trang chủ (hoặc trang phù hợp)
            return redirect()->intended('/');
        } elseif (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            $flasher->addSuccess('Đăng nhập thành công!');
            // Nếu đăng nhập bằng tài khoản auth (admin), chuyển hướng đến /admin/dashboard
            return redirect()->intended('/admin');
        } else {
            $flasher->addError('Email hoặc mật khẩu không đúng!');
        }
    }

    public function render()
    {
        return view('livewire.auth.sinhvien-login');
    }
}
