<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'peminjaman';

    protected $fillable = [
        'jml', 'tgl_pinjam', 'tgl_kembali', 'keterangan', 'anggota_id', 'buku_id'
    ];
}
