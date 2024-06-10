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
                <h1>Tambah Transaksi</h1>
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
                        <form class="row g-3" action="{{ route('transaksi.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input name="kd_bayar" type="text"
                                        class="form-control @error('kd_bayar') is-invalid @enderror" id="kd_bayar"
                                        placeholder="Your Name" value="{{ old('kd_bayar') }}">
                                    <label for="kd_bayar">Kode Bayar</label>
                                    @error('kd_bayar')
                                    <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <select name="siswa_id" class="form-control @error('siswa_id') is-invalid @enderror"
                                        id="exampleSelectBorder">
                                        <option selected>Pilih Siswa...</option>
                                        @foreach ($siswa as $s)
                                            <option value="{{ $s->id }}">{{ $s->nama }}</option>
                                        @endforeach
                                    </select>
                                    <label for="floatingSelect">Nama Siswa</label>
                                    @error('siswa_id')
                                    <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <select name="pkt_kls_id"
                                        class="form-control @error('pkt_kls_id') is-invalid @enderror"
                                        id="exampleSelectBorder">
                                        <option selected>Pilih Paket Kelas...</option>
                                        @foreach ($pkt_kelas as $pk)
                                            <option value="{{ $pk->id }}">{{ $pk->nama_kelas }}</option>
                                        @endforeach
                                    </select>
                                    <label for="floatingSelect">Paket Kelas</label>
                                    @error('pkt_kls_id')
                                    <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="date" name="tgl_bayar"
                                        class="form-control @error('tgl_bayar') is-invalid @enderror" id="tgl_bayar"
                                        placeholder="Your Name" value="{{ old('tgl_bayar') }}">
                                    <label for="tgl_bayar">Tanggal Bayar</label>
                                    @error('tgl_bayar')
                                    <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="file" name="bukti_bayar"
                                        class="form-control @error('bukti_bayar') is-invalid @enderror" id="bukti_bayar"
                                        placeholder="Your Name" value="{{ old('bukti_bayar') }}"  accept="image/*">
                                    <label for="bukti_bayar">Bukti Pembayaran</label>
                                    @error('bukti_bayar')
                                    <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                            </div>

                            <div class="">
                                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                                <a href="{{ route('transaksi.index')}}" class="btn btn-sm btn-secondary">Kembali</a>
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
