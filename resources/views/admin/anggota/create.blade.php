@extends('layout.main')

@section('title', 'Tambah Anggota')

@section('content')
<div class="row">
    <div class="col-md-12 ">
        <div class="card">
            <div class="card-header bg-primary">
                <div class="d-flex justify-content-between">
                    <p class="card-title text-white my-2"><i class="ti-user mr-3"></i>Tambah Anggota</p>
                    <a href="{{ route('anggota.index') }}" class="text-white text-small my-2">Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        {!! Form::open(array('route' => 'anggota.store', 'method' => 'POST', 'class' => 'forms-sample', 'enctype' => 'multipart/form-data')) !!}
                        <div class="form-group row mb-3">
                            <label class="col-sm-3 col-form-label">Nomor Anggota</label>
                            <div class="col-sm-9">
                                {!! Form::text('no_anggota', $no_urut, array('class' => 'form-control', 'readonly')) !!}
                                @if ($errors->has('no_anggota'))
                                <p class="error mt-2 text-danger">
                                    {{ $errors->first('no_anggota') }}
                                </p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-9">
                                {!! Form::text('nama', null, array('class' => 'form-control', 'placeholder' => 'Nama anggota')) !!}
                                @if ($errors->has('nama'))
                                <p class="error mt-2 text-danger">
                                    {{ $errors->first('nama') }}
                                </p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-9">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        {!! Form::radio('gender', 'L', false, array('class' => 'form-check-input')) !!}
                                        Laki-laki
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        {!! Form::radio('gender', 'P', false, array('class' => 'form-check-input')) !!}
                                        Perempuan
                                    </label>
                                </div>
                                @if ($errors->has('gender'))
                                <p class="error mt-2 text-danger">
                                    {{ $errors->first('gender') }}
                                </p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label class="col-sm-3 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-9">
                                {!! Form::date('tanggal_lahir', null, array('class' => 'form-control', '' => '')) !!}
                                @if ($errors->has('tanggal_lahir'))
                                <p class="error mt-2 text-danger">
                                    {{ $errors->first('tanggal_lahir') }}
                                </p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label class="col-sm-3 col-form-label">Tempat Lahir</label>
                            <div class="col-sm-9">
                                {!! Form::text('tempat_lahir', null, array('class' => 'form-control', 'placeholder' => 'Tempat Lahir')) !!}
                                @if ($errors->has('tempat_lahir'))
                                <p class="error mt-2 text-danger">
                                    {{ $errors->first('tempat_lahir') }}
                                </p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label class="col-sm-3 col-form-label">Alamat</label>
                            <div class="col-sm-9">
                                {!! Form::textarea('alamat', null, array('class' => 'form-control', 'rows' => '3')) !!}
                                @if ($errors->has('alamat'))
                                <p class="error mt-2 text-danger">
                                    {{ $errors->first('alamat') }}
                                </p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                {!! Form::text('email', null, array('class' => 'form-control', 'placeholder' => 'Email')) !!}
                                @if ($errors->has('email'))
                                <p class="error mt-2 text-danger">
                                    {{ $errors->first('email') }}
                                </p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label class="col-sm-3 col-form-label">Nomor HP</label>
                            <div class="col-sm-9">
                                {!! Form::number('hp', null, array('class' => 'form-control', 'placeholder' => 'Nomor HP anggota')) !!}
                                @if ($errors->has('hp'))
                                <p class="error mt-2 text-danger">
                                    {{ $errors->first('hp') }}
                                </p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label class="col-sm-3 col-form-label">Foto</label>
                            <div class="col-sm-9">
                                {!! Form::file('foto', null, array('class' => 'form-control')) !!}
                                @if ($errors->has('foto'))
                                <p class="error mt-2 text-danger">
                                    {{ $errors->first('foto') }}
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