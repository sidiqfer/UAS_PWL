@extends('layout.main')

@section('title', 'Anggota')

@section('content')
<div class="row">
    <div class="col-md-12 ">
        <div class="card">
            <div class="card-header bg-primary">
                <div class="d-flex justify-content-between">
                    <p class="card-title text-white my-2"><i class="ti-user mr-3"></i>Tabel Anggota</p>
                    <a href="{{ route('anggota.create') }}" class="text-white text-small my-2">Tambah Anggota</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="order-listing" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>No. Anggota</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>No. HP</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $n = 0; @endphp
                                    @foreach ($anggota as $row)
                                    <tr>
                                        <td>{{ ++$n }}</td>
                                        <td>
                                            <a href="{{ route('anggota.show', $row->id) }}">{{ $row->no_anggota }}</a>
                                        </td>
                                        <td>{{ $row->nama }}</td>
                                        <td>{{ $row->gender == "L" ? "Laki-laki" : "Perempuan" }}</td>
                                        <td>{{ $row->hp }}</td>
                                        <td>
                                            <form action="{{ route('anggota.destroy', $row->id) }}" method="POST">
                                                <a class="btn btn-inverse-primary py-1" href="{{ route('anggota.edit', $row->id) }}">Edit</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-inverse-danger py-1" onclick="return confirm('Anda yakin?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
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