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
                <h1>Edit Paket Kelas</h1>
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
                        <form class="row g-3" action="{{ route('paket_kelas.update', $pkt_kelas->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="col-md-2">
                                <div class="form-floating">
                                    <input type="text" value="{{ old('kd_pkt_kelas', $pkt_kelas->kd_pkt_kelas) }}"
                                        name="kd_pkt_kelas" class="form-control @error('kd_pkt_kelas') is-invalid @enderror"
                                        id="kd_pkt_kelas" placeholder="Your Name" readonly>
                                    <label for="kd_pkt_kelas">Kode Paket Kelas</label>
                                    @error('kd_pkt_kelas')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" value="{{ old('nama_kelas', $pkt_kelas->nama_kelas) }}"
                                        name="nama_kelas" class="form-control @error('nama_kelas') is-invalid @enderror"
                                        id="nama" placeholder="Your Name">
                                    <label for="nama">Nama Paket</label>
                                    @error('nama_kelas')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="number" value="{{ old('harga', $pkt_kelas->harga) }}" name="harga"
                                        class="form-control @error('harga') is-invalid @enderror" id="harga"
                                        placeholder="Your Email">
                                    <label for="harga">Harga</label>
                                    @error('harga')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                            </div>

                            <div class="">
                                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
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
