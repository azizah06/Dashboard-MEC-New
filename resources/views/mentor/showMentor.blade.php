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
                <h1>Show Data Siswa</h1>
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
                        <form class="row g-3" action="{{ route('mentor.update', $mentor->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" value="{{$mentor->kd_mentor}}" name="kd_mentor" class="form-control" id="kd_mentor" placeholder="Your Name" readonly>
                                    <label for="kd_mentor">Kode Siswa</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" value="{{$mentor->nama}}" name="nama" class="form-control" id="nama" placeholder="Your Name" readonly>
                                    <label for="nama">Nama Lengkap</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" value="{{$mentor->email}}" name="email" class="form-control" id="email" placeholder="Your Name" readonly>
                                    <label for="email">Email</label>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" value="{{$mentor->no_telp}}" name="no_telp" class="form-control" id="no_telp" placeholder="Your Email" readonly>
                                    <label for="no_telp">No Telepon</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" value="{{$mentor->jenis_kelamin}}" name="jenis_kelamin" class="form-control" id="jenis_kelamin" placeholder="Your Email" readonly>
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" value="{{$mentor->pendidikan}}" name="pendidikan" class="form-control" id="pendidikan" placeholder="Your Email" readonly>
                                    <label for="pendidikan">Pendidikan</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <textarea class="form-control" name="alamat" placeholder="Address" id="alamat" style="height: 100px;" readonly>{{$mentor->alamat}}</textarea>
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
