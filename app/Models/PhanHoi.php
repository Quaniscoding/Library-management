<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhanHoi extends Model
{
    use HasFactory;
    protected $fillable = [
        'sinh_vien_id',
        'noi_dung',
        'trang_thai'
    ];
    public function sinhvien()
    {
        return $this->belongsTo(SinhVien::class, 'sinh_vien_id');
    }
}
