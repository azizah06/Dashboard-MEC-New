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
        @push('scripts')
            <script type="module">
                $(document).ready(function() {
                    $('#transaksiTable').DataTable();
                    $(".datatable").on("click", ".btn-delete", function(e) {
                        e.preventDefault();

                        var form = $(this).closest("form");
                        var name = $(this).data("name");

                        Swal.fire({
                            title: "Hapus\n" + name + "?",
                            text: "Apakah Anda yakin ingin menghapus data ini?",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonClass: "bg-primary",
                            confirmButtonText: "Ya, Hapus Data ini!",
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
                        <h1>Data Transaksi</h1>
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active">Data Siswa</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 text-end d-flex flex-column justify-content-center">
                        <div class="d-flex ms-auto">
                            <a href="{{ route('transaksi.create') }}" class="btn btn-sm btn-primary px-3 me-2"><i class="bi bi-person-add"></i> Tambah Data</a>
                            <a href="{{ route('transaksi.exportExcels') }}" class="btn btn-sm btn-success"><i class="bi bi-download"></i> Export</a>
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
                                <table id="transaksiTable" style="width:100%" class="table datatable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Bayar</th>
                                            <th class="text-center">Nama Siswa</th>
                                            <th>Paket Kelas</th>
                                            <th>Tanggal Bayar</th>
                                            <th>Nominal Bayar</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($transaksi as $j)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td class="text-center">{{ $j->kd_bayar }}</td>
                                                <td>{{ $j->nama_siswa }}</td>
                                                <td>{{ $j->paket_kelas }}</td>
                                                <td class="text-center">{{ $j->tgl_bayar }}</td>
                                                <td>RP. {{ number_format($j->harga_bayar, 0, ',', '.') }}</td>
                                                <td class="text-nowrap">
                                                    <a href="{{ route('transaksi.show', $j->id) }}"
                                                        class="btn btn-sm btn-outline-primary" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Detail Data transaksi"><i
                                                            class="bi bi-eye"></i></a>

                                                    <a href="{{ route('transaksi.edit', $j->id) }}"
                                                        class="btn btn-sm btn-outline-warning"><i
                                                            class="bi bi-pencil-square"></i></a>

                                                    <form action="{{ route('transaksi.destroy', ['transaksi' => $j->id]) }}"
                                                        method="POST" class="d-inline">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit"
                                                            class="btn btn-outline-danger btn-sm btn-delete"
                                                            data-name="{{ $j->id . ' ' . $j->nama_siswa }}"><i
                                                                class="bi-trash"></i></button>
                                                    </form>
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
