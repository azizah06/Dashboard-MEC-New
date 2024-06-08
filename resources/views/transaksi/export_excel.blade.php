<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Bayar</th>
            <th>Nama Siswa</th>
            <th>Paket Kelas</th>
            <th>Tanggal Bayar</th>
            <th>Nominal Bayar</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($transaksi as $j)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td class="text-left" >{{ $j->kd_bayar }}</td>
                <td>{{ $j->nama_siswa }}</td>
                <td>{{ $j->paket_kelas }}</td>
                <td>{{ $j->tgl_bayar }}</td>
                <td>RP. {{ number_format($j->harga_bayar, 0, ',', '.') }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
