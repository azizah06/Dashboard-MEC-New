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
                <h1>Tambah Jadwal</h1>
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
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="kd_jadwal" placeholder="Kode Jadwal">
                                    <label for="kd_jadwal">Kode Jadwal</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="hari" aria-label="State">
                                        <option selected>Pilih Hari...</option>
                                        <option value="1">Senin</option>
                                        <option value="2">Selasa</option>
                                    </select>
                                    <label for="hari">Hari</label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="paket_kelas" aria-label="State">
                                        <option selected>Pilih Paket Kelas...</option>
                                        <option value="1">SKD Kedinasan Offline</option>
                                        <option value="2">Psikotes Offline</option>
                                    </select>
                                    <label for="paket_kelas">Paket Kelas</label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="mentor" aria-label="State">
                                        <option selected>Pilih Mentor...</option>
                                        <option value="1">Nur Azizah Rosidah</option>
                                        <option value="2">Najma Makassar</option>
                                    </select>
                                    <label for="mentor">Mentor</label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="mentor" aria-label="State">
                                        <option selected>Pilih Ruangan...</option>
                                        <option value="1">Ruangan 1</option>
                                        <option value="2">Ruangan 2</option>
                                    </select>
                                    <label for="mentor">Ruangan</label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="time" class="form-control" id="jam_mulai">
                                    <label for="jam_mulai">Jam Mulai</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="time" class="form-control" id="jam_selesai">
                                    <label for="jam_selesai">Jam Selesai</label>
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
