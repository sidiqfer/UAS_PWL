@extends('layout.main')

@section('title', 'Detail Penerbit')

@section('content')
<div class="row">
    <div class="col-md-12 ">
        <div class="card">
            <div class="card-header bg-primary">
                <div class="d-flex justify-content-between">
                    <p class="card-title text-white my-2"><i class="ti-layers mr-3"></i>Detail Penerbit</p>
                    <a href="{{ route('penerbit.index') }}" class="text-white text-small my-2">Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <table class="table border-bottom mb-0">
                            <tbody>
                                <tr>
                                    <td class="font-weight-bold pl-0">Nama Penerbit</td>
                                    <td class="pr-0">{{ $penerbit->nama }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold pl-0">Alamat</td>
                                    <td class="pr-0">{{ $penerbit->alamat }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold pl-0">Email</td>
                                    <td class="pr-0">{{ $penerbit->email }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold pl-0">Situs Web</td>
                                    <td class="pr-0">{{ $penerbit->website }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold pl-0">Nomot Telpon</td>
                                    <td class="pr-0">{{ $penerbit->telp }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold pl-0">Kontak</td>
                                    <td class="pr-0">{{ $penerbit->cp }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold pl-0">Tanggal Insert</td>
                                    <td class="pr-0">{{ $penerbit->created_at }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold pl-0">Tanggal Edit</td>
                                    <td class="pr-0">{{ $penerbit->updated_at }}</td>
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