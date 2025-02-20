<?php

namespace App\Livewire\Auth;

use App\Models\SinhVien;
use App\Models\User;
use Flasher\Prime\FlasherInterface;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Title;

#[Title('Đăng ký tài khoản - ITCLib')]

class SinhvienRegister extends Component
{
    public $ho_ten;
    public $email;
    public $password;
    public $terms;
    public $password_confirmation;

    public function register(FlasherInterface $flasher)
    {
        // Validate dữ liệu
        $this->validate([
            'ho_ten'   => 'required|min:6',
            'email'    => 'required|email|unique:sinh_viens,email',
            'password' => [
                'required',
                'min:8',
                'confirmed',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^a-zA-Z0-9]).+$/'
            ],
            'terms'     => 'required'
        ], [
            'ho_ten.required'      => 'Họ và tên là bắt buộc.',
            'ho_ten.min'           => 'Họ và tên phải có ít nhất 6 ký tự.',
            'email.required'       => 'Email là bắt buộc.',
            'email.email'          => 'Vui lòng nhập một địa chỉ email hợp lệ.',
            'email.unique'         => 'Email đã tồn tại trong hệ thống.',
            'password.required'    => 'Mật khẩu là bắt buộc.',
            'password.min'         => 'Mật khẩu phải có ít nhất 8 ký tự.',
            'password.confirmed'   => 'Mật khẩu xác nhận không khớp.',
            'password.regex'       => 'Mật khẩu phải chứa ít nhất 1 chữ thường, 1 chữ hoa, 1 số và 1 ký tự đặc biệt.',
            'terms' => 'Vui lòng chấp nhận điều khoản.'
        ]);

        // Tạo tài khoản sinh viên
        $sinhvien = SinhVien::create([
            'ho_ten'   => $this->ho_ten,
            'email'    => $this->email,
            'password' => Hash::make($this->password),
        ]);
        $user = User::create([
            'name'     => $this->ho_ten,
            'email'    => $this->email,
            'password' => Hash::make($this->password),
        ]);

        if (method_exists($sinhvien, 'assignRole')) {
            $sinhvien->assignRole('student');
        }
        $user->assignRole('student');

        // Đăng nhập sinh viên vừa tạo
        Auth::guard('student')->login($sinhvien);

        // Chuyển hướng sau khi đăng ký thành công
        $flasher->addSuccess('Đăng ký thành công!');
        return redirect()->intended('/');
    }

    public function render()
    {
        return view('livewire.auth.sinhvien-register');
    }
}
