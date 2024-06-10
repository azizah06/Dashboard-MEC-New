
    @extends('layouts.app')
    @section('content')
        <main id="main" class="main">

            <div class="pagetitle">
                <h1>Tambah Sarana Prasarana</h1>
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

                        <form class="row g-3" action="{{ route('sarpra.store') }}" method="POST">
                            @csrf
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="number" name="kd_sarpra"
                                        class="form-control @error('kd_sarpra') is-invalid @enderror" id="kd_sarpra"
                                        placeholder="Your Name" value="{{ old('kd_sarpra') }}" >
                                    <label for="kd_sarpra">Kode Sarpra</label>
                                    @error('kd_sarpra')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="text" name="nama_ruangan" class="form-control @error('nama_ruangan') is-invalid @enderror" id="nama_ruangan"
                                        placeholder="Your Name" value="{{ old('nama_ruangan') }}">
                                    <label for="nama">Nama Ruangan</label>
                                    @error('nama_ruangan')
                                    <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="number" name="kapasitas" class="form-control @error('kapasitas') is-invalid @enderror" id="kapasitas"
                                        placeholder="Your Name" value="{{ old('kapasitas') }}">
                                    <label for="kapasitas">Kapasitas</label>
                                    @error('kapasitas')
                                    <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" name="jmlh_baik" class="form-control @error('jmlh_baik') is-invalid @enderror" id="jmlh_baik"
                                        placeholder="Your Name" value="{{ old('jmlh_baik') }}">
                                    <label for="jmlh_baik">Jumlah Barang Kondisi Baik</label>
                                    @error('jmlh_baik')
                                    <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" name="jmlh_rusak" class="form-control @error('jmlh_rusak') is-invalid @enderror" id="jmlh_rusak"
                                        placeholder="Your Name" value="{{ old('jmlh_rusak') }}">
                                    <label for="jmlh_rusak">Jumlah Barang Kondisi Rusak</label>
                                    @error('jmlh_rusak')
                                    <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                            </div>

                            <h6 class="align-items-center text-center mt-5 py-2 fw-bold text-light rounded-3 bg-secondary">Detail Rincian Barang</h6>

                            <div class="col">
                                <div class="form-floating">
                                    <input type="number" name="meja_mentor" class="form-control @error('meja_mentor') is-invalid @enderror" id="meja_mentor"
                                        placeholder="Your Name" value="{{ old('meja_mentor') }}">
                                    <label for="meja_mentor">Jumlah Meja Mentor</label>
                                    @error('meja_mentor')
                                    <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-floating">
                                    <input type="number" name="kursi_mentor" class="form-control @error('kursi_mentor') is-invalid @enderror" id="kursi_mentor"
                                        placeholder="Your Name" value="{{ old('kursi_mentor') }}">
                                    <label for="kursi_mentor">Jumlah Kursi Mentor</label>
                                    @error('kursi_mentor')
                                    <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-floating">
                                    <input type="number" name="kursi_meja_siswa" class="form-control @error('kursi_meja_siswa') is-invalid @enderror" id="kursi_meja_siswa"
                                        placeholder="Your Name" value="{{ old('kursi_meja_siswa') }}">
                                    <label for="kursi_meja_siswa">Kursi Meja Siswa</label>
                                    @error('kursi_meja_siswa')
                                    <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-floating">
                                    <input type="number" name="kipas" class="form-control  @error('kipas') is-invalid @enderror" id="kipas"
                                        placeholder="Your Name" value="{{ old('kipas') }}">
                                    <label for="kipas">Jumlah Kipas</label>
                                    @error('kipas')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror


                                </div>
                            </div>

                            <div class="col">
                                <div class="form-floating">
                                    <input type="number" name="papan_tulis" class="form-control  @error('papan_tulis') is-invalid @enderror" id="papan_tulis"
                                        placeholder="Your Name" value="{{ old('papan_tulis') }}">
                                    <label for="papan_tulis">Jumlah Papan Tulis</label>
                                    @error('papan_tulis')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror

                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-floating">
                                    <textarea class="form-control" name="keterangan" placeholder="Address"  id="keterangan" style="height: 100px;"></textarea>
                                    <label for="keterangan">Keterangan</label>
                                </div>
                            </div>

                            <div class="">
                                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                                <a href="{{ route('sarpra.index') }}" class="btn btn-sm btn-secondary">Kembali</a>

                            </div>
                        </form><!-- End floating Labels Form -->

                    </div>
                </div>
            </section>

        </main><!-- End #main -->
    @endsection
