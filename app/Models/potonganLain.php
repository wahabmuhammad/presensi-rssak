<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class potonganLain extends Model
{
    use HasFactory;
    use HasUuids;
    protected $table = 'potonganlain_t';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'pegawai_fk',
        'periodegaji',
        'bukopin',
        'btcls',
        'lainnya',
        'gajiproporsi',
        'diklat',
        'seragam',
        'kasunit',
        'jumlah',
        'keterangan',
    ];
    protected $casts = [
        'periodegaji' => 'date',
        'bukopin' => 'float',
        'btcls' => 'float',
        'lainnya' => 'float',
        'gajiproporsi' => 'float',
        'diklat' => 'float',
        'seragam' => 'float',
        'kasunit' => 'float',
        'jumlah' => 'float',
    ];

    public function pegawai()
    {
        return $this->belongsTo(pegawai::class, 'pegawai_fk', 'id');
    }
}
