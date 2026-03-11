<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class logwa extends Model
{
    use HasFactory;

    protected $table = 'log-wa';
    
    protected $fillable = [
        'nama',
        'tgl_kirim',
        'jam_kirim',
        'pesan',
        'nohp',
    ];
}
