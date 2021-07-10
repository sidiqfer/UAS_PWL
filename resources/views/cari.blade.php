@extends('layout.main')

@section('title', 'Hasil Pencarian')

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 mb-4">
                        <h3>Hasil pencairan dari "{{ $search }}"</h3>
                    </div>
                    @forelse ($hasil as $row)
                    <div class="col-12 results">
                        <div class="pt-4 border-bottom">
                            <div class="d-flex">
                                <div class="p-2">
                                    @php $cover = $row->cover ? url("images/cover/$row->cover") : url("images/cover/no.jpg") @endphp
                                    <img src='{{ $cover }}' class="rounded book-detail" />
                                </div>
                                <div class="p-2 flex-grow-1 pt-4">
                                    <a class="d-block h4">{{ $row->judul }}</a>
                                    <a class="page-url text-primary">{{ $row->pengarang }}</a>
                                    <p class="page-description mt-1 mb-1 w-75 text-muted">{{ $row->penerbit }}</p>
                                    <p class="page-description w-75 text-muted">Kategori: {{ $row->kategori }}</p>
                                    <h5 class="page-description mt-4 w-75 text-primary">{{ $row->stok }} Tersedia</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12 results">
                        Tidak ada
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection