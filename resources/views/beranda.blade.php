@extends('layout.main')

@section('title', 'Beranda')

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-people p-0">
                <img src="{{ url("images/read.jpg") }}">
                <div class="weather-info">
                    <h2 class="text-primary mb-3"><strong>Nama perpustakaan</strong></h2>
                    <p class="lead mb-4">Sistem informasi perpustakaan sederhana</p>
                    <a href="{{ url('koleksi') }}" class="btn btn-primary">Lihat semua buku</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row grid-margin">
    <div class="col-12">
        <h4 class="font-weight-bold mb-4">Buku Terbaru</h4>
    </div>
    <div class="col-12">
        <div class="card card-no-border" style="box-shadow:none;">
            <div class="card-body p-0">
                <div class="owl-carousel owl-theme koleksi-buku">
                    @forelse ($buku_baru as $row)
                    <a href="#" class="text-dark">
                        @php $cover = $row->cover ? url("images/cover/$row->cover") : url("images/cover/no.jpg") @endphp
                        <img class="owl-lazy" src='{{ $cover }}' data-src='{{ $cover }}' data-src-retina='{{ $cover }}' alt="image" />
                        <div class="mt-3">
                            <h5 class="font-weight-bold mb-1">{{ $row->judul }}</h5>
                            <small>{{ $row->nama }}</small>
                        </div>
                    </a>
                    @empty
                    Tidak ada
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mb-4">
    <div class="col-12 d-flex justify-content-between">
        <h4 class="font-weight-bold mb-4">Koleksi Buku</h4>
        <a class="text-secondary" href="{{ url('koleksi') }}">
            <h4 class="mb-4"><small>Lihat semua</small></h4>
        </a>
    </div>
    <div class="col-xl-8 col-lg-7 col-md-6 col-sm-8">
        <div class="row portfolio-grid">
            @forelse ($buku as $row)
            @php $cover = $row->cover ? url("images/cover/$row->cover") : url("images/cover/no.jpg") @endphp
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6">
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
    <div class="col-xl-4 col-lg-5 col-md-6 col-sm-4 stretch-card pb-sm-3 mt-sm-0 mt-4">
        <div class="card" style="background-color: rgba(75, 73, 172, 0.2)">
            <div class="card-body">
                <p class="card-title">Pengarang Buku</p>
                <div class="row">
                    <div class="col-12">
                        <p class="mb-0">
                            @forelse ($pengarang as $row)
                            <a href="#">
                                <div class="badge badge-primary badge-pill mb-2">{{ $row->nama }}</div>
                            </a>
                            @empty
                            Tidak ada
                            @endforelse
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection