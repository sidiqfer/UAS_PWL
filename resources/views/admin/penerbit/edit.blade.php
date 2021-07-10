@extends('layout.main')

@section('title', 'Edit Penerbit')

@section('content')
<div class="row">
    <div class="col-md-12 ">
        <div class="card">
            <div class="card-header bg-primary">
                <div class="d-flex justify-content-between">
                    <p class="card-title text-white my-2"><i class="ti-printer mr-3"></i>Edit Penerbit</p>
                    <a href="{{ route('penerbit.index') }}" class="text-white text-small my-2">Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        {!! Form::model($penerbit, ['method' => 'PATCH','route' => ['penerbit.update', $penerbit->id]]) !!}
                        <div class="form-group row mb-3">
                            <label class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-9">
                                {!! Form::text('nama', null, array('class' => 'form-control')) !!}
                                @if ($errors->has('nama'))
                                <p class="error mt-2 text-danger">
                                    {{ $errors->first('nama') }}
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
                                {!! Form::text('email', null, array('class' => 'form-control')) !!}
                                @if ($errors->has('email'))
                                <p class="error mt-2 text-danger">
                                    {{ $errors->first('email') }}
                                </p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label class="col-sm-3 col-form-label">Website</label>
                            <div class="col-sm-9">
                                {!! Form::text('website', null, array('class' => 'form-control')) !!}
                                @if ($errors->has('website'))
                                <p class="error mt-2 text-danger">
                                    {{ $errors->first('website') }}
                                </p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label class="col-sm-3 col-form-label">Telpon</label>
                            <div class="col-sm-9">
                                {!! Form::text('telp', null, array('class' => 'form-control')) !!}
                                @if ($errors->has('telp'))
                                <p class="error mt-2 text-danger">
                                    {{ $errors->first('telp') }}
                                </p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label class="col-sm-3 col-form-label">Kontak</label>
                            <div class="col-sm-9">
                                {!! Form::text('cp', null, array('class' => 'form-control')) !!}
                                @if ($errors->has('cp'))
                                <p class="error mt-2 text-danger">
                                    {{ $errors->first('cp') }}
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