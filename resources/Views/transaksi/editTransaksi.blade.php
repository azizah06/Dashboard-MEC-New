<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $pageTitle }}</title>
    @vite('resources/sass/app.scss')
</head>

<body>
    @extends('layouts.app')
    @section('content')
        <main id="main" class="main">

            <div class="pagetitle">
                <h1>Edit Transaksi</h1>
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
                        <form class="row g-3" action="{{ route('transaksi.update',['transaksi'=>$transaksi->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="text" value="{{ $transaksi->kode_bayar }}" class="form-control" id="kd_bayar" placeholder="Your Name">
                                    <label for="kd_bayar">Kode Bayar</label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <input type="text" value="{{ $transaksi->siswass_id }}" class="form-control" id="kd_bayar" placeholder="Your Name">
                                    <label for="siswa">Siswa</label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="paket_kelas" aria-label="State">
                                        <option selected>Pilih Paket Kelas...</option>
                                        {{-- @foreach ($transaksi as $kelass )
                                        <option value="{{ $kelass->sisw}}" {{ old('kelas')==$kelass->nama_paket? 'selected': '' }}>
                                            {{ $kelass->nama_paket }}</option>
                                    @endforeach --}}

                                    </select>
                                    <label for="paket_kelas">Paket Kelas</label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="date" value="{{$transaksi->tanggal_bayar}}" class="form-control" id="tgl_bayar" placeholder="Your Name">
                                    <label for="tgl_bayar">Tanggal Bayar</label>
                                </div>
                            </div>

                            {{-- <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="file" class="form-control" id="bukti_bayar" placeholder="Your Name">
                                    <label for="bukti_bayar">Bukti Pembayaran</label>
                                </div>
                            </div> --}}

                            <div class="">
                                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                                <a class="btn btn-sm btn-secondary">Kembali</a>
                            </div>
                        </form><!-- End floating Labels Form -->

                    </div>
                </div>
            </section>

        </main><!-- End #main -->
    @endsection

    @vite('resources/js/app.js')
</body>

</html>
