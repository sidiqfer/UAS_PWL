@extends('layout.main')

@section('title', 'Detail Buku')

@section('content')
<div class="row">
    <div class="col-md-12 ">
        <div class="card">
            <div class="card-header bg-primary">
                <div class="d-flex justify-content-between">
                    <p class="card-title text-white my-2"><i class="ti-book mr-3"></i>Detail Buku</p>
                    <a href="{{ route('buku.index') }}" class="text-white text-small my-2">Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 text-center mb-4">
                        <img src='{{ url("images/cover/$buku->cover") }}' class="rounded book-detail" alt="{{ $buku->judul }}">
                    </div>
                    <div class="col-md-9">
                        <table class="table border-bottom mb-0">
                            <tbody>
                                <tr>
                                    <td class="font-weight-bold pl-0">ISBN</td>
                                    <td class="pr-0">{{ $buku->isbn }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold pl-0">Judul buku</td>
                                    <td class="pr-0">{{ $buku->judul }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold pl-0">Tahun Cetak</td>
                                    <td class="pr-0">{{ $buku->tahun_cetak }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold pl-0">Stok</td>
                                    <td class="pr-0">{{ $buku->stok }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold pl-0">Kategori</td>
                                    <td class="pr-0">{{ $buku->kategori }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold pl-0">Pengarang</td>
                                    <td class="pr-0">{{ $buku->pengarang }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold pl-0">Penerbit</td>
                                    <td class="pr-0">{{ $buku->penerbit }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold pl-0">Tanggal Insert</td>
                                    <td class="pr-0">{{ $buku->created_at }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold pl-0">Tanggal Edit</td>
                                    <td class="pr-0">{{ $buku->updated_at }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection