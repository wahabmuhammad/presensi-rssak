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
    protected $primaryKey = 'id';

    protected $fillable = [
        'statusenabled',
        'nik',
        'nip',
        'nama_lengkap',
        'nama_panggilan',
        'tempat_lahir',
        'tgl_lahir',
        'gol_mk',
        'awal_masuk',
        'tmt',
        'sk_pt',
        'jenis_kelamin',
        'alamat',
        'alumni',
        'nohp',
        'email',
        'pendidikan_fk',
        'program_studi',
        'status_pegawaifk',
        'tunjangan_fungsional_fk',
        'status_kawinfk',
        'unitkerja',
        'formasi_fk',
        'jabatan_fk',
        'jenispegawai_fk',
    ];

    public $timestamps = false;

    public function obatDanPeriksa()
    {
        return $this->hasMany(obatdanperiksa::class, 'pegawai_fk');
    }
    public function user()
    {
        return $this->hasOne(User::class, 'pegawai_fk');
    }
}
