
    @extends('layouts.app')
    @section('content')
    @push('scripts')
        <script type="module">
            $(document).ready(function() {
                $('#mentorTable').DataTable();
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
                        <h1>Data Mentor</h1>
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active">Data Mentor</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 text-end d-flex flex-column justify-content-center">
                        <div class="d-flex ms-auto">
                            <a href="{{ route('mentor.create') }}" class="btn btn-sm btn-primary px-3 me-2"><i class="bi bi-person-add"></i> Tambah Data</a>
                            <a href="{{ route('mentor.exportExcels') }}" class="btn btn-sm btn-success"><i class="bi bi-download"></i> Export</a>
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
                                <table class="table datatable table-hover" style="width:73%" id="mentorTable">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Nama</th>
                                            <th class="text-center">Email</th>
                                            <th class="text-center">No Telp</th>
                                            <th class="text-center" style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">Jenis Kelamin</th>
                                            {{-- <th class="text-center">Alamat</th> --}}
                                            {{-- <th>Alamat</th> --}}
                                            <th class="text-nowrap text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($mentor as $key => $m)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{ $m->nama }}</td>
                                                <td style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{ $m->email }}</td>
                                                <td class="text-center" style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{ $m->no_telp }}</td>
                                                <td >{{ $m->jenis_kelamin }}</td>
                                                {{-- <td style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{ $m->alamat }}</td> --}}
                                                {{-- <td>{{ $m->pendidikan }}</td> --}}
                                                <td class="text-nowrap me-4">
                                                    <a href="{{ route('mentor.show', $m->id) }}" class="btn btn-sm btn-outline-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail Data Siswa"><i class="bi bi-eye"></i></a>
                                                    <a href="{{ route('mentor.edit', $m->id) }}"  class="btn btn-sm btn-outline-warning"><i class="bi bi-pencil-square"></i></a>
                                                        <form action="{{ route('mentor.destroy', ['mentor' => $m->id]) }}"
                                                            method="POST" class="d-inline">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                class="btn btn-outline-danger btn-sm me-2 btn-delete" data-name="{{ $m->id . ' ' . $m->nama }}"><i
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
