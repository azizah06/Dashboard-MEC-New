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
                        {{-- <form class="row g-3" action="{{ route('jadwal.update', ['jadwal' => $jadwal->id]) }}"
                            method="POST"> --}}
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
                                <div class="form-floating mb-3">
                                    <select name="hari" class="form-select @error('hari') is-invalid @enderror"
                                        id="floatingSelect" aria-label="Hari">
                                        <option value="Senin"
                                            {{ old('hari', $jadwal->hari) == 'Senin' ? 'selected' : '' }}>Senin</option>
                                        <option value="Selasa"
                                            {{ old('hari', $jadwal->hari) == 'Selasa' ? 'selected' : '' }}>Selasa</option>
                                        <option value="Rabu" {{ old('hari', $jadwal->hari) == 'Rabu' ? 'selected' : '' }}>
                                            Rabu</option>
                                        <option value="Kamis"
                                            {{ old('hari', $jadwal->hari) == 'Kamis' ? 'selected' : '' }}>Kamis</option>
                                        <option value="Jumat"
                                            {{ old('hari', $jadwal->hari) == 'Jumat' ? 'selected' : '' }}>Jumat</option>
                                        <option value="Sabtu"
                                            {{ old('hari', $jadwal->hari) == 'Sabtu' ? 'selected' : '' }}>Sabtu</option>
                                        <option value="Minggu"
                                            {{ old('hari', $jadwal->hari) == 'Minggu' ? 'selected' : '' }}>Minggu</option>
                                    </select>
                                    <label for="floatingSelect">Hari</label>
                                    @error('hari')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <select name="pkt_kelas_id"
                                        class="form-control @error('pkt_kelas_id') is-invalid @enderror"
                                        id="exampleSelectBorder">
                                        @foreach ($pkt_kelas as $c)
                                            <option value="{{ $c->id }}"
                                                {{ old('pkt_kelas_id', $jadwal->pkt_kelas_id) == $c->id ? 'selected' : '' }}>
                                                {{ $c->nama_kelas }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="exampleSelectBorder">Paket Kelas</label>
                                    @error('pkt_kelas_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <select name="mentor_id" class="form-control @error('mentor_id') is-invalid @enderror"
                                        id="exampleSelectBorder">
                                        @foreach ($mentor as $m)
                                            <option value="{{ $m->id }}"
                                                {{ old('mentor_id', $jadwal->mentor_id) == $m->id ? 'selected' : '' }}>
                                                {{ $m->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="exampleSelectBorder">Mentor</label>
                                    @error('mentor_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <select name="sarpra_id" class="form-control @error('sarpra_id') is-invalid @enderror"
                                        id="exampleSelectBorder">
                                        <option value="" selected>Pilih...</option>
                                        @foreach ($sarpra as $s)
                                            <option value="{{ $s->id }}"
                                                {{ old('sarpra_id', $jadwal->sarpra_id) == $s->id ? 'selected' : '' }}>
                                                {{ $s->nama_ruangan }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="exampleSelectBorder">Ruangan</label>
                                    @error('sarpra_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="time" value="{{ old('jam_mulai', $jadwal->jam_mulai) }}"
                                        name="jam_mulai" class="form-control @error('jam_mulai') is-invalid @enderror"
                                        id="jam_mulai">
                                    <label for="jam_mulai">Jam Mulai</label>
                                    @error('jam_mulai')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="time" value="{{ old('jam_akhir', $jadwal->jam_akhir) }}"
                                        name="jam_akhir" class="form-control @error('jam_akhir') is-invalid @enderror"
                                        id="jam_akhir">
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
                        <!-- End floating Labels Form -->

                        {{-- @endforeach --}}

                    </div>
                </div>
            </section>

        </main><!-- End #main -->
    @endsection

    @vite('resources/js/app.js')
</body>

</html>
