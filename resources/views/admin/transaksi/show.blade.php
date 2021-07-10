@extends('layout.main')

@section('title', 'Detail Transaksi')

@section('content')
<div class="row">
    <div class="col-md-12 ">
        <div class="card">
            <div class="card-header bg-primary">
                <div class="d-flex justify-content-between">
                    <p class="card-title text-white my-2"></i>Detail transaksi</p>
                    <a href="{{ route('transaksi.index') }}" class="text-white text-small my-2">Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table border-bottom mb-0">
                                <tbody>
                                    <tr>
                                        <td class="font-weight-bold pl-0">Nama Anggota</td>
                                        <td class="pr-0">{{ $transaksi->nama }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold pl-0">Buku</td>
                                        <td class="pr-0">{{ $transaksi->judul }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold pl-0">Jumlah dipinjam</td>
                                        <td class="pr-0">{{ $transaksi->jml }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold pl-0">Status Pengembalian</td>
                                        <td class="pr-0">{{ $transaksi->status_pengembalian == 'Y' ? 'Sudah dikembalikan' : 'Belum dikembalikan' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold pl-0">Tanggal Pinjam</td>
                                        <td class="pr-0">{{ $transaksi->tgl_pinjam }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold pl-0">Tanggal Kembali</td>
                                        <td class="pr-0">{{ $transaksi->tgl_kembali }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold pl-0">Tanggal Pengembalian</td>
                                        <td class="pr-0">{{ $transaksi->updated_at }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold pl-0">Tanggal Insert Data</td>
                                        <td class="pr-0">{{ $transaksi->created_at }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection