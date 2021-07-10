<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Pengarang;
use App\Models\Penerbit;

class BerandaController extends Controller
{
    public function index()
    {
        $pengarang = Pengarang::orderBy('nama', 'ASC')->limit(20)->get();
        $buku = Buku::join('pengarang', 'pengarang.id', '=', 'buku.pengarang_id')->orderBy('judul', 'ASC')->limit(4)->get();
        $buku_baru = Buku::join('pengarang', 'pengarang.id', '=', 'buku.pengarang_id')->orderBy('buku.created_at', 'DESC')->limit(6)->get();
        return view('beranda', compact('buku', 'buku_baru', 'pengarang'));
    }

    public function informasi()
    {
        return view('informasi');
    }

    public function koleksi_buku()
    {
        $buku = Buku::join('pengarang', 'pengarang.id', '=', 'buku.pengarang_id')->orderBy('judul', 'ASC')->get();
        return view('koleksi', compact('buku'));
    }

    public function cari(Request $request)
    {
        $search =  $request->input('q');
        $hasil = Buku::select('buku.*', 'kategori.nama as kategori', 'penerbit.nama as penerbit', 'pengarang.nama as pengarang')
            ->join('kategori', 'kategori.id', '=', 'buku.kategori_id')
            ->join('pengarang', 'pengarang.id', '=', 'buku.pengarang_id')
            ->join('penerbit', 'penerbit.id', '=', 'buku.penerbit_id')
            ->where('buku.judul', 'like', '%' . $search . '%')
            ->orWhere('pengarang.nama', 'like', '%' . $search . '%')
            ->orWhere('penerbit.nama', 'like', '%' . $search . '%')
            ->orWhere('kategori.nama', 'like', '%' . $search . '%')
            ->get();
        return view('cari', compact('hasil', 'search'));
    }
}
