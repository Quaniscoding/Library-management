<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatSach extends Model
{
    protected $table = 'dat_sachs';
    use HasFactory;
    protected $fillable = [
        'sinh_vien_id',
        'cuon_sach_id',
        'ngay_dat',
        'tinh_trang',
        'so_luong'
    ];

    public function sinhvien()
    {
        return $this->belongsTo(SinhVien::class, 'sinh_vien_id');
    }
    public function cuonSach()
    {
        return $this->belongsTo(CuonSach::class, 'cuon_sach_id');
    }
    public function sach()
    {
        return $this->belongsTo(Sach::class, 'cuon_sach_id');
    }
}
