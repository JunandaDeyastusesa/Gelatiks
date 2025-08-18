<table>
    <thead>
        <tr>
            <th rowspan="2">No</th>
            <th rowspan="2">Username</th>
            <th rowspan="2">Nama Lengkap</th>
            <th rowspan="2">Kelahiran</th>
            <th rowspan="2">Jenis Kelamin</th>
            <th rowspan="2">Telepon</th>
            <th rowspan="2">Email</th>
            <th rowspan="2">Pendidikan</th>
            <th rowspan="2">Domisili</th>
            <th colspan="5" style="text-align: center;">Pengalaman Kerja 1</th>
            <th colspan="5" style="text-align: center;">Pengalaman Kerja 2</th>
            <th colspan="5" style="text-align: center;">Pengalaman Kerja 3</th>
        </tr>
        <tr>
            <th><b>Nama Perusahaan</b></th>
            <th><b>Tahun</b></th>
            <th><b>Posisi</b></th>
            <th><b>Produk</b></th>
            <th><b>Alasan</b></th>
            <th><b>Nama Perusahaan</b></th>
            <th><b>Tahun</b></th>
            <th><b>Posisi</b></th>
            <th><b>Produk</b></th>
            <th><b>Alasan</b></th>
            <th><b>Nama Perusahaan</b></th>
            <th><b>Tahun</b></th>
            <th><b>Posisi</b></th>
            <th><b>Produk</b></th>
            <th><b>Alasan</b></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($applys as $index => $applicant)
            @php
                // pecah pengalaman kerja menjadi array
                $pengKerja1 = array_map('trim', explode('|', $applicant->profile->pengKerja1 ?? ''));
                $pengKerja2 = array_map('trim', explode('|', $applicant->profile->pengKerja2 ?? ''));
                $pengKerja3 = array_map('trim', explode('|', $applicant->profile->pengKerja3 ?? ''));
            @endphp
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $applicant->username ?? '-' }}</td>
                <td>{{ $applicant->profile->namaLengkap ?? '-' }}</td>
                <td>{{ $applicant->profile->kelahiran ?? '-' }}</td>
                <td>{{ $applicant->profile->kelamin ?? '-' }}</td>
                <td>{{ $applicant->profile->telp ?? '-' }}</td>
                <td>{{ $applicant->email ?? '-' }}</td>
                <td>{{ $applicant->profile->pendidikan ?? '-' }}</td>
                <td>{{ $applicant->profile->domisili ?? '-' }}</td>

                <td>{{ $pengKerja1[0] ?? '-' }}</td>
                <td>{{ $pengKerja1[1] ?? '-' }}</td>
                <td>{{ $pengKerja1[2] ?? '-' }}</td>
                <td>{{ $pengKerja1[3] ?? '-' }}</td>
                <td>{{ $pengKerja1[4] ?? '-' }}</td>

                <td>{{ $pengKerja2[0] ?? '-' }}</td>
                <td>{{ $pengKerja2[1] ?? '-' }}</td>
                <td>{{ $pengKerja2[2] ?? '-' }}</td>
                <td>{{ $pengKerja2[3] ?? '-' }}</td>
                <td>{{ $pengKerja2[4] ?? '-' }}</td>

                <td>{{ $pengKerja3[0] ?? '-' }}</td>
                <td>{{ $pengKerja3[1] ?? '-' }}</td>
                <td>{{ $pengKerja3[2] ?? '-' }}</td>
                <td>{{ $pengKerja3[3] ?? '-' }}</td>
                <td>{{ $pengKerja3[4] ?? '-' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
