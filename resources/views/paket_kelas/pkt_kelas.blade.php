<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    @vite('resources/sass/app.scss')
    @vite('resources/sass/app.scss')
</head>

<body>
    @extends('layouts.app')
    @section('content')

    <main id="main" class="main">

        <div class="pagetitle">
            <div class="row">
                <div class="col-md-6">
                    <h1>Data Mentor</h1>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Data Mentor</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6 text-end d-flex flex-column justify-content-center">
                    <a href="{{ route('paket_kelas.create') }}" class="btn btn-sm btn-primary px-3 ms-auto">Tambah</a>
                </div>
            </div>
        </div><!-- End Page Title -->

        <section class="section">
          <div class="row">
            <div class="col-lg-12">

              <div class="card">
                <div class="card-body">

                    <!-- Search Bar -->
                    <div class="search-bar d-flex">
                        <form class="search-form" method="POST" action="#">
                            <input class="rounded-3 border-1 p-1 ps-3" type="text" name="query" placeholder="Search" title="Enter search keyword">
                            <button class="border-0 btn btn-transparent" type="submit" title="Search"><i class="bi bi-search"></i></button>
                        </form>
                        <div class="mb-4 ms-auto">
                            <button class="btn btn-sm btn-info" onclick="importExcel()">Import Excel</button>
                        </div>
                    </div>
                    <!-- End Search Bar -->

                  <!-- Table with stripped rows -->
                  <table class="table datatable">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Jumlah Siswa</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($pkt_kelas as $pk)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{$pk->nama_kelas}}</td>
                            <td>RP. {{ number_format($pk->harga, 0, ',', '.') }}</td>
                            <td>{{$pk->siswa_count}}</td>
                            <td>
                                <a href="{{ route('paket_kelas.show', $pk->id) }}" class="btn btn-sm btn-outline-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail Data Siswa"><i class="bi bi-eye"></i></a>
                                <a href="{{ route('paket_kelas.edit', $pk->id) }}" class="btn btn-sm btn-outline-warning"><i class="bi bi-pencil-square"></i></a>
                                <a href="" class="btn btn-sm">
                                    <form action="{{ route('paket_kelas.destroy', $pk->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm me-2"><i class="bi-trash"></i></button>
                                    </form>

                                </a>

                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                  </table>
                  <!-- End Table with stripped rows -->

                </div>
              </div>

            </div>
          </div>
        </section>

      </main><!-- End #main -->

    @endsection

    @vite('resources/js/app.js')
    @vite('resources/js/main.js')
</body>

</html>
