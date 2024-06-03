<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard MEC</title>
    @vite('resources/sass/app.scss')
</head>

<body>
    @extends('layouts.app')
    @section('content')
        <main id="main" class="main">

            <div class="pagetitle">
                <h1>Tambah Data Mentor</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Data Mentor</li>
                    </ol>
                </nav>
            </div><!-- End Page Title -->

            <section class="section">
                <div class="card">
                    <div class="card-body p-4">
                        {{-- <h5 class="card-title">Tambah Data Siswa</h5> --}}

                        <!-- Floating Labels Form -->
                        <form class="row g-3" action="{{ route('mentor.store') }}" method="POST">
                            @csrf
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" name="kd_mentor" class="form-control" id="kd_mentor" placeholder="Your Name">
                                    <label for="kd_mentor">Kode Mentor</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" name="nama" class="form-control" id="nama" placeholder="Your Name">
                                    <label for="nama">Nama Lengkap</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" name="email" class="form-control" id="email" placeholder="Your Name">
                                    <label for="email">Email</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" name="no_telp" class="form-control" id="no_telp" placeholder="Your Email">
                                    <label for="no_telp">No Telp</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <select name="jenis_kelamin" class="form-select" id="floatingSelect" aria-label="State">
                                        <option selected>Pilih...</option>
                                        <option value="Laki - laki">Laki laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                    <label for="floatingSelect">Jenis Kelamin</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" name="pendidikan" class="form-control" id="pendidikan" placeholder="Your Email">
                                    <label for="pendidikan">Pendidikan</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <textarea class="form-control" name="alamat" placeholder="Address" id="alamat" style="height: 100px;"></textarea>
                                    <label for="alamat">Alamat</label>
                                </div>
                            </div>

                            <div class="">
                                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                                <a href="{{ url()->previous() }}" class="btn btn-sm btn-secondary">Kembali</a>
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
