@extends('layout.main')

@section('title', 'Transaksi')

@section('content')
<div class="row">

    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary">
                <p class="card-title text-white my-2">Transaksi</p>
            </div>
            <div class="card-body">
                <ul class="nav nav-pills nav-pills-primary" id="pills-tab" role="tablist" style="border: none;">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">
                            <i class="ti-pencil-alt mx-2"></i> Form Peminjaman
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">
                            <i class="ti-files mx-2"></i>Riwayat Transaksi
                        </a>
                    </li>
                </ul>
                <div class="tab-content" style="border:none;padding:25px 0 10px 0;" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div class="row">
                            <div class="col-12">
                                {!! Form::open(array('route' => 'transaksi.store', 'method' => 'POST', 'class' => 'forms-sample')) !!}
                                <div class="form-group row mb-md-3">
                                    <div class="col-8 col-md-6">
                                        <label>Pilih Anggota</label>
                                        {!! Form::select('anggota_id', $anggota, null, array('class' => 'js-example-basic-single w-100', 'width' => '100%')) !!}
                                        @if ($errors->has('anggota_id'))
                                        <p class="error mt-2 text-danger">
                                            {{ $errors->first('anggota_id') }}
                                        </p>
                                        @endif
                                    </div>
                                    <div class="col-4 col-md-6">
                                        <label>Jumlah Buku</label>
                                        {!! Form::text('jml', null, array('class' => 'form-control')) !!}
                                        @if ($errors->has('jml'))
                                        <p class="error mt-2 text-danger">
                                            {{ $errors->first('jml') }}
                                        </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row mb-md-3">
                                    <div class="col">
                                        <label>Pilih Buku</label>
                                        {!! Form::select('buku_id', $buku, null, array('class' => 'js-example-basic-single w-100', 'width' => '100%')) !!}
                                        @if ($errors->has('buku_id'))
                                        <p class="error mt-2 text-danger">
                                            {{ $errors->first('buku_id') }}
                                        </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row mb-md-3">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group row mb-md-3">
                                            <div class="col-12">
                                                <label>Tanggal Pinjam dan Kembali</label>
                                                @php $now = date('Y-m-d') @endphp
                                                {!! Form::date('tgl_pinjam', null, array('class' => 'form-control', 'min' => $now)) !!}
                                                @if ($errors->has('tgl_pinjam'))
                                                <p class="error mt-2 text-danger">
                                                    {{ $errors->first('tgl_pinjam') }}
                                                </p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row mb-md-3">
                                            <div class="col-12">
                                                {!! Form::date('tgl_kembali', null, array('class' => 'form-control', 'min' => $now)) !!}
                                                @if ($errors->has('tgl_kembali'))
                                                <p class="error mt-2 text-danger">
                                                    {{ $errors->first('tgl_kembali') }}
                                                </p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label>Keterangan</label>
                                        {!! Form::textarea('keterangan', null, array('class' => 'form-control', 'rows' => '6')) !!}
                                        @if ($errors->has('keterangan'))
                                        <p class="error mt-2 text-danger">
                                            {{ $errors->first('keterangan') }}
                                        </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-primary mr-2">Submit Transaksi</button>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table id="transaksi" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama</th>
                                                <th>Buku</th>
                                                <th>Tanggal Pinjam</th>
                                                <th>Tanggal Kembali</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $n = 0; @endphp
                                            @foreach ($riwayat as $row)
                                            <tr>
                                                <td>{{ ++$n }}</td>
                                                <td>
                                                    <a href="{{ route('transaksi.show', $row->id) }}">{{ $row->anggota }}</a>
                                                </td>
                                                <td>
                                                    {{ $row->judul }} - {{ $row->jml }} Copies
                                                </td>
                                                <td>{{ $row->tgl_pinjam }}</td>
                                                <td>{{ $row->tgl_kembali }}</td>
                                                <td>
                                                    @if ($row->status_pengembalian == "N")
                                                    <a class="btn btn-inverse-danger py-2" onclick="return confirm('Kembalikan sekarang?')" href="{{ route('transaksi.edit', $row->id) }}">Kembalikan</a>
                                                    @else
                                                    <a class="btn btn-inverse-success py-2" href="#">Done</a>
                                                    @endif
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
    </div>

</div>
@endsection