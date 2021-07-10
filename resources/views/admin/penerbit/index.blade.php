@extends('layout.main')

@section('title', 'Penerbit')

@section('content')
<div class="row">
    <div class="col-md-12 ">
        <div class="card">
            <div class="card-header bg-primary">
                <div class="d-flex justify-content-between">
                    <p class="card-title text-white my-2"><i class="ti-printer mr-3"></i>Tabel Penerbit</p>
                    <a href="{{ route('penerbit.create') }}" class="text-white text-small my-2">Tambah Penerbit</a>
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
                                        <th>Alamat</th>
                                        <th>Email</th>
                                        <th>Website</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $n = 0; @endphp
                                    @foreach ($penerbit as $row)
                                    <tr>
                                        <td>{{ ++$n }}</td>
                                        <td>
                                            <a href="{{ route('penerbit.show', $row->id) }}" class="text-dark" title="Tampilkan detail">
                                                {{ $row->nama }}
                                            </a>
                                        </td>
                                        <td>{{ $row->alamat }}</td>
                                        <td>{{ $row->email }}</td>
                                        <td>
                                            <a href="{{ $row->website }}" target="_blank">{{ $row->website }}</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('penerbit.destroy', $row->id) }}" method="POST">
                                                <a class="btn btn-inverse-primary py-1" href="{{ route('penerbit.edit', $row->id) }}">Edit</a>
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