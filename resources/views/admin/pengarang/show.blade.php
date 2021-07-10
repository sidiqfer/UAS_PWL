@extends('layout.main')

@section('title', 'Detail Pengarang')

@section('content')
<div class="row">
    <div class="col-md-12 ">
        <div class="card">
            <div class="card-header bg-primary">
                <div class="d-flex justify-content-between">
                    <p class="card-title text-white my-2"><i class="ti-marker-alt mr-3"></i>Detail Pengarang</p>
                    <a href="{{ route('pengarang.index') }}" class="text-white text-small my-2">Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 text-center mb-4">
                        @if ($pengarang->foto)
                        <img src='{{ url("images/pengarang/$pengarang->foto") }}' class="pengarang rounded-circle" alt="{{ $pengarang->nama }}">
                        @else
                        <img src='{{ url("images/pengarang/none.png") }}' class="pengarang rounded-circle" alt="{{ $pengarang->nama }}">
                        @endif
                    </div>
                    <div class="col-md-9">
                        <table class="table border-bottom mb-0">
                            <tbody>
                                <tr>
                                    <td class="font-weight-bold pl-0">Nama</td>
                                    <td class="pr-0">{{ $pengarang->nama }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold pl-0">Email</td>
                                    <td class="pr-0">{{ $pengarang->email }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold pl-0">Nomor HP</td>
                                    <td class="pr-0">{{ $pengarang->hp }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold pl-0">Tanggal Insert</td>
                                    <td class="pr-0">{{ $pengarang->created_at }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold pl-0">Tanggal Edit</td>
                                    <td class="pr-0">{{ $pengarang->updated_at }}</td>
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