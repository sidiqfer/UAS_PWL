<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    protected $table = 'anggota';

    protected $fillable = [
        'no_anggota', 'nama', 'gender', 'tempat_lahir', 'tanggal_lahir', 'alamat', 'email', 'hp', 'foto'
    ];
}
