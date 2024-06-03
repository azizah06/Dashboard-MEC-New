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
                <h1>Tambah Sarana Prasarana</h1>
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
                            <div class="col-md-2">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="kd_ruangan" placeholder="Your Name">
                                    <label for="kd_ruangan">Kode Ruangan</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="ruangan" placeholder="Your Name">
                                    <label for="ruangan">Ruangan</label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="kapasitas">
                                    <label for="kapasitas">Kapasitas</label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="meja_mentor">
                                    <label for="meja_mentor">Meja Mentor</label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="kursi_mentor">
                                    <label for="kursi_mentor">Kursi Mentor</label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="meja_kursi_siswa">
                                    <label for="meja_kursi_siswa">Meja Kursi Siswa</label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="kipas_angin">
                                    <label for="kipas_angin">Kipas Angin</label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="papan_tulis">
                                    <label for="papan_tulis">Papan Tulis</label>
                                </div>
                            </div>

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
