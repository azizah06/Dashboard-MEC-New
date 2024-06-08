<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Hari</th>
            <th>Paket Kelas</th>
            <th>Mentor</th>
            <th>Waktu</th>
            <th>Ruangan</th>
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
        @endforeach
    </tbody>
</table>
