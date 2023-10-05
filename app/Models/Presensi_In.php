<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Preseni_In extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

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
