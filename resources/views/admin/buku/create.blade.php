@extends('layout.main')

@section('title', 'Tambah Buku')

@section('content')
<div class="row">
    <div class="col-md-12 ">
        <div class="card">
            <div class="card-header bg-primary">
                <div class="d-flex justify-content-between">
                    <p class="card-title text-white my-2"><i class="ti-book mr-3"></i>Tambah Buku</p>
                    <a href="{{ route('buku.index') }}" class="text-white text-small my-2">Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        {!! Form::open(array('route' => 'buku.store', 'method' => 'POST', 'class' => 'forms-sample', 'enctype' => 'multipart/form-data')) !!}
                        <div class="form-group row mb-3">
                            <label class="col-sm-3 col-form-label">ISBN</label>
                            <div class="col-sm-9">
                                {!! Form::text('isbn', null, array('class' => 'form-control', 'placeholder' => 'International Standard Book Number')) !!}
                                @if ($errors->has('isbn'))
                                <p class="error mt-2 text-danger">
                                    {{ $errors->first('isbn') }}
                                </p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label class="col-sm-3 col-form-label">judul</label>
                            <div class="col-sm-9">
                                {!! Form::text('judul', null, array('class' => 'form-control', 'placeholder' => 'Judul buku')) !!}
                                @if ($errors->has('judul'))
                                <p class="error mt-2 text-danger">
                                    {{ $errors->first('judul') }}
                                </p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label class="col-sm-3 col-form-label">Tahun Cetak</label>
                            <div class="col-sm-9">
                                {!! Form::number('tahun_cetak', null, array('class' => 'form-control', 'placeholder' => 'Tahun cetak')) !!}
                                @if ($errors->has('tahun_cetak'))
                                <p class="error mt-2 text-danger">
                                    {{ $errors->first('tahun_cetak') }}
                                </p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label class="col-sm-3 col-form-label">Stok</label>
                            <div class="col-sm-9">
                                {!! Form::number('stok', null, array('class' => 'form-control', 'placeholder' => 'Stok buku')) !!}
                                @if ($errors->has('stok'))
                                <p class="error mt-2 text-danger">
                                    {{ $errors->first('stok') }}
                                </p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label class="col-sm-3 col-form-label">Cover Buku</label>
                            <div class="col-sm-9">
                                {!! Form::file('cover', null, array('class' => 'form-control')) !!}
                                @if ($errors->has('cover'))
                                <p class="error mt-2 text-danger">
                                    {{ $errors->first('cover') }}
                                </p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label class="col-sm-3 col-form-label">Kategori</label>
                            <div class="col-sm-9">
                                {!! Form::select('kategori_id', $kategori, null, array('class' => 'form-control')) !!}
                                @if ($errors->has('kategori_id'))
                                <p class="error mt-2 text-danger">
                                    {{ $errors->first('kategori_id') }}
                                </p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label class="col-sm-3 col-form-label">Pengarang</label>
                            <div class="col-sm-9">
                                {!! Form::select('pengarang_id', $pengarang, null, array('class' => 'form-control')) !!}
                                @if ($errors->has('pengarang_id'))
                                <p class="error mt-2 text-danger">
                                    {{ $errors->first('pengarang_id') }}
                                </p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label class="col-sm-3 col-form-label">Penerbit</label>
                            <div class="col-sm-9">
                                {!! Form::select('penerbit_id', $penerbit, null, array('class' => 'form-control')) !!}
                                @if ($errors->has('penerbit_id'))
                                <p class="error mt-2 text-danger">
                                    {{ $errors->first('penerbit_id') }}
                                </p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <div class="col-sm-9 offset-sm-3">
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection