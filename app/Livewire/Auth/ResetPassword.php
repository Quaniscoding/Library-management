<?php

namespace App\Livewire\Auth;

use App\Models\SinhVien;
use App\Models\User;
use Flasher\Prime\FlasherInterface;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\Attributes\Url;
use Illuminate\Support\Str;

#[Title('Tạo lại mật khẩu - ITCLib')]

class ResetPassword extends Component
{
    public $token;
    #[Url]
    public $email;
    public $password;
    public $password_confirmation;
    public function mount($token)
    {
        $this->token = $token;
    }
    public function save(FlasherInterface $flasher)
    {
        $this->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
        ], [
            'email.required' => 'Email là bắt buộc.',
            'email.email' => 'Vui lòng nhập một địa chỉ email hợp lệ.',
            'password.required' => 'Mật khẩu là bắt buộc.',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
            'password.confirm' => "Mật khẩu phải khớp"
        ]);
        $user = User::where('email', $this->email)->first();
        $sinhVien = SinhVien::where('email', $this->email)->first();

        if (!$user && !$sinhVien) {
            $flasher->addError('Email không tồn tại');
            return;
        }
        $sinhVien->update([
            'password' => Hash::make($this->password),
        ]);
        $user->update([
            'password' => Hash::make($this->password),
        ]);

        $flasher->addSuccess('Mật khẩu của bạn đã được tạo lại thành công!');
        return redirect('/login');
    }
    public function render()
    {
        return view('livewire.auth.reset-password');
    }
}
