<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class presensiOut extends Model
{
    use HasFactory;

    protected $table = 'presensi_out';
    
    protected $fillable = [
        'name',
        'nip',
        'tgl_presensi_out',
        'jam_out',
        'foto_out',
        'location_out'
    ];

    
    public $timestamps = false;
}
