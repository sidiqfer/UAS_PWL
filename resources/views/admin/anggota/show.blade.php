@extends('layout.main')

@section('title', 'Detail Anggota')

@section('content')
<div class="row">
    <div class="col-md-12 ">
        <div class="card">
            <div class="card-header bg-primary">
                <div class="d-flex justify-content-between">
                    <p class="card-title text-white my-2"><i class="ti-user mr-3"></i>Detail Anggota</p>
                    <a href="{{ route('anggota.index') }}" class="text-white text-small my-2">Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 text-center mb-4">
                        @if ($anggota->foto)
                        <img src='{{ url("images/anggota/$anggota->foto") }}' class="pengarang rounded-circle" alt="{{ $anggota->nama }}">
                        @else
                        <img src='{{ url("images/anggota/none.png") }}' class="pengarang rounded-circle" alt="{{ $anggota->nama }}">
                        @endif
                    </div>
                    <div class="col-md-9">
                        <table class="table border-bottom mb-0">
                            <tbody>
                                <tr>
                                    <td class="font-weight-bold pl-0">No Anggota</td>
                                    <td class="pr-0">{{ $anggota->no_anggota }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold pl-0">Nama</td>
                                    <td class="pr-0">{{ $anggota->nama }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold pl-0">Jenis Kelamin</td>
                                    <td class="pr-0">{{ $anggota->gender == "L" ? "Laki-laki" : "Perempuan" }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold pl-0">Tempat dan Tanggal Lahir</td>
                                    <td class="pr-0">{{ $anggota->tempat_lahir . ', ' . $anggota->tanggal_lahir }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold pl-0">Alamat</td>
                                    <td class="pr-0">{{ $anggota->alamat }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold pl-0">Email</td>
                                    <td class="pr-0">{{ $anggota->email }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold pl-0">Nomor HP</td>
                                    <td class="pr-0">{{ $anggota->hp }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold pl-0">Tanggal Insert</td>
                                    <td class="pr-0">{{ $anggota->created_at }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold pl-0">Tanggal Edit</td>
                                    <td class="pr-0">{{ $anggota->updated_at }}</td>
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