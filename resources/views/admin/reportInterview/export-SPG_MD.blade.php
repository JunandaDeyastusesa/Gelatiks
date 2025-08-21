<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Risalah Interview SPG / MD</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 11px;
            margin: 24px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 6px 6px;
            vertical-align: top;
        }

        .no-border th,
        .no-border td {
            border: none;
            padding: 2px 0;
        }

        .center {
            text-align: center;
        }

        .right {
            text-align: right;
        }

        .heading {
            font-weight: 700;
        }

        .section-title {
            border: none;
            padding: 10px 0 2px 0;
            font-weight: 700;
        }

        .muted {
            color: #333;
        }

        .small {
            font-size: 10px;
        }

        .w-15 {
            width: 15%;
        }

        .w-45 {
            width: 45%;
        }

        .p-0 {
            padding: 0;
        }

        .pt-0 {
            padding-top: 0;
        }

        .mb-8 {
            margin-bottom: 8px;
        }

        .checkbox {
            font-family: DejaVu Sans, sans-serif;
        }

        .box {
            display: inline-block;
            width: 12px;
            height: 12px;
            border: 1px solid #000;
            margin: 0 2px;
        }

        .filled {
            background: #000;
            width: 100%;
            height: 100%;
            display: block;
        }

        .nowrap {
            white-space: nowrap;
        }

        @page {
            margin-left: 10mm;
            margin-right: 10mm;
        }

    </style>
</head>

<body>
    @php
        use Carbon\Carbon;
        function rateCells($val)
        {
            // render 1..5 kotak, isi kotak yang sesuai nilainya
            $html = '';
            for ($i = 1; $i <= 5; $i++) {
                $filled = (int) $val === $i ? '<span class="filled"></span>' : '';
                $html .= '<td class="center"><span class="box">' . $filled . '</span></td>';
            }
            return $html;
        }
        function ynCells($val)
        {
            // Kotak Ya / Tidak
            $ya = $val === 'Ya' ? '<span class="filled"></span>' : '';
            $tdk = $val === 'Tidak' ? '<span class="filled"></span>' : '';

            // Hasilkan 2 sel untuk Ya, 3 sel untuk Tidak
            $html = '';
            $html .= '<td class="center" colspan="2"><span class="box">' . $ya . '</span> Ya</td>';
            $html .= '<td class="center" colspan="3"><span class="box">' . $tdk . '</span> Tidak</td>';

            return $html;
        }

    @endphp

    {{-- Header --}}
    <table class="no-border">
        <tr>
            <td class="nowrap">P1.03</td>
            <td class="center heading">RISALAH INTERVIEW SPG / MD</td>
            <td class="right nowrap">LST</td>
        </tr>
    </table>

    {{-- Biodata --}}
    <table class="no-border" style="margin-top:10px;">
        <tr>
            <td style="width:28%;">Nama</td>
            <td>: {{ $reportInterview->jobApply->user->profile->namaLengkap }}</td>
        </tr>
        <tr>
            <td>Tgl Lahir / Usia</td>
            <td>:
                {{ $reportInterview->jobApply->user->profile->kelahiran }}
                /
                {{ $reportInterview->jobApply->user->profile->kelahiran
                    ? Carbon::parse($reportInterview->jobApply->user->profile->kelahiran)->age
                    : '-' }}
            </td>
        </tr>
        <tr>
            <td>Tanggal Interview</td>
            <td>: {{ Carbon::parse($reportInterview->tanggal_tes)->format('d M Y') }}</td>
        </tr>
    </table>

    <br>

    {{-- Table Penilaian --}}
    <table>
        <thead>
            <tr class="center">
                <th class="w-15" rowspan="2">ASPEK</th>
                <th class="w-45" rowspan="2">PARAMATER MINIMAL</th>
                <th colspan="5">Penilaian</th>
                <th rowspan="2">Keterangan</th>
            </tr>
            <tr class="center">
                <th>1</th>
                <th>2</th>
                <th>3</th>
                <th>4</th>
                <th>5</th>
            </tr>
        </thead>

        {{-- A. Communication Skill --}}
        <tr>
            <td class="section-title" colspan="8">A. Communication Skill</td>
        </tr>

        {{-- PENAMPILAN --}}
        <tr>
            <td rowspan="3">PENAMPILAN</td>
            <td>a. Sopan &amp; Rapi</td>
            {!! rateCells($reportInterview->penampilan_sopan_rapi) !!}
            <td rowspan="3">{{ $reportInterview->catatan_penampilan ?: 'Tidak ada catatan' }}</td>
        </tr>
        <tr>
            <td>b. Sesuai dengan posisi yang dilamar</td>
            {!! rateCells($reportInterview->penampilan_sesuai_posisi) !!}
        </tr>
        <tr>
            <td>c. Memiliki rasa percaya diri yang memadai</td>
            {!! rateCells($reportInterview->penampilan_pede) !!}
        </tr>

        {{-- CARA BERKOMUNIKASI --}}
        <tr>
            <td rowspan="3">CARA BERKOMUNIKASI</td>
            <td>a. Mampu berkomunikasi dengan baik</td>
            {!! rateCells($reportInterview->komunikasi_baik) !!}
            <td rowspan="3">{{ $reportInterview->catatan_komunikasi ?: 'Tidak ada catatan' }}</td>
        </tr>
        <tr>
            <td>b. Memberikan penjelasan runtut &amp; mudah dipahami</td>
            {!! rateCells($reportInterview->komunikasi_runtut) !!}
        </tr>
        <tr>
            <td>c. Menjelaskan secara langsung, tegas, dan lugas</td>
            {!! rateCells($reportInterview->komunikasi_tegas) !!}
        </tr>

        {{-- PENDIDIKAN --}}
        <tr>
            <td>PENDIDIKAN</td>
            <td>a. Sesuai dengan posisi yang dilamar</td>
            {!! rateCells($reportInterview->pendidikan_sesuai) !!}
            <td>{{ $reportInterview->catatan_pendidikan ?: 'Tidak ada catatan' }}</td>
        </tr>

        {{-- LATAR BELAKANG --}}
        <tr>
            <td rowspan="4">LATAR BELAKANG</td>
            <td>a. Tempat tinggal sesuai lokasi/penempatan</td>
            {!! rateCells($reportInterview->latar_tempat_tinggal) !!}
            <td rowspan="4">{{ $reportInterview->catatan_latar ?: 'Tidak ada catatan' }}</td>
        </tr>
        <tr>
            <td>b. Bersedia ditempatkan pada area/lokasi kerja yang jauh</td>
            {!! rateCells($reportInterview->latar_penempatan) !!}
        </tr>
        <tr>
            <td>c. Memiliki riwayat kesehatan yang baik</td>
            {!! rateCells($reportInterview->latar_kesehatan) !!}
        </tr>
        <tr>
            <td>d. Tidak pernah terlibat kasus narkoba/kriminalitas</td>
            {!! rateCells($reportInterview->latar_hukum) !!}
        </tr>

        {{-- B. SKA --}}
        <tr>
            <td class="section-title" colspan="8">B. Skill / Knowledge / Attitude (SKA)</td>
        </tr>

        {{-- SKILL --}}
        <tr>
            <td rowspan="4">SKILL</td>
            <td>a. Skill sesuai posisi</td>
            {!! rateCells($reportInterview->skill_sesuai) !!}
            <td rowspan="4">{{ $reportInterview->catatan_skill ?: 'Tidak ada catatan' }}</td>
        </tr>
        <tr>
            <td>b. Koordinasi kerja</td>
            {!! rateCells($reportInterview->skill_koordinasi) !!}
        </tr>
        <tr>
            <td>c. Negosiasi</td>
            {!! rateCells($reportInterview->skill_negosiasi) !!}
        </tr>
        <tr>
            <td>d. Aplikasi/praktis</td>
            {!! rateCells($reportInterview->skill_aplikasi) !!}
        </tr>

        {{-- KNOWLEDGE --}}
        <tr>
            <td rowspan="5">KNOWLEDGE</td>
            <td>a. Memahami jenis pekerjaan</td>
            {!! rateCells($reportInterview->knowledge_pekerjaan) !!}
            <td rowspan="5">{{ $reportInterview->catatan_knowledge ?: 'Tidak ada catatan' }}</td>
        </tr>
        <tr>
            <td>b. Memahami tugas yang dilakukan</td>
            {!! rateCells($reportInterview->knowledge_tugas) !!}
        </tr>
        <tr>
            <td>c. Pemahaman kerja tim</td>
            {!! rateCells($reportInterview->knowledge_team) !!}
        </tr>
        <tr>
            <td>d. Bekerja di bawah tekanan</td>
            {!! rateCells($reportInterview->knowledge_pressure) !!}
        </tr>
        <tr>
            <td>e. Dasar-dasar digital knowledge</td>
            {!! rateCells($reportInterview->knowledge_digital) !!}
        </tr>

        {{-- ATTITUDE --}}
        <tr>
            <td rowspan="3">ATTITUDE</td>
            <td>a. Menempatkan diri (bawahan/atasan)</td>
            {!! rateCells($reportInterview->attitude_posisi) !!}
            <td rowspan="3">{{ $reportInterview->catatan_attitude ?: 'Tidak ada catatan' }}</td>
        </tr>
        <tr>
            <td>b. Sikap menerima kritik</td>
            {!! rateCells($reportInterview->attitude_kritikan) !!}
        </tr>
        <tr>
            <td>c. Sikap kerja positif</td>
            {!! rateCells($reportInterview->attitude_positif) !!}
        </tr>

        {{-- C. Motivasi --}}
        <tr>
            <td class="section-title" colspan="8">C. Motivasi</td>
        </tr>
        <tr>
            <td rowspan="3">MOTIVASI</td>
            <td>a. Dorongan mencapai target & prestasi</td>
            {!! rateCells($reportInterview->motivasi_target) !!}
            <td rowspan="3">{{ $reportInterview->catatan_motivasi ?: 'Tidak ada catatan' }}</td>
        </tr>
        <tr>
            <td>b. Tujuan/harapan 0–6 bulan</td>
            {!! rateCells($reportInterview->motivasi_tujuan) !!}
        </tr>
        <tr>
            <td>c. Ciptakan suasana kondusif</td>
            {!! rateCells($reportInterview->motivasi_suasana) !!}
        </tr>

        {{-- D. Experience --}}
        <tr>
            <td class="section-title" colspan="8">D. Experience</td>
        </tr>
        <tr>
            <td rowspan="3">EXPERIENCE</td>
            <td>a. Penguasaan ilmu terkait</td>
            {!! rateCells($reportInterview->exp_ilmu) !!}
            <td rowspan="3">{{ $reportInterview->catatan_experience ?: 'Tidak ada catatan' }}</td>
        </tr>
        <tr>
            <td>b. Pengalaman sesuai posisi</td>
            {!! rateCells($reportInterview->exp_posisi) !!}
        </tr>
        <tr>
            <td>c. Alasan pindah kerja</td>
            {!! rateCells($reportInterview->exp_alasan) !!}
        </tr>

        {{-- E. Tambahan --}}
        <tr>
            <td class="section-title" colspan="8">E. Tambahan</td>
        </tr>

        <tr>
            <td>BPJS KESEHATAN</td>
            <td>Kesiapan perpindahan status BPJS Kesehatan mandiri ke Badan Usaha</td>
            {!! ynCells($reportInterview->bpjs) !!}
            <td>{{ $reportInterview->catatan_bpjs ?: 'Tidak ada catatan' }}</td>
        </tr>

        <tr>
            <td rowspan="2">ALAT KOMUNIKASI</td>
            <td>a. Memiliki alat komunikasi yang dibutuhkan (sesuai project)</td>
            {!! ynCells($reportInterview->alat_ada) !!}
            <td rowspan="2">{{ $reportInterview->catatan_alat ?: 'Tidak ada catatan' }}</td>
        </tr>
        <tr>
            <td>b. Jika tidak, siap membeli/mengganti</td>
            {!! ynCells($reportInterview->alat_beli) !!}
        </tr>

        {{-- Catatan --}}
        <tr>
            <td class="no-border" colspan="8">
                <div class="mb-8"><strong>Catatan (Bila ada):</strong></div>
                <div>{{ $reportInterview->catatan ?: 'Tidak ada catatan' }}</div>
            </td>
        </tr>

        {{-- Kesimpulan + TTD --}}
        {{-- <tr>
            <td colspan="3" style="font-size:12px;">...</td>
            <td class="center" colspan="5">...</td>
        </tr> --}}

        {{-- Kesimpulan + TTD --}}
        <tr>
            <td colspan="3" style="font-size:11px;">
                <div class="heading">Kesimpulan</div>
                @php
                    $hs = $reportInterview->hasil_seleksi;
                @endphp

                <div>{{ $hs === 'Sesuai' ? '●' : '○' }} Kualifikasi yang dimiliki sudah sesuai dengan kriteria yang
                    dibutuhkan</div>
                <div>{{ $hs === 'Dipertimbangkan' ? '●' : '○' }} Masih dapat dipertimbangkan</div>
                <div>{{ $hs === 'Ditolak' ? '●' : '○' }} Ditolak</div>

                <div class="small" style="margin-top:10px;">
                    <strong>Note</strong><br>
                    1. Poor (1–2) : Potensinya di bawah kapasitas yang dibutuhkan<br>
                    2. Acceptable (3–4) : Potensinya cukup sesuai dengan kapasitas yang dibutuhkan<br>
                    3. Excellent (5) : Potensinya sangat menonjol, jauh di atas kapasitas yang dibutuhkan
                </div>
            </td>


            <td class="center" colspan="5">
                <div>{{ $reportInterview->kota_tes }},
                    {{ Carbon::parse($reportInterview->tanggal_tes)->format('d M Y') }}</div>
                <div style="height:64px;"></div>
                <div class="heading">Pewawancara: {{ $pewawancara }}</div>
                <div class="small" style="margin-top:16px;">{{ $reportInterview->ket }}</div>
            </td>
        </tr>

    </table>

</body>

</html>
