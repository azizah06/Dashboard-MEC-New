<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    @vite('resources/sass/app.scss')
</head>

<body>
    @extends('layouts.app')
    @section('content')
        <main id="main" class="main">

            <div class="pagetitle">
                <h1>Detail Transaksi</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item">Tables</li>
                        <li class="breadcrumb-item active">Data</li>
                    </ol>
                </nav>
            </div><!-- End Page Title -->

            <section class="section">
                <div class="card">
                    <div class="card-body p-4">
                        {{-- <h5 class="card-title">Tambah Data Siswa</h5> --}}

                        <!-- Floating Labels Form -->
                        <form class="row g-3">
                            @csrf
                            @method('PUT')
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input name="kd_bayar" type="text" class="form-control @error('kd_bayar') is-invalid @enderror" id="kd_bayar" placeholder="Your Name" value="{{ $transaksi->kd_bayar }}" readonly>
                                    <label for="kd_bayar">Kode Bayar</label>
                                    @error('kd_bayar')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="text" name="nama_siswa" class="form-control @error('nama_siswa') is-invalid @enderror" id="nama_siswa" placeholder="Your Name" value="{{ $transaksi->nama_siswa }}" readonly>
                                    <label for="nama_siswa">Paket Kelas</label>
                                    @error('nama_siswa')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="text" name="paket_kelas" class="form-control @error('paket_kelas') is-invalid @enderror" id="paket_kelas" placeholder="Your Name" value="{{ $transaksi->paket_kelas }}" readonly>
                                    <label for="paket_kelas">Paket Kelas</label>
                                    @error('paket_kelas')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="date" name="tgl_bayar" class="form-control @error('tgl_bayar') is-invalid @enderror" id="tgl_bayar" placeholder="Your Name" value="{{ $transaksi->tgl_bayar }}" readonly>
                                    <label for="tgl_bayar">Tanggal Bayar</label>
                                    @error('tgl_bayar')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <p class="mb-0">Bukti Transaksi</p>
                                <div class="form-floating">
                                    <img src="{{ asset('storage/images/'.$transaksi->bukti_bayar) }}" alt="Bukti Pembayaran" style="max-width: 200px;">
                                </div>
                            </div>

                            <div class="">
                                <a href="{{ url()->previous() }}" class="btn btn-sm btn-secondary">Kembali</a>
                            </div>
                        </form>

                        <!-- End floating Labels Form -->

                    </div>
                </div>
            </section>

        </main><!-- End #main -->
    @endsection

    @vite('resources/js/app.js')
</body>

</html>
