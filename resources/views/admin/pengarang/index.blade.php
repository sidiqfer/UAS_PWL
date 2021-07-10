@extends('layout.main')

@section('title', 'Pengarang')

@section('content')
<div class="row">
    <div class="col-md-12 ">
        <div class="card">
            <div class="card-header bg-primary">
                <div class="d-flex justify-content-between">
                    <p class="card-title text-white my-2"><i class="ti-marker-alt mr-3"></i>Tabel Pengarang</p>
                    <a href="{{ route('pengarang.create') }}" class="text-white text-small my-2">Tambah Pengarang</a>
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
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>No HP</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $n = 0; @endphp
                                    @foreach ($pengarang as $row)
                                    <tr>
                                        <td>{{ ++$n }}</td>
                                        <td>
                                            <a href="{{ route('pengarang.show', $row->id) }}">{{ $row->nama }}</a>
                                        </td>
                                        <td>{{ $row->email }}</td>
                                        <td>{{ $row->hp }}</td>
                                        <td>
                                            <form action="{{ route('pengarang.destroy', $row->id) }}" method="POST">
                                                <a class="btn btn-inverse-primary py-1" href="{{ route('pengarang.edit', $row->id) }}">Edit</a>
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