@extends('layout.main')

@section('title', 'Detail Kategori')

@section('content')
<div class="row">
    <div class="col-md-12 ">
        <div class="card">
            <div class="card-header bg-primary">
                <div class="d-flex justify-content-between">
                    <p class="card-title text-white my-2"><i class="ti-layers mr-3"></i>Detail Kategori</p>
                    <a href="{{ route('kategori.index') }}" class="text-white text-small my-2">Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <table class="table border-bottom mb-0">
                            <tbody>
                                <tr>
                                    <td class="font-weight-bold pl-0">Nama Kategori</td>
                                    <td class="pr-0">{{ $kategori->nama }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold pl-0">Tanggal Insert</td>
                                    <td class="pr-0">{{ $kategori->created_at }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold pl-0">Tanggal Edit</td>
                                    <td class="pr-0">{{ $kategori->updated_at }}</td>
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