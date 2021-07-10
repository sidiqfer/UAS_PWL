@extends('layout.main')

@section('title', 'Edit Pengarang')

@section('content')
<div class="row">
    <div class="col-md-12 ">
        <div class="card">
            <div class="card-header bg-primary">
                <div class="d-flex justify-content-between">
                    <p class="card-title text-white my-2"><i class="ti-marker-alt mr-3"></i>Edit Pengarang</p>
                    <a href="{{ route('pengarang.index') }}" class="text-white text-small my-2">Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        {!! Form::model($pengarang, ['method' => 'PATCH', 'enctype' => 'multipart/form-data','route' => ['pengarang.update', $pengarang->id]]) !!}
                        <div class="form-group row mb-3">
                            <label class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-9">
                                {!! Form::text('nama', null, array('class' => 'form-control', 'placeholder' => 'Nama')) !!}
                                @if ($errors->has('nama'))
                                <p class="error mt-2 text-danger">
                                    {{ $errors->first('nama') }}
                                </p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                {!! Form::text('email', null, array('class' => 'form-control', 'placeholder' => 'Email pengarang')) !!}
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
                                {!! Form::number('hp', null, array('class' => 'form-control', 'placeholder' => 'Nomor HP pengarang')) !!}
                                @if ($errors->has('hp'))
                                <p class="error mt-2 text-danger">
                                    {{ $errors->first('hp') }}
                                </p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label class="col-sm-3 col-form-label mb-4 mb-sm-0">Foto</label>
                            <div class="col-sm-9 mb-4 mb-sm-0">
                                {!! Form::file('foto', null, array('class' => 'form-control')) !!}
                                @if ($errors->has('foto'))
                                <p class="error mt-2 text-danger">
                                    {{ $errors->first('foto') }}
                                </p>
                                @endif
                            </div>
                            @if ($pengarang->foto)
                            <div class="col-sm-9 offset-sm-3 mb-4">
                                <img src='{{ url("images/pengarang/$pengarang->foto") }}' class="pengarang rounded">
                            </div>
                            @endif
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