@extends('layout.main')

@section('title', 'Buku')

@section('content')
<div class="row">
    <div class="col-md-12 ">
        <div class="card">
            <div class="card-header bg-primary">
                <div class="d-flex justify-content-between">
                    <p class="card-title text-white my-2"><i class="ti-book mr-3"></i>Tabel Buku</p>
                    <a href="{{ route('buku.create') }}" class="text-white text-small my-2">Tambah Buku</a>
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
                                        <th>ISBN</th>
                                        <th>Judul</th>
                                        <th>Stok</th>
                                        <th>Kategori</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $n = 0; @endphp
                                    @foreach ($buku as $row)
                                    <tr>
                                        <td>{{ ++$n }}</td>
                                        <td>
                                            <a href="{{ route('buku.show', $row->id) }}">{{ $row->isbn }}</a>
                                        </td>
                                        <td>{{ $row->judul }}</td>
                                        <td>{{ $row->stok }}</td>
                                        <td>{{ $row->nama }}</td>
                                        <td>
                                            <form action="{{ route('buku.destroy', $row->id) }}" method="POST">
                                                <a class="btn btn-inverse-primary py-1" href="{{ route('buku.edit', $row->id) }}">Edit</a>
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