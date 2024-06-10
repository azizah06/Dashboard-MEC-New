
    @extends('layouts.app')
    @section('content')
        <main id="main" class="main">

            <div class="pagetitle">
                <h1>Tambah Jadwal</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Data Jadwal</li>
                    </ol>
                </nav>
            </div><!-- End Page Title -->

            <section class="section">
                <div class="card">
                    <div class="card-body p-4">

                            <!-- Floating Labels Form -->
                            <form class="row g-3" action="{{ route('jadwal.store') }}" method="POST">
                                @csrf
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" name="kd_jadwal" class="form-control @error('kd_jadwal') is-invalid @enderror" id="kd_jadwal" value="{{ old('kd_jadwal') }}" placeholder="Kode Jadwal">
                                        <label for="kd_jadwal">Kode Jadwal</label>
                                        @error('kd_jadwal')
                                            <div class="text-danger"><small>{{ $message }}</small></div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <select name="hari" class="form-select @error('hari') is-invalid @enderror" id="floatingSelect" aria-label="Hari">
                                            <option value="" selected>Pilih Hari...</option>
                                            <option value="Senin" {{ old('hari') == 'Senin' ? 'selected' : '' }}>Senin</option>
                                            <option value="Selasa" {{ old('hari') == 'Selasa' ? 'selected' : '' }}>Selasa</option>
                                            <option value="Rabu" {{ old('hari') == 'Rabu' ? 'selected' : '' }}>Rabu</option>
                                            <option value="Kamis" {{ old('hari') == 'Kamis' ? 'selected' : '' }}>Kamis</option>
                                            <option value="Jumat" {{ old('hari') == 'Jumat' ? 'selected' : '' }}>Jumat</option>
                                            <option value="Sabtu" {{ old('hari') == 'Sabtu' ? 'selected' : '' }}>Sabtu</option>
                                            <option value="Minggu" {{ old('hari') == 'Minggu' ? 'selected' : '' }}>Minggu</option>
                                        </select>
                                        <label for="floatingSelect">Hari</label>
                                        @error('hari')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <select name="pkt_kelas_id" class="form-control @error('pkt_kelas_id') is-invalid @enderror" id="exampleSelectBorder">
                                            <option value="" selected>Pilih...</option>
                                            @foreach ($pkt_kelas as $pk)
                                                <option value="{{ $pk->id }}" {{ old('pkt_kelas_id') == $pk->id ? 'selected' : '' }}>{{ $pk->nama_kelas }}</option>
                                            @endforeach
                                        </select>
                                        <label for="exampleSelectBorder">Paket Kelas</label>
                                        @error('pkt_kelas_id')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <select name="mentor_id" class="form-control @error('mentor_id') is-invalid @enderror" id="exampleSelectBorder">
                                            <option value="" selected>Pilih...</option>
                                            @foreach ($mentor as $m)
                                                <option value="{{ $m->id }}" {{ old('mentor_id') == $m->id ? 'selected' : '' }}>{{ $m->nama }}</option>
                                            @endforeach
                                        </select>
                                        <label for="exampleSelectBorder">Nama Mentor</label>
                                        @error('mentor_id')
                                            <div class="text-danger"><small>{{ $message }}</small></div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <select name="sarpra_id" class="form-control @error('sarpra_id') is-invalid @enderror" id="exampleSelectBorder">
                                            <option value="" selected>Pilih...</option>
                                            @foreach ($sarpra as $sp)
                                                <option value="{{ $sp->id }}" {{ old('sarpra_id') == $sp->id ? 'selected' : '' }}>{{ $sp->nama_ruangan }}</option>
                                            @endforeach
                                        </select>
                                        <label for="exampleSelectBorder">Nama Ruangan</label>
                                        @error('sarpra_id')
                                            <div class="text-danger"><small>{{ $message }}</small></div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="time" name="jam_mulai" class="form-control @error('jam_mulai') is-invalid @enderror" id="jam_mulai" value="{{ old('jam_mulai') }}">
                                        <label for="jam_mulai">Jam Mulai</label>
                                        @error('jam_mulai')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="time" name="jam_akhir" class="form-control @error('jam_akhir') is-invalid @enderror" id="jam_akhir" value="{{ old('jam_akhir') }}">
                                        <label for="jam_akhir">Jam Selesai</label>
                                        @error('jam_akhir')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="">
                                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                                    <a href="{{ route('jadwal.index') }}" class="btn btn-sm btn-secondary">Kembali</a>
                                </div>
                            </form>



                        {{-- @endforeach --}}

                    </div>
                </div>
            </section>

        </main><!-- End #main -->
    @endsection

