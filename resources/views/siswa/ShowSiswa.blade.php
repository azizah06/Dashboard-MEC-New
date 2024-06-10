
    @extends('layouts.app')
    @section('content')
        <main id="main" class="main">

            <div class="pagetitle">
                <h1>Show Data Siswa</h1>
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
                        <form class="row g-3" action="{{ route('siswa.update', $siswa->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" value="{{$siswa->kd_siswa}}" name="kd_siswa" class="form-control" id="kd_siswa" placeholder="Your Name" readonly>
                                    <label for="kd_siswa">Kode Siswa</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" value="{{$siswa->nama}}" name="nama" class="form-control" id="nama" placeholder="Your Name" readonly>
                                    <label for="nama">Nama Lengkap</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="date" value="{{$siswa->tgl_lahir}}" name="tgl_lahir" class="form-control" id="tgl_lahir" placeholder="Your Name" readonly>
                                    <label for="tgl_lahir">Tanggal Lahir</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" value="{{$siswa->no_telp}}" name="no_telp" class="form-control" id="no_telp" placeholder="Your Email" readonly>
                                    <label for="no_telp">No Telepon</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" value="{{$siswa->jenis_kelamin}}" name="jenis_kelamin" class="form-control" id="jenis_kelamin" placeholder="Your Email" readonly>
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" value="{{$siswa->pkt_kelas->nama_kelas}}" name="pkt_kelas" class="form-control" id="pkt_kelas" placeholder="Your Email" readonly>
                                    <label for="pkt_kelas">Paket Kelas</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <textarea class="form-control" name="alamat" placeholder="Address" id="alamat" style="height: 100px;" readonly>{{$siswa->alamat}}</textarea>
                                    <label for="alamat">Alamat</label>
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
