<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Anggota;
use App\Models\Kategori;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $anggota = Anggota::count();
        $buku = Buku::count();
        $kategori = Kategori::count();
        return view('admin.dashboard', compact('anggota', 'buku', 'kategori'));
    }
}
