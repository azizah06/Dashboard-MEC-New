<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    @vite('resources/sass/app.scss')
</head>

<body>
    @extends('layouts.app')
    @section('content')

    <main id="main" class="main">

        <div class="pagetitle">
          <h1>Jadwal Kelas</h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item">Tables</li>
              <li class="breadcrumb-item active">Data</li>
            </ol>
          </nav>
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

                    <a href="{{ route('jadwal.create') }}" class="btn btn-sm btn-primary mb-3 px-3">Tambah</a>

                  <!-- Table with stripped rows -->
                  <table class="table datatable">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Hari</th>
                        <th>Paket Kelas</th>
                        <th>Mentor</th>
                        <th>Waktu</th>
                        <th>Ruangan</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Senin</td>
                            <td>SKD Kedinasan Offline</td>
                            <td>Nur Azizah Rosidah</td>
                            <td>13.00 - 14.30</td>
                            <td>Ruang 1</td>
                            <td>
                                <a href="" class="btn btn-sm btn-info">Detail</a>
                                <a href="" class="btn btn-sm btn-warning">Edit</a>
                                <a href="" class="btn btn-sm btn-danger">Del</a>
                            </td>
                        </tr>

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
</body>

</html>
