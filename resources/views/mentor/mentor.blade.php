<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard MEC</title>
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
                        <a href="{{ route('mentor.create') }}" class="btn btn-sm btn-primary px-3 ms-auto">Tambah</a>
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
                                    <div class="search-bar border-2">
                                        <form class="search-form d-flex align-items-center " method="POST" action="#">
                                            <input class="border-0" type="text" name="query" placeholder="Search" title="Enter search keyword">
                                            <button class="border-0 bg-light" type="submit" title="Search"><i class="bi bi-search"></i></button>
                                        </form>
                                    </div><!-- End Search Bar -->
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
                                            <th>Email</th>
                                            <th>No Telp</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Pendidikan</th>
                                            <th>Alamat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($mentor as $m)
                                            <tr>
                                                <td>1</td>
                                                <td>{{ $m->nama }}</td>
                                                <td>{{ $m->email }}</td>
                                                <td>{{ $m->no_telp }}</td>
                                                <td>{{ $m->jenis_kelamin }}</td>
                                                <td>{{ $m->pendidikan }}</td>
                                                <td>{{ $m->alamat }}</td>
                                                <td>
                                                    <a href="{{ route('mentor.show', $m->id) }}"
                                                        class="btn btn-sm btn-info">Detail</a>
                                                    <a href="{{ route('mentor.edit', $m->id) }}"
                                                        class="btn btn-sm btn-warning">Edit</a>
                                                    <a href="" class="btn btn-sm">
                                                        <form action="{{ route('mentor.destroy', ['mentor' => $m->id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                class="btn btn-outline-danger btn-sm me-2"><i
                                                                    class="bi-trash"></i></button>
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
</body>

</html>
