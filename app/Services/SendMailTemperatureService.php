<?php

namespace App\Services;

use Illuminate\Support\Facades\Mail;

class SendMailTemperatureService
{
    public function SendMail($topic, $email, $timenow, $number)
    {
        if($topic == 'temperature'){
            Mail::send(
            'emails.SendMailTemperature',
            [
                'timenow' => $timenow,
                'number' => $number
            ],
            function ($message) use ($email) {
                $message->to($email)
                    ->subject('Khẩn cấp - Hệ thống nhà thông minh');
            }
        );
        }

        if($topic == 'moisture'){
            Mail::send(
            'emails.SendMailMoisture',
            [
                'timenow' => $timenow,
                'number' => $number
            ],
            function ($message) use ($email) {
                $message->to($email)
                    ->subject('Khẩn cấp - Hệ thống nhà thông minh');
            }
        );
        }
    }
}
