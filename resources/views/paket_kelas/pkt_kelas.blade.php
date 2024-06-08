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
        @push('scripts')
            <script type="module">
                $(document).ready(function() {
                    $('#pkt_kelasTable').DataTable();
                    $(".datatable").on("click", ".btn-delete", function(e) {
                        e.preventDefault();

                        var form = $(this).closest("form");
                        var name = $(this).data("name");

                        Swal.fire({
                            title: "Are you sure want to delete\n" + name + "?",
                            text: "You won't be able to revert this!",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonClass: "bg-primary",
                            confirmButtonText: "Yes, delete it!",
                        }).then((result) => {
                            if (result.isConfirmed) {
                                form.submit();
                            }
                        });
                    });
                });
            </script>
        @endpush

        <main id="main" class="main">

            <div class="pagetitle">
                <div class="row">
                    <div class="col-md-6">
                        <h1>Data Paket Kelas</h1>
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active">Data Paket Kelas</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 text-end d-flex flex-column justify-content-center">
                        <div class="d-flex ms-auto">
                            <a href="{{ route('paket_kelas.create') }}"
                                class="btn btn-sm btn-primary px-3 ms-auto me-2">Tambah</a>
                            <a href="{{ route('paket_kelas.exportExcels')}}" class="btn btn-sm btn-success"><i class="bi bi-download"></i> Export</a>
                        </div>
                    </div>
                </div>
            </div><!-- End Page Title -->

            <section class="section">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="card">
                            <div class="card-body">

                                <!-- Table with stripped rows -->
                                <table class="table datatable table-hover" style="width:100%" id="pkt_kelasTable">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th>Nama</th>
                                            <th>Harga</th>
                                            <th class="text-center">Jumlah Siswa</th>
                                            <th class="text-center col-2">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pkt_kelas as $pk)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td>{{ $pk->nama_kelas }}</td>
                                                <td>RP. {{ number_format($pk->harga, 0, ',', '.') }}</td>
                                                <td class="text-center">{{ $pk->siswa_count }}</td>
                                                <td class="text-center col-2">
                                                    <a href="{{ route('paket_kelas.show', $pk->id) }}"
                                                        class="btn btn-sm btn-outline-primary" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Detail Data Siswa"><i
                                                            class="bi bi-eye"></i></a>
                                                    <a href="{{ route('paket_kelas.edit', $pk->id) }}"
                                                        class="btn btn-sm btn-outline-warning"><i
                                                            class="bi bi-pencil-square"></i></a>
                                                    <a href="" class="btn btn-sm">
                                                        <form action="{{ route('paket_kelas.destroy', $pk->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-delete btn-outline-danger btn-sm me-2" data-name="{{ $pk->id . ' ' . $pk->nama_kelas }}"><i
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
    @vite('resources/js/main.js')
</body>

</html>
