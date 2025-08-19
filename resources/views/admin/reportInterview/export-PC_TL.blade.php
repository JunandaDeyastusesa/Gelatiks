<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Risalah Interview PC/TL</title>
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

        /* Penyesuaian lebar kolom agar totalnya 100% */
        .w-15 {
            width: 15%;
        }

        .w-45 {
            width: 45%;
        }

        /* Tambahan pada CSS Anda */
        .w-50 {
            width: 50%;
        }

        .w-28 {
            /* Lebar kolom kiri untuk teks label */
            width: 28%;
        }

        .w-42 {
            /* Lebar kolom kanan untuk teks label */
            width: 42%;
        }

        .w-28 {
            width: 28%;
        }

        .col-2 {
            width: 20%;
        }

        .col-6 {
            width: 60%;
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

        /* Pengaturan halaman untuk A4 */
        @page {
            size: A4;
            margin: 10mm 10mm 20mm 10mm;
            /* Atas, Kanan, Bawah, Kiri */
        }
    </style>
</head>

<body>
    @php
        use Carbon\Carbon;
        function rateCells($val)
        {
            $html = '';
            for ($i = 1; $i <= 10; $i++) {
                $filled = (int) $val === $i ? '<span class="filled"></span>' : '';
                $html .= '<td class="center"><span class="box">' . $filled . '</span></td>';
            }
            return $html;
        }
    @endphp

    {{-- Header --}}
    <table class="no-border">
        <tr>
            <td class="nowrap">P1.03</td>
            <td class="center heading">RISALAH INTERVIEW PC / TL</td>
            <td class="right nowrap">LST</td>
        </tr>
    </table>

    {{-- Biodata --}}
    {{-- Biodata (versi baru, seperti di gambar) --}}
    <table class="no-border" style="margin-top:10px;">
        <tbody>
            <tr>
                <td class="w-15 nowrap">Nama</td>
                <td class="w-45">: {{ $reportInterview->jobApply->user->profile->namaLengkap }}</td>
                <td class="w-15 nowrap">No tes</td>
                <td class="w-25">: {{ $reportInterview->no_tes }}</td>
            </tr>
            <tr>
                <td class="w-15 nowrap">Tgl Lahir / Usia</td>
                <td class="w-45">:
                    {{ $reportInterview->jobApply->user->profile->kelahiran }}
                    /
                    {{ $reportInterview->jobApply->user->profile->kelahiran ? Carbon::parse($reportInterview->jobApply->user->profile->kelahiran)->age : '-' }}
                    Tahun
                </td>
                <td class="w-15 nowrap">Tujuan Tes</td>
                <td class="w-25">: {{ $reportInterview->tujuan_tes }}</td>
            </tr>
            <tr>
                <td class="w-15 nowrap">Pendidikan</td>
                <td class="w-45">: {{ $reportInterview->jobApply->user->profile->pendidikan }}</td>
                <td class="w-15 nowrap">Tanggal Tes</td>
                <td class="w-25">: {{ Carbon::parse($reportInterview->tanggal_tes)->format('d M Y') }}</td>
            </tr>
        </tbody>
    </table>

    <br>

    {{-- Table Penilaian --}}
    <table>
        <thead>
            <tr class="center">
                <th rowspan="2">Competency</th>
                <th rowspan="2">Definisi</th>
                <th colspan="10">Skor</th>
            </tr>
            <tr class="center">
                <th>1</th>
                <th>2</th>
                <th>3</th>
                <th>4</th>
                <th>5</th>
                <th>6</th>
                <th>7</th>
                <th>8</th>
                <th>9</th>
                <th>10</th>
            </tr>
        </thead>

        <tbody>
            {{-- A. Core Competency --}}
            <tr>
                <td class="section-title" colspan="12">A. Core Competency</td>
            </tr>

            <tr class="center">
                <td class="text-start col-2">ANALYTICAL THINKING</td>
                <td class="text-start col-6">
                    Kemampuan mengenali/mengidentifikasikan hubungan sebab-akibat/jika-mana, serta menyikapi dan membuat
                    keputusan.
                </td>
                {!! rateCells($reportInterview->analytical_thinking) !!}
            </tr>
            <tr class="center">
                <td class="text-start col-2">ACHIEVEMENT ORIENTATION</td>
                <td class="text-start col-6">
                    Upaya menyelesaikan tugas dengan tuntas dan mencapai standar kerja terbaik.
                </td>
                {!! rateCells($reportInterview->achievement_orientation) !!}
            </tr>
            <tr class="center">
                <td class="text-start col-2">INTEGRITY</td>
                <td class="text-start col-6">
                    Menunjukkan kemauan untuk melaksanakan tugas sesuai etika yang berlaku, menjunjung tinggi nilai
                    kehormatan, kemuliaan, dan kepatuhan.
                </td>
                {!! rateCells($reportInterview->integrity) !!}
            </tr>
            <tr class="center">
                <td class="text-start col-2">WILLINGNESS TO LEARN</td>
                <td class="text-start col-6">
                    Kemauan memahami dan menerapkan informasi baru untuk meningkatkan pengetahuan dan kompetensi.
                </td>
                {!! rateCells($reportInterview->willingness_to_learn) !!}
            </tr>

            {{-- B. Competency --}}
            <tr>
                <td class="section-title" colspan="12">B. Competency</td>
            </tr>

            <tr class="center">
                <td class="text-start col-2">SELF CONFIDENCE</td>
                <td class="text-start col-6">
                    Keyakinan atas kemampuan diri dan obyektifitas dalam menilai kemampuan tersebut.
                </td>
                {!! rateCells($reportInterview->self_confidence) !!}
            </tr>
            <tr class="center">
                <td class="text-start col-2">ADAPTABILITY</td>
                <td class="text-start col-6">
                    Kemampuan menyesuaikan diri terhadap perubahan (lingkungan, tugas, budaya) dengan tetap efektif.
                </td>
                {!! rateCells($reportInterview->adaptability) !!}
            </tr>
            <tr class="center">
                <td class="text-start col-2">TEAMWORK</td>
                <td class="text-start col-6">
                    Mampu menjalin kerjasama, peka terhadap kebutuhan orang lain, dan berkontribusi pada aktivitas
                    kelompok.
                </td>
                {!! rateCells($reportInterview->teamwork) !!}
            </tr>
            <tr class="center">
                <td class="text-start col-2">INTERPERSONAL SKILL</td>
                <td class="text-start col-6">
                    Minat dan perhatian pada orang lain, menciptakan impresi baik, serta mampu menjalin hubungan dengan
                    berbagai kalangan.
                </td>
                {!! rateCells($reportInterview->interpersonal_skills) !!}
            </tr>
            <tr class="center">
                <td class="text-start col-2">COMMUNICATION</td>
                <td class="text-start col-6">
                    Kemampuan menerima dan memberikan informasi secara efektif.
                </td>
                {!! rateCells($reportInterview->communication) !!}
            </tr>

            {{-- C. Functional Competency --}}
            <tr style="page-break-after: avoid; break-after: avoid;">
                <td class="section-title" colspan="12" style="padding-top:15px;">
                    C. Functional Competency
                </td>
            </tr>

            <tr class="center">
                <td class="text-start col-2">KNOWLEDGE</td>
                <td class="text-start col-6">
                    Penguasaan ilmu yang berhubungan dengan pekerjaan.
                </td>
                {!! rateCells($reportInterview->knowledge) !!}
            </tr>

            <tr class="center">
                <td class="text-start col-2">SKILL</td>
                <td class="text-start col-6">
                    Penguasaan praktis dalam mengaplikasikan ilmu pengetahuan.
                </td>
                {!! rateCells($reportInterview->skill) !!}
            </tr>

            {{-- Notes --}}
            <tr>
                <td class="no-border pt-0" colspan="12">
                    <div class="mb-8"><strong>Catatan (Bila ada):</strong></div>
                    <div>{{ $reportInterview->catatan ?: 'Tidak ada catatan' }}</div>
                </td>
            </tr>

            <tr>
                <!-- Kesimpulan -->
                <td colspan="4" class="p-0">
                    <div style="padding:8px;">
                        <div class="heading">Kesimpulan</div>
                        <div>
                            <div>{{ $reportInterview->hasil_seleksi === 'Sesuai' ? '●' : '○' }} Kualifikasi yang
                                dimiliki sudah sesuai dengan kriteria yang dibutuhkan</div>
                            <div>{{ $reportInterview->hasil_seleksi === 'Dipertimbangkan' ? '●' : '○' }} Masih dapat
                                dipertimbangkan</div>
                            <div>{{ $reportInterview->hasil_seleksi === 'Ditolak' ? '●' : '○' }} Ditolak</div>
                        </div>

                        <div class="small" style="margin-top:10px;">
                            <strong>Note</strong><br>
                            1. Poor (1-4) = Potensi di bawah kapasitas yang dibutuhkan<br>
                            2. Acceptable (5-7) = Potensi sesuai kapasitas<br>
                            3. Excellent (8-10) = Potensi sangat menonjol<br>
                            4. Aspek utama: <span class="heading small">Analytical Thinking, Achievement Orientation,
                                Integrity, Willingness to Learn</span><br>
                            5. Aspek lain: Adaptability, Teamwork, Interpersonal Skill, Self Confidence, Communication,
                            Knowledge, Skill
                        </div>
                    </div>
                </td>

                <!-- Pewawancara -->
                <td class="center" colspan="8">
                    <div>{{ $reportInterview->kota_tes }},
                        {{ Carbon::parse($reportInterview->tanggal_tes)->format('d M Y') }}
                    </div>

                    <!-- Jarak kosong lebih besar untuk tanda tangan -->
                    <div style="height:64px;"></div>

                    <!-- Nama Pewawancara -->
                    <div class="heading">Pewawancara: {{ $reportInterview->hr->username }}</div>

                    <!-- Jarak kecil sebelum keterangan -->
                    <div class="small" style="margin-top:16px;">
                        {{ $reportInterview->ket }}
                    </div>
                </td>

            </tr>

        </tbody>
    </table>
</body>

</html>
