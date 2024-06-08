
    @vite('resources/sass/app.scss')
</head>

<body>
    @extends('layouts.app')
    @section('content')
        <main id="main" class="main">

            <div class="pagetitle">
                <h1>Edit Data Siswa</h1>
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
                        <form class="row g-3" action="{{ route('siswa.update', ['siswa' => $siswa->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" value="{{ $siswa->kd_siswa }}" name="kd_siswa" class="form-control" id="kd_siswa" placeholder="Your Name" readonly>
                                    <label for="kd_siswa">Kode Siswa</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" value="{{ old('nama', $siswa->nama) }}" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Your Name">
                                    <label for="nama">Nama Lengkap</label>
                                    @error('nama')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="date" value="{{ old('tgl_lahir', $siswa->tgl_lahir) }}" name="tgl_lahir" class="form-control @error('tgl_lahir') is-invalid @enderror" id="tgl_lahir" placeholder="Your Name">
                                    <label for="tgl_lahir">Tanggal Lahir</label>
                                    @error('tgl_lahir')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" value="{{ old('no_telp', $siswa->no_telp) }}" name="no_telp" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp" placeholder="Your Email">
                                    <label for="no_telp">No Telp</label>
                                    @error('no_telp')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <select value="{{$siswa->jenis_kelamin}}" name="jenis_kelamin" class="form-select" id="floatingSelect" aria-label="State">
                                        <option value="Laki - laki" {{ $siswa->jenis_kelamin == 'Laki - laki' ? 'selected' : '' }}>Laki laki</option>
                                        <option value="Perempuan" {{ $siswa->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                    <label for="floatingSelect">Jenis Kelamin</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <select name="pkt_kelas_id" class="custom-select form-control " id="kelas">
                                        @foreach ($pkt_kelas as $class)
                                            <option value="{{ $class->id }}"
                                                {{ $siswa->pkt_kelas_id == $class->id ? 'selected' : '' }}>
                                                {{ $class->nama_kelas }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="floatingSelect">Paket Kelas</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" placeholder="Address" id="alamat" style="height: 100px;">{{ old('alamat', $siswa->alamat) }}</textarea>
                                    <label for="alamat">Alamat</label>
                                    @error('alamat')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
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
