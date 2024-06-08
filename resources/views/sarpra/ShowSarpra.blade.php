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
                <h1>Edit Sarana Prasarana</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">Data Sarpra</li>
                    </ol>
                </nav>
            </div><!-- End Page Title -->

            <section class="section">
                <div class="card">
                    <div class="card-body p-4">
                        {{-- <h5 class="card-title">Tambah Data Siswa</h5> --}}

                        <form class="row g-3" action="{{ route('sarpra.update', $sarpra->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="text" name="kd_sarpra"
                                        class="form-control @error('kd_sarpra') is-invalid @enderror" id="kd_sarpra"
                                        placeholder="Your Name" value="{{$sarpra->kd_sarpra}}" readonly>
                                    <label for="kd_sarpra">Kode Sarpra</label>
                                    @error('kd_sarpra')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="text" name="nama_ruangan" class="form-control @error('nama_ruangan') is-invalid @enderror" id="nama_ruangan"
                                        placeholder="Your Name" value="{{$sarpra->nama_ruangan}}" readonly>
                                    <label for="nama">Nama Ruangan</label>
                                    @error('nama_ruangan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="number" name="kapasitas" class="form-control" id="kapasitas"
                                        placeholder="Your Name" value="{{$sarpra->kapasitas}}" readonly>
                                    <label for="kapasitas">Kapasitas</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" name="jmlh_baik" class="form-control" id="jmlh_baik"
                                        placeholder="Your Name" value="{{$sarpra->jmlh_baik}}" readonly>
                                    <label for="jmlh_baik">Jumlah Barang Kondisi Baik</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" name="jmlh_rusak" class="form-control" id="jmlh_rusak"
                                        placeholder="Your Name" value="{{$sarpra->jmlh_rusak}}" readonly>
                                    <label for="jmlh_rusak">Jumlah Barang Kondisi Rusak</label>
                                </div>
                            </div>

                            <h6 class="align-items-center text-center mt-5 py-2 fw-bold text-light rounded-3 bg-secondary">Detail Rincian Barang</h6>

                            <div class="col">
                                <div class="form-floating">
                                    <input type="number" name="meja_mentor" class="form-control" id="meja_mentor"
                                        placeholder="Your Name" value="{{$sarpra->meja_mentor}}" readonly>
                                    <label for="meja_mentor">Jumlah Meja Mentor</label>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-floating">
                                    <input type="number" name="kursi_mentor" class="form-control" id="kursi_mentor"
                                        placeholder="Your Name" value="{{$sarpra->kursi_mentor}}" readonly>
                                    <label for="kursi_mentor">Jumlah Kursi Mentor</label>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-floating">
                                    <input type="number" name="kursi_meja_siswa" class="form-control" id="kursi_meja_siswa"
                                        placeholder="Your Name" value="{{$sarpra->kursi_meja_siswa}}" readonly>
                                    <label for="kursi_meja_siswa">Jumlah Kursi Meja Siswa</label>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-floating">
                                    <input type="number" name="kipas" class="form-control" id="kipas"
                                        placeholder="Your Name" value="{{$sarpra->kipas}}" readonly>
                                    <label for="kipas">Jumlah Kipas</label>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-floating">
                                    <input type="number" name="papan_tulis" class="form-control" id="papan_tulis"
                                        placeholder="Your Name" value="{{$sarpra->papan_tulis}}" readonly>
                                    <label for="papan_tulis">Jumlah Papan Tulis</label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-floating">
                                    <textarea class="form-control" name="keterangan" placeholder="Address" id="keterangan" style="height: 100px;" readonly>{{$sarpra->keterangan}}</textarea>
                                    <label for="keterangan" >Keterangan</label>
                                </div>
                            </div>

                            <div class="">
                                <a href="{{ route('sarpra.index') }}" class="btn btn-sm btn-secondary">Kembali</a>

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
