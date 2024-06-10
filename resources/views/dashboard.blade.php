@extends('layouts.app')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-8">
                    <div class="row">

                        <!-- Siswa -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">

                                <div class="card-body">
                                    {{-- <h5 class="card-title">Jumlah Siswa</h5> --}}
                                    <h5 class="card-title">Jumlah Siswa <span>| Bimbel MEC</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-mortarboard"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $totalSiswa }} siswa</h6>
                                            <span class="text-success small pt-1 fw-bold">MEC</span> <span
                                                class="text-muted small pt-2 ps-1">Education Center</span>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Siswa -->

                        <!-- Pendapatan -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card revenue-card">

                                <div class="card-body">
                                    <h5 class="card-title">Total Pendapatan <span>| Bimbel MEC</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-currency-dollar"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>RP. {{ number_format($totalPendapatan, 0, ',', '.') }}</h6>
                                            {{-- <span class="text-success small pt-1 fw-bold">MEC</span> <span
                                                class="text-muted small pt-2 ps-1">Education Center</span> --}}

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Pendapatan -->

                        <!-- Mentor -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">

                                <div class="card-body">
                                    <h5 class="card-title">Jumlah Mentor <span>| Bimbel MEC</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-card-list"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $totalMentor }} mentor</h6>
                                            <span class="text-success small pt-1 fw-bold">MEC</span> <span
                                                class="text-muted small pt-2 ps-1">Education Center</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Mentor -->

                        <!-- Paket kelas -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card revenue-card">

                                <div class="card-body">
                                    <h5 class="card-title">Jumlah Paket Kelas <span>| Bimbel MEC</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-boxes"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $totalPaket_Kelas }}</h6>
                                            <span class="text-success small pt-1 fw-bold">MEC</span> <span
                                                class="text-muted small pt-2 ps-1">Education Center</span>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Revenue Card -->


                        <!-- Recent Sales -->
                        <div class="col-12">
                            <div class="card recent-sales overflow-auto">

                                <div class="card-body">
                                    <h5 class="card-title">Jadwal Terkini<span> | Bimbel MEC</span></h5>

                                    <table class="table table-borderless datatable">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Hari</th>
                                                <th scope="col">Nama Kelas</th>
                                                <th scope="col">Nama Mentor</th>
                                                <th scope="col">Jam</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($jadwal as $key => $j)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $j->hari }}</td>
                                                    <td>{{ $j->pkt_kelas->nama_kelas }}</td>
                                                    <td>{{ $j->mentor->nama }}</td>
                                                    <td>{{ $j->jam_mulai . ' - ' . $j->jam_akhir }}</td>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>

                            </div>
                        </div><!-- End Recent Sales -->

                    </div>
                </div><!-- End Left side columns -->

                <!-- Right side columns -->
                <div class="col-lg-4">

                    <!-- Recent Activity -->
                    <!-- Reports -->
                    <div class="card recent-activity px-3">

                        <h5 class="card-title">Siswa Terbaru</h5>
                        <div class="row">
                            <table class="table datatable table-hover" id="siswaTable">
                                <thead>
                                    <tr>
                                        <th class="col-2 text-center" >No</th>
                                        <th>Nama</th>
                                        {{-- <th class="text-center" >Tanggal Lahir</th> --}}
                                        {{-- <th class="text-center">No Telp</th> --}}
                                        <th>Jenis Kelamin</th>
                                        {{-- <th>Alamat</th> --}}
                                        {{-- <th class="text-nowrap text-center">Aksi</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($siswa as $key => $s)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ $s->nama }}</td>
                                            {{-- <td class="text-center">{{ $s->tgl_lahir }}</td> --}}
                                            {{-- <td class="text-center">{{ $s->no_telp }}</td> --}}
                                            <td>{{ $s->jenis_kelamin }}</td>
                                            {{-- <td>{{ $s->alamat }}</td> --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam saepe beatae unde accusantium aut tempora iusto expedita assumenda? Maiores cum laborum atque accusantium, quibusdam mollitia commodi doloremque officiis sed tempore!</p> --}}
                        </div>

                    </div>
                </div><!-- End Recent Activity -->



            </div><!-- End Right side columns -->

            </div>
        </section>

    </main><!-- End #main -->

@endsection
