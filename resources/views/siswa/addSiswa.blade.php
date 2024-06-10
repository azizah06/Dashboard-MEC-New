
    @extends('layouts.app')
    @section('content')
        <main id="main" class="main">

            <div class="pagetitle">
                <h1>Tambah Data Siswa</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Data Siswa</li>
                    </ol>
                </nav>
            </div><!-- End Page Title -->

            <section class="section">
                <div class="card">
                    <div class="card-body p-4">
                        {{-- <h5 class="card-title">Tambah Data Siswa</h5> --}}

                        <!-- Floating Labels Form -->
                        <form class="row g-3" action="{{ route('siswa.store') }}" method="POST">
                            @csrf
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" name="kd_siswa"
                                        class="form-control @error('kd_siswa') is-invalid @enderror" id="kd_siswa"
                                        placeholder="Your Name" value="{{ old('kd_siswa') }}" >
                                    <label for="kd_siswa">Kode Siswa</label>
                                    @error('kd_siswa')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama"
                                        placeholder="Your Name" value="{{ old('nama') }}">
                                    <label for="nama">Nama Lengkap</label>
                                    @error('nama')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="date" name="tgl_lahir" class="form-control @error('tgl_lahir') is-invalid @enderror" id="tgl_lahir"
                                        placeholder="Your Name" value="{{ old('tgl_lahir') }}">
                                    <label for="tgl_lahir">Tanggal Lahir</label>
                                    @error('tgl_lahir')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" name="no_telp" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp"
                                        placeholder="Your Email" value="{{ old('no_telp') }}">
                                    <label for="no_telp">No Telp</label>
                                    @error('no_telp')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <select name="jenis_kelamin" class="form-select @error('jenis_kelamin') is-invalid @enderror" id="floatingSelect" aria-label="State">
                                        <option selected disabled>Pilih...</option>
                                        <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                    <label for="floatingSelect">Jenis Kelamin</label>
                                    @error('jenis_kelamin')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                            </div>



                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <select name="pkt_kelas_id" class="form-control @error('pkt_kelas_id') is-invalid @enderror" id="exampleSelectBorder" value="{{ old('pkt_kelas_id') }}">
                                        <option selected>Pilih...</option>
                                        @foreach ($pkt_kelas as $pk)
                                            <option name="pkt_kelas_id" value="{{ $pk->id }}">{{ $pk->nama_kelas }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="floatingSelect">Paket Kelas</label>
                                    @error('pkt_kelas_id')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" placeholder="Address" id="alamat" style="height: 100px;" value="{{ old('alamat') }}"></textarea>
                                    <label for="alamat">Alamat</label>
                                    @error('alamat')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                            </div>

                            <div class="">
                                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                                <a href="{{ route('siswa.index') }}" class="btn btn-sm btn-secondary">Kembali</a>

                            </div>
                        </form><!-- End floating Labels Form -->

                    </div>
                </div>
            </section>

        </main><!-- End #main -->
    @endsection
