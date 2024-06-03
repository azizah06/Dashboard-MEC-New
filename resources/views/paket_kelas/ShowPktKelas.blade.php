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
                <h1>Detail Paket Kelas</h1>
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

                        <!-- Floating Labels Form -->
                        <form class="row g-3" action="{{ route('paket_kelas.update', $pkt_kelas->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="col-md-2">
                                <div class="form-floating">
                                    <input type="text" value="{{$pkt_kelas->kd_pkt_kelas}}" name="kd_pkt_kelas" class="form-control" id="kd_pkt_kelas" placeholder="Your Name" readonly>
                                    <label for="kd_pkt_kelas">Kode Paket Kelas</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" value="{{$pkt_kelas->nama_kelas}}" name="nama_kelas" class="form-control" id="nama" placeholder="Your Name" readonly>
                                    <label for="nama">Nama Paket</label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-floating">
                                    <input type="number" value="{{ $pkt_kelas->harga }}" name="harga" class="form-control" id="harga" placeholder="Your Email" readonly>
                                    <label for="harga">Harga</label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-floating">
                                    <input type="number" value="{{ $pkt_kelas->siswa_count }}" name="harga" class="form-control" id="harga" placeholder="Your Email" readonly>
                                    <label for="harga">Jumlah Siswa</label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <hr>
                                <h5>Daftar Siswa</h5>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>No Telepon</th>
                                            <th>Alamat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pkt_kelas->siswa as $key => $siswa)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $siswa->nama }}</td>
                                            <td>{{ $siswa->no_telp }}</td>
                                            <td>{{ $siswa->alamat }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="">
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
