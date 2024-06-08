<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Jumlah Siswa</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($paket_kelas as $key => $pk)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pk->nama_kelas }}</td>
                <td>RP. {{ number_format($pk->harga, 0, ',', '.') }}</td>
                <td>{{ $pk->siswa_count }}</td>
        @endforeach
    </tbody>
</table>
