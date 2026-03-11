<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class obatdanperiksa extends Model
{
    use HasFactory;
    use HasUuids;

    protected $table = 'obatdanperiksa_t';

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'pegawai_fk',
        'periodegaji',
        'tanggaltransaksi',
        'debit',
        'keterangan',
    ];

    protected $casts = [
        'periodegaji' => 'date',
        'tanggaltransaksi' => 'date',
        'debit' => 'float',
    ];

    public function pegawai()
    {
        return $this->belongsTo(pegawai::class, 'pegawai_fk', 'id');
    }
}
