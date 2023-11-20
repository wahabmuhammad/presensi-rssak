<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recruitment extends Model
{
    use HasFactory;

    protected $table = 'recruitments';
    
    protected $fillable = [
        'NIK',
        'Nama',
        'TTL',
        'Alamat',
        'Formasi',
        'Pendidikan',
        'Universitas/Sekolah',
        'nohp',
        'Rekomendasi',
        'Sertifikat',
    ];
}
