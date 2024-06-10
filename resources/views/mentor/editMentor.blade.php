
    @vite('resources/sass/app.scss')
</head>

<body>
    @extends('layouts.app')
    @section('content')
        <main id="main" class="main">

            <div class="pagetitle">
                <h1>Edit Data Mentor</h1>
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
                                    <label for="kd_mentor">Kode Mentor</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" value="{{ old('nama', $mentor->nama) }}" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Your Name">
                                    <label for="nama">Nama Lengkap</label>
                                    @error('nama')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" value="{{ old('email', $mentor->email) }}" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Your Email">
                                    <label for="email">Email</label>
                                    @error('email')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" value="{{ old('no_telp', $mentor->no_telp) }}" name="no_telp" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp" placeholder="Your Phone Number">
                                    <label for="no_telp">No Telp</label>
                                    @error('no_telp')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <select value="{{$mentor->jenis_kelamin}}" name="jenis_kelamin" class="form-select" id="floatingSelect" aria-label="State">
                                        <option value="Laki - laki" {{ $mentor->jenis_kelamin == 'Laki - laki' ? 'selected' : '' }}>Laki laki</option>
                                        <option value="Perempuan" {{ $mentor->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                    <label for="floatingSelect">Jenis Kelamin</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" value="{{ old('pendidikan', $mentor->pendidikan) }}" name="pendidikan" class="form-control @error('pendidikan') is-invalid @enderror" id="pendidikan" placeholder="Your Education">
                                    <label for="pendidikan">Pendidikan</label>
                                    @error('pendidikan')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" placeholder="Address" id="alamat" style="height: 100px;">{{ old('alamat', $mentor->alamat) }}</textarea>
                                    <label for="alamat">Alamat</label>
                                    @error('alamat')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                            </div>

                            <div class="">
                                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                                <a href="{{ route('mentor.index') }}" class="btn btn-sm btn-secondary">Kembali</a>
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
