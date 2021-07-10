@extends('layout.main')

@section('title', 'Koleksi')

@section('content')

<div class="row mb-4">
    <div class="col-xl-12">
        <div class="row portfolio-grid">
            @forelse ($buku as $row)
            @php $cover = $row->cover ? url("images/cover/$row->cover") : url("images/cover/no.jpg") @endphp
            <div class="col-6 col-md-3 col-xl-2">
                <figure class="effect-text-in">
                    <img src="{{ $cover }}" alt="{{ $row->judul }}" />
                    <figcaption>
                        <p>{{ $row->judul }}</p>
                    </figcaption>
                </figure>
            </div>
            @empty
            Tidak ada
            @endforelse
        </div>
    </div>
</div>
@endsection