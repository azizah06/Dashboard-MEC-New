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
        @push('scripts')
            <script type="module">
                $(document).ready(function() {
                    $('#jadwalTable').DataTable();
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
                        <h1>Jadwal Bimbel</h1>
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active">Jadwal Bimbel</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 text-end d-flex flex-column justify-content-center">
                        <div class="d-flex ms-auto">
                            <a href="{{ route('jadwal.create') }}" class="btn btn-sm btn-primary px-3 ms-auto me-2">Tambah</a>
                            <a href="{{ route('jadwal.exportExcels') }}" class="btn btn-sm btn-success"><i class="bi bi-download"></i> Export</a>
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
                                <table class="table datatable table-bordered " style="width:100%" id="jadwalTable">
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
                                        @foreach ($jadwal as $key => $j)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $j->hari }}</td>
                                                <td>{{ $j->pkt_kelas->nama_kelas }}</td>
                                                <td>{{ $j->mentor->nama }}</td>
                                                <td>{{ $j->jam_mulai . ' - ' . $j->jam_akhir }}</td>
                                                <td>{{ $j->sarpra->nama_ruangan }}</td>
                                                <td>
                                                    <a href="{{ route('jadwal.show', $j->id) }}"
                                                        class="btn btn-sm btn-outline-primary" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Detail Jadwal"><i
                                                            class="bi bi-eye"></i></a>
                                                    <a href="{{ route('jadwal.edit', $j->id) }}"
                                                        class="btn btn-sm btn-outline-warning"><i
                                                            class="bi bi-pencil-square"></i></a>
                                                    <a href="" class="btn btn-sm">
                                                        <form action="{{ route('jadwal.destroy', ['jadwal' => $j->id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                class="btn btn-outline-danger btn-sm me-2 btn-delete"
                                                                data-name="{{ $j->id . ' ' . $j->kd_jadwal }}"><i
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
