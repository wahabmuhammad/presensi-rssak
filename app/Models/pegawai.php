<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use PhpParser\Node\NullableType;

class pegawai extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'pegawai_m';
    
    protected $fillable = [
        'id',
        'nip',
        'nama_lengkap',
        'nama_panggilan',
        'gol_mk',
        'tmt',
        'sk_pt',
        'status_pegawai',
        'jenis_kelamin',
        'formasi',
        'jabatan',
        'penempatan',
        'mulai_kerja',
        'nik',
        'ttl',
        'alamat',
        'lulusan',
        'pendidikan_usia',
        'program_studi',
        'status'
    ];

    
    protected $hidden = [
        'password',
        'remember_token',
    ];

    
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
