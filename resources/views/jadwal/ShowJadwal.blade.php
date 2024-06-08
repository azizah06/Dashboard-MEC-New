
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
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Data</li>
                    </ol>
                </nav>
            </div><!-- End Page Title -->

            <section class="section">
                <div class="card">
                    <div class="card-body p-4">


                            <!-- Floating Labels Form -->
                            <form class="row g-3" action="{{ route('jadwal.update', $jadwal->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" value="{{ old('kd_jadwal', $jadwal->kd_jadwal) }}"
                                            name="kd_jadwal" class="form-control @error('kd_jadwal') is-invalid @enderror"
                                            id="kd_jadwal" placeholder="Kode Jadwal" readonly>
                                        <label for="kd_jadwal">Kode Jadwal</label>
                                        @error('kd_jadwal')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" value="{{ old('hari', $jadwal->hari) }}"
                                            name="hari" class="form-control @error('hari') is-invalid @enderror"
                                            id="hari" placeholder="Kode Jadwal" readonly>
                                        <label for="hari">Hari</label>
                                        @error('hari')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" value="{{ old('pkt_kelas_id', $jadwal->pkt_kelas->nama_kelas) }}"
                                            name="pkt_kelas_id" class="form-control @error('pkt_kelas_id') is-invalid @enderror"
                                            id="pkt_kelas_id" placeholder="Kode Jadwal" readonly>
                                        <label for="pkt_kelas_id">pkt_kelas_id</label>
                                        @error('pkt_kelas_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" value="{{ old('mentor_id', $jadwal->mentor->nama) }}"
                                            name="mentor_id" class="form-control @error('mentor_id') is-invalid @enderror"
                                            id="mentor_id" placeholder="Kode Jadwal" readonly>
                                        <label for="mentor_id">Mentor</label>
                                        @error('mentor_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" value="{{ old('sarpra_id', $jadwal->sarpra->nama_ruangan) }}"
                                            name="sarpra_id" class="form-control @error('sarpra_id') is-invalid @enderror"
                                            id="sarpra_id" placeholder="Kode Jadwal" readonly>
                                        <label for="sarpra_id">Ruangan</label>
                                        @error('sarpra_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-floating">
                                        <input type="time" value="{{ old('jam_mulai', $jadwal->jam_mulai) }}"
                                            name="jam_mulai" class="form-control @error('jam_mulai') is-invalid @enderror"
                                            id="jam_mulai" readonly>
                                        <label for="jam_mulai">Jam Mulai</label>
                                        @error('jam_mulai')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-floating">
                                        <input type="time" value="{{ old('jam_akhir', $jadwal->jam_akhir) }}"
                                            name="jam_akhir" class="form-control @error('jam_akhir') is-invalid @enderror"
                                            id="jam_akhir" readonly>
                                        <label for="jam_akhir">Jam Selesai</label>
                                        @error('jam_akhir')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="">
                                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                                    <a href="{{ url()->previous() }}" class="btn btn-sm btn-secondary">Kembali</a>
                                </div>
                            </form>

                        {{-- @endforeach --}}

                    </div>
                </div>
            </section>

        </main><!-- End #main -->
    @endsection

    @vite('resources/js/app.js')
</body>

</html>
