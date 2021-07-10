<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Buku;
use App\Models\Anggota;
use Illuminate\Support\Carbon;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $riwayat = Transaksi::select('peminjaman.*', 'anggota.nama as anggota', 'buku.judul')
            ->join('anggota', 'anggota.id', '=', 'peminjaman.anggota_id')
            ->join('buku', 'buku.id', '=', 'peminjaman.buku_id')
            ->orderBy('status_pengembalian', 'DESC')
            ->orderBy('tgl_pinjam', 'DESC')
            ->get();
        $buku = Buku::pluck('judul', 'id');
        $anggota = Anggota::pluck('nama', 'id');
        return view('admin.transaksi.index', compact('buku', 'anggota', 'riwayat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cek_anggota = Transaksi::where('status_pengembalian', 'N')->where('anggota_id', $request->anggota_id)->count();
        if ($cek_anggota > 0) {
            return redirect()->route('transaksi.index')
                ->with('anggota', 'Anggota ini belum mengembalikan buku!');
        }

        $stok_buku = Buku::find($request->buku_id);
        if (($stok_buku->stok - $request->jml) < 0) {
            return redirect()->route('transaksi.index')
                ->with('stok_salah', 'Stok buku yang tersedia hanya ' . $stok_buku->stok);
        }

        if ($request->tgl_kembali < $request->tgl_pinjam) {
            return redirect()->route('transaksi.index')
                ->with('tanggal', 'Tanggal kembali tidak valid!');
        }

        $request->validate([
            'jml' => 'required|numeric',
            'tgl_pinjam' => 'required',
            'tgl_kembali' => 'required',
            'keterangan' => 'nullable',
            'anggota_id' => 'required',
            'buku_id' => 'required',
        ]);

        Transaksi::create($request->all());
        // Kurangi stok
        $stok = $stok_buku->stok - $request->jml;
        Buku::where('id', $request->buku_id)->update(['stok' => $stok]);

        return redirect()->route('transaksi.index')
            ->with('success', 'Berhasil melakukan transaksi!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaksi = Transaksi::join('anggota', 'anggota.id', '=', 'peminjaman.anggota_id')->join('buku', 'buku.id', '=', 'peminjaman.buku_id')->find($id);
        return view('admin.transaksi.show', compact('transaksi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transaksi = Transaksi::find($id);
        $buku = Buku::find($transaksi->buku_id);

        // Update status pengembalian
        Transaksi::where('id', $id)->update(['status_pengembalian' => 'Y']);
        // Kembalikan stok
        $stok = $transaksi->jml + $buku->stok;
        Buku::where('id', $transaksi->buku_id)->update(['stok' => $stok]);

        // Validasi denda
        if ($transaksi->tgl_kembali <= date('Y-m-d')) {
            $tgl_kembali = new Carbon($transaksi->tgl_kembali);
            $tgl_sekarang = Carbon::now();
            $difference = ($tgl_kembali->diff($tgl_sekarang)->days);
            $denda = $difference * 2000;
            return redirect()->route('transaksi.index')
                ->with('telat', 'Pengembalian terlambat ' . $difference . ' hari, dikenakan denda ' . $denda);
        }

        return redirect()->route('transaksi.index')
            ->with('success', 'Berhasil mengembalikan buku!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
