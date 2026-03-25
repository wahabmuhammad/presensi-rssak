<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kopkarpegawai extends Model
{
    use HasFactory;
    use HasUuids;

    protected $table = 'kopkarpegawai_t';

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'pegawai_fk',
        'periodegaji',
        'simpananpokok',
        'simpananwajib',
        'simpanansukarela',
        'simpananidulfitri',
        'simpananiduladha',
        'angsuranke',
        'angsuranpokok',
        'angsuranjasa',
        'jumlahangsuran',
        'totalsimpanpinjam',
        'vouchertoko',
        'bontoko',
        'jumlahtoko',
        'angsurankreditke',
        'angsurankreditpokok',
        'angsurankreditjasa',
        'jumlahangsurankredit',
        'totalsemua',
    ];

    protected $casts = [
        'periodegaji' => 'date',
        'tanggaltransaksi' => 'date',
        'simpananpokok' => 'float',
        'simpananwajib' => 'float',
        'simpanansukarela' => 'float',
        'simpananidulfitri' => 'float',
        'simpananiduladha' => 'float',
        'angsuranke' => 'integer',
        'angsuranpokok' => 'float',
        'angsuranjasa' => 'float',
        'jumlahangsuran' => 'float',
        'totalsimpanpinjam' => 'float',
        'vouchertoko' => 'float',
        'bontoko' => 'float',
        'jumlahtoko' => 'float',
        'angsurankreditke' => 'integer',
        'angsurankreditpokok' => 'float',
        'angsurankreditjasa' => 'float',
        'jumlahangsurankredit' => 'float',
        'totalsemua' => 'float',
    ];
}
