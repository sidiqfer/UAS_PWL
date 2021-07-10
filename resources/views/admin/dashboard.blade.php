@extends('layout.main')

@section('title', 'Transaksi')

@section('content')
<div class="row mb-4">
    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
        <h3 class="font-weight-bold">Welcome {{ Auth::user()->name }}</h3>
        <h6 class="font-weight-normal mb-0">Kamu login sebagai <span class="text-primary">admin</span></h6>
    </div>
</div>
<div class="row">
    <!-- <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <p class="card-title mb-4">Transaksi Peminjaman dalam Seminggu Terakhir</p>
                <canvas id="order-chart"></canvas>
            </div>
        </div>
    </div> -->
    <div class="col-md-12 grid-margin transparent">
        <div class="row">
            <div class="col-6 col-md-3 mb-4 stretch-card transparent">
                <div class="card card-tale">
                    <div class="card-body">
                        <p class="mb-4">Total Anggota</p>
                        <p class="fs-30 mb-2">{{ $anggota }}</p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3 mb-4 stretch-card transparent">
                <div class="card card-dark-blue">
                    <div class="card-body">
                        <p class="mb-4">Koleksi Buku</p>
                        <p class="fs-30 mb-2">{{ $buku }}</p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3 mb-4 stretch-card transparent">
                <div class="card card-light-blue">
                    <div class="card-body">
                        <p class="mb-4">Total Kategori</p>
                        <p class="fs-30 mb-2">{{ $kategori }}</p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3 mb-4 stretch-card transparent">
                <div class="card card-light-danger">
                    <div class="card-body">
                        <p class="mb-4">Jumlah User</p>
                        <p class="fs-30 mb-2">xxx</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection