@extends('layout.main')

@section('title', 'Edit Kategori')

@section('content')
<div class="row">
    <div class="col-md-12 ">
        <div class="card">
            <div class="card-header bg-primary">
                <div class="d-flex justify-content-between">
                    <p class="card-title text-white my-2"><i class="ti-layers mr-3"></i>Edit Kategori</p>
                    <a href="{{ route('kategori.index') }}" class="text-white text-small my-2">Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        {!! Form::model($kategori, ['method' => 'PATCH','route' => ['kategori.update', $kategori->id]]) !!}
                        <div class="form-group row mb-3">
                            <label class="col-sm-3 col-form-label">Kategori</label>
                            <div class="col-sm-9">
                                {!! Form::text('nama', null, array('class' => 'form-control', 'placeholder' => 'Kategori buku')) !!}
                                @if ($errors->has('nama'))
                                <p class="error mt-2 text-danger">
                                    {{ $errors->first('nama') }}
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