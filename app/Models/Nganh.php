<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nganh extends Model
{
    use HasFactory;
    protected $fillable = [
        'ten_nganh',
        'khoa_id',
    ];
    public function khoa()
    {
        return $this->belongsTo(Khoa::class);
    }

    public function digitalresource()
    {
        return $this->hasMany(DigitalResourceMajor::class, 'nganh_id');
    }
}
