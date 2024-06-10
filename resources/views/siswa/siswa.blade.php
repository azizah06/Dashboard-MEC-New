
@extends('layouts.app')
@section('content')
    @push('scripts')
        <script type="module">
            $(document).ready(function() {
                $('#siswaTable').DataTable({
                    "autoWidth": false, // Disable automatic column width calculation
                    "responsive": true // Enable responsive feature
                });
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
                    <h1>Data Siswa</h1>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Data Siswa</li>
                        </ol>
                    </nav>
                </div>

                <div class="col-md-6 text-end d-flex flex-column justify-content-center">
                    <div class="d-flex ms-auto">
                        <a href="{{ route('siswa.create') }}" class="btn btn-sm btn-primary px-3 me-2"><i class="bi bi-person-add"></i> Tambah Data</a>
                        <div class="dropdown me-2">
                            <button class="btn btn-sm btn-success dropdown-toggle" type="button" id="importDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-upload"></i> Export
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="importDropdown">
                                <li><a class="dropdown-item" href="{{ route('siswa.exportExcels') }}">Export Excel</a></li>
                                <li><a class="dropdown-item" href="{{ route('siswa.exportPdf') }}">Export PDF</a></li>
                                <!-- Add more import options here if needed -->
                            </ul>
                        </div>
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
                            {{-- <div class="table-responsive"> --}}
                                <table class="table datatable table-hover" id="siswaTable">
                                    <thead>
                                        <tr>
                                            <th style="width: 5%; white-space: nowrap;">No</th>
                                            <th>Nama</th>
                                            <th class="text-center" >Tanggal Lahir</th>
                                            <th class="text-center">No Telp</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Alamat</th>
                                            <th class="text-nowrap text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($siswa as $key => $s)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td>{{ $s->nama }}</td>
                                                <td class="text-center">{{ $s->tgl_lahir }}</td>
                                                <td class="text-center">{{ $s->no_telp }}</td>
                                                <td>{{ $s->jenis_kelamin }}</td>
                                                <td>{{ $s->alamat }}</td>
                                                <td class="text-nowrap">
                                                    <a href="{{ route('siswa.show', $s->id) }}" class="btn btn-sm btn-outline-primary" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Detail Data Siswa"><i
                                                            class="bi bi-eye"></i></a>
                                                    <a href="{{ route('siswa.edit', $s->id) }}"
                                                        class="btn btn-sm btn-outline-warning"><i
                                                            class="bi bi-pencil-square"></i></a>
                                                    <form action="{{ route('siswa.destroy', ['siswa' => $s->id]) }}"
                                                        method="POST" class="d-inline">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit"
                                                            class="btn btn-outline-danger btn-sm btn-delete"
                                                            data-name="{{ $s->id . ' ' . $s->nama }}"><i
                                                                class="bi-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            {{-- </div> --}}
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
