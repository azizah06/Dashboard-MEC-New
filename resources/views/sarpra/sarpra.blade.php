
    @extends('layouts.app')
    @section('content')
        @push('scripts')
            <script type="module">
                $(document).ready(function() {
                    $('#sarpraTable').DataTable();
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
                        <h1>Data Sarpra</h1>
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active">Data Sarana Prasarana</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 text-end d-flex flex-column justify-content-center">
                        <div class="d-flex ms-auto">
                            <a href="{{ route('sarpra.create') }}" class="btn btn-sm btn-primary px-3 me-2"><i class="bi bi-person-add"></i> Tambah Data</a>
                            <a href="{{ route('sarpra.exportExcels') }}" class="btn btn-sm btn-success"><i
                                    class="bi bi-download"></i> Export</a>
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

                                <table class="table datatable table-hover" style="width:100%" id="sarpraTable">
                                    <thead>
                                        <tr>
                                            <th style="width: 5%; white-space: nowrap;">No</th>
                                            <th class="text-center">Ruangan</th>
                                            <th class="text-center">Kapasitas Siswa</th>
                                            <th class="text-center">Barang Baik</th>
                                            <th class="text-center">Barang Rusak</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sarpra as $key => $sp)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td class="text-center">{{ $sp->nama_ruangan }}</td>
                                                <td class="text-center">{{ $sp->kapasitas }}</td>
                                                <td class="text-center">{{ $sp->jmlh_baik }}</td>
                                                <td class="text-center">{{ $sp->jmlh_rusak }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('sarpra.show', $sp->id) }}"
                                                        class="btn btn-sm btn-outline-primary" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Detail Data Siswa"><i
                                                            class="bi bi-eye"></i></a>
                                                    <a href="{{ route('sarpra.edit', $sp->id) }}"
                                                        class="btn btn-sm btn-outline-warning"><i
                                                            class="bi bi-pencil-square"></i></a>
                                                    <form action="{{ route('sarpra.destroy', ['sarpra' => $sp->id]) }}"
                                                        method="POST" class="d-inline">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit"
                                                            class="btn btn-outline-danger btn-sm btn-delete"
                                                            data-name="{{ $sp->id . ' ' . $sp->nama_ruangan }}"><i
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
