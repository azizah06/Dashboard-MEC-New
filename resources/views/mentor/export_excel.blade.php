<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>No Telp</th>
            <th>Jenis Kelamin</th>
            <th>Pendidikan</th>
            <th>Alamat</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($mentor as $m)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $m->nama }}</td>
                <td>{{ $m->email }}</td>
                <td>{{ $m->no_telp }}</td>
                <td>{{ $m->jenis_kelamin }}</td>
                <td>{{ $m->pendidikan }}</td>
                <td>{{ $m->alamat }}</td>
        @endforeach
    </tbody>
</table>
