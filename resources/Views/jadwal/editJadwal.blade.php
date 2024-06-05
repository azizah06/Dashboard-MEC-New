<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $pageTitle }}</title>
    @vite('resources/sass/app.scss')
</head>

<body>
    @extends('layouts.app')
    @section('content')
        <main id="main" class="main">

            <div class="pagetitle">
                <h1>Edit Jadwal</h1>
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
                        <h5 class="card-title">Tambah Data Siswa</h5>
                        {{-- @foreach ( ) --}}
                            <!-- Floating Labels Form -->
                        <form action="{{ route('jadwal.update', $jadwal->id) }}" class="row g-3" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="col-md-4">
         {{-- FORM_KODE_JADWAL --}}
                                 <div class="form-floating">
                                    <input type="text" class="form-control
                                    id="kd_jadwal" value="{{ $jadwal->kode_jadwal }}" placeholder="Kode Jadwal">
                                    <label for="kd_jadwal">Kode Jadwal</label>

                                </div>
                            </div>
                             <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="hari" aria-label="State">
                                        <option selected>Pilih Hari...</option>
                                        <option value="Senin">{{ $jadwal->hari=='senin'?'selected':'' }}Senin</option>
                                        <option value="Selasa">{{ $jadwal->hari=='selasa'?'selected':'' }}Selasa</option>
                                        <option value="Rabu">{{ $jadwal->hari=='rabu'?'selected':'' }}Rabu</option>
                                        <option value="Kamis">{{ $jadwal->hari=='Kamis'?'selected':'' }}Kamis</option>
                                        <option value="Jumat">{{ $jadwal->hari=='jumat'?'selected':'' }}Jumat</option>

                                    </select>
                                    <label for="hari">Hari</label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="paket_kelas" aria-label="State">
                                        {{-- @php
                                            $selected ='';
                                            if($errors->any()){
                                                $selected =old('Kelas');
                                            }else{
                                                $selected=$jadwal->Kelass;
                                            }
                                        @endphp
                                        @foreach ($jadwal as $kelass )
                                        <option value="{{ $kelass->Kelass}}" {{ old('kelas')==$kelass->Kelass? 'selected': '' }}>
                                            {{ $kelass->Kelass }}</option> --}}
                                    {{-- @endforeach --}}
                                        {{-- @foreach ($kelas as $kelass )
                                        <option value="{{ $kelass->id }}
                                            {{ $selected ==$kelss->id ? 'selected':''}}"> {{ $kelass->nama_paket }}</option>

                                        @endforeach --}}

                                    </select>
                                    <label for="paket_kelas">Paket Kelas</label>
                                </div>
                            </div>
            {{-- FORM_MENTOR --}}
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <select class="form-select " id="mentor" aria-label="State">
                                        <option selected>Pilih Mentor...</option>
                                        {{-- @foreach ($mentor as $mentors )
                                            <option value="{{ $mentors->id }}" {{ old('mentors_id')==$mentors->id? 'selected':'' }}>
                                            {{ $mentors->nama }}</option>
                                        @endforeach
                                        @error('Mentor')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror --}}

                                    </select>
                                    <label for="mentor">Mentor</label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="mentor" aria-label="State">
                                        <option selected>Pilih Ruangan...</option>
                                        {{-- @foreach ($Sarpras as $Sarprass )
                                            <option value="{{ $Sarprass->id }}" {{ old('mentor')==$Sarprass->id? 'selected':'' }}>
                                            {{ $Sarprass->kode_ruang }}</option>
                                        @endforeach
                                        @error('ruangan')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror --}}
                                    </select>
                                    <label for="mentor">Ruangan</label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="time" class="form-control" id="jam_mulai">
                                    <label for="jam_mulai">Jam Mulai</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="time" class="form-control" id="jam_selesai">
                                    <label for="jam_selesai">Jam Selesai</label>
                                </div>
                            </div>

                            <div class="">
                                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                                <a class="btn btn-sm btn-secondary" href="{{ route('jadwal.index') }}">Kembali</a>
                            </div>
                        </form><!-- End floating Labels Form -->

                        {{-- @endforeach --}}

                    </div>
                </div>
            </section>

        </main><!-- End #main -->
    @endsection

    @vite('resources/js/app.js')
</body>

</html>
