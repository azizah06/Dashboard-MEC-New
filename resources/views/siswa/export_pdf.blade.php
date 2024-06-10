<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Tanggal Lahir</th>
            <th>No Telp</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($siswa as $key => $s)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $s->nama }}</td>
                <td>{{ $s->tgl_lahir }}</td>
                <td>{{ $s->no_telp }}</td>
                <td>{{ $s->jenis_kelamin }}</td>
                <td>{{ $s->alamat }}</td>
        @endforeach
    </tbody>
</table>
