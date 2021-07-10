<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'buku';

    protected $fillable = [
        'isbn', 'judul', 'tahun_cetak', 'stok', 'cover', 'kategori_id', 'pengarang_id', 'penerbit_id'
    ];
}
