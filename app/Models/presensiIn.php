<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class presensiIn extends Model
{
    use HasFactory;
    
    protected $table = 'presensi';
    
    protected $fillable = [
        'name',
        'nip',
        'tgl_presensi',
        'jam_in',
        'foto_in',
        'location_in'
    ];

    
    public $timestamps = false;
}
