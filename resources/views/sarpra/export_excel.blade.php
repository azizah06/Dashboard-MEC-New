<table>
    <thead>
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">Ruangan</th>
            <th class="text-center">Kapasitas Siswa</th>
            <th class="text-center">Barang Baik</th>
            <th class="text-center">Barang Rusak</th>
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
        @endforeach
    </tbody>
</table>
