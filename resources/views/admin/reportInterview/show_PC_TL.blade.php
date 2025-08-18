@extends('layouts.admin.app')

@section('title', 'Gelatik Supra')
@section('nav-title', 'Risalah Interview')

@section('content')
    @php
        use Carbon\Carbon;
        $today = Carbon::now(); // otomatis sesuai APP_TIMEZONE
    @endphp
    <div class="container-fluid mb-5">
        <a class="text-decoration-none text-secondary"
            href="{{ route('jobApplies.show', $ReportInterview->jobApply->id) }}"><i class="bi bi-arrow-left"></i> Back to
            Applicant</a>
        <h5 class="text-center mb-3">Risalah Interview PC/TL</h5>
        <div class="biodata">
            <table class="table table-borderless">
                <tbody>
                    <tr>
                        <td class="align-middle pb-0 col-2 text-muted">Nama</td>
                        <td class="align-middle pb-0 col-5 fw-medium">:
                            {{ $ReportInterview->jobApply->user->profile->namaLengkap }}</td>
                        <td class="align-middle pb-0 col-2 text-muted">No tes</td>
                        <td class="align-middle pb-0 fw-medium">
                            : {{ $ReportInterview->no_tes }}
                        </td>
                    </tr>
                    <tr>
                        <td class="align-middle pb-0 col-2 text-muted">Tgl Lahir / Usia</td>
                        <td class="align-middle pb-0 col-5 fw-medium">:
                            {{ $ReportInterview->jobApply->user->profile->kelahiran }} /
                            {{ $ReportInterview->jobApply->user->profile->kelahiran ? \Carbon\Carbon::parse($ReportInterview->jobApply->user->profile->kelahiran)->age : '-' }}
                            Tahun</td>
                        <td class="align-middle pb-0 col-2 text-muted">Tujuan Tes</td>
                        <td class="align-middle pb-0 fw-medium">
                            : {{ $ReportInterview->tujuan_tes }}
                        </td>

                    </tr>
                    <tr>
                        <td class="align-middle pb-0 col-2 text-muted">Pendiikan</td>
                        <td class="align-middle pb-0 col-5 fw-medium">:
                            {{ $ReportInterview->jobApply->user->profile->pendidikan }}</td>
                        <td class="align-middle pb-0 col-2 text-muted">Tanggal Tes</td>
                        <td class="align-middle pb-0 fw-medium">
                            : {{ \Carbon\Carbon::parse($ReportInterview->tanggal_tes)->format('d M Y') }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="point-interview mt-5">
            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th class="align-middle">Competency</th>
                        <th class="align-middle">Definisi</th>
                        <th>Skor</th>
                </thead>

                <tbody>
                    <!-- A. Core Competency -->
                    <tr>
                        <td class="fw-medium pt-4 border-0" colspan="12">A. Core Competency</td>
                    </tr>

                    <tr class="text-center align-middle">
                        <td class="text-start col-2">ANALYTICAL THINKING</td>
                        <td class="text-start col-6">
                            Kemampuan mengenali/mengidentifikasikan hubungan sebab-akibat/jika-mana,
                            serta menyikapi dan membuat keputusan.
                        </td>
                        <td>
                            <p>{{ $ReportInterview->analytical_thinking }}</p>
                        </td>
                    </tr>

                    <tr class="text-center align-middle">
                        <td class="text-start col-2">ACHIEVEMENT ORIENTATION</td>
                        <td class="text-start col-6">
                            Upaya menyelesaikan tugas dengan tuntas dan mencapai standar kerja terbaik.
                        </td>
                        <td>
                            <p>{{ $ReportInterview->achievement_orientation }}</p>
                        </td>
                    </tr>

                    <tr class="text-center align-middle">
                        <td class="text-start col-2">INTEGRITY</td>
                        <td class="text-start col-6">
                            Menunjukkan kemauan untuk melaksanakan tugas sesuai etika yang berlaku,
                            menjunjung tinggi nilai kehormatan, kemuliaan, dan kepatuhan.
                        </td>
                        <td>
                            <p>{{ $ReportInterview->integrity }}</p>
                        </td>
                    </tr>

                    <tr class="text-center align-middle">
                        <td class="text-start col-2">WILLINGNESS TO LEARN</td>
                        <td class="text-start col-6">
                            Kemauan memahami dan menerapkan informasi baru untuk meningkatkan pengetahuan
                            dan kompetensi.
                        </td>
                        <td>
                            <p>{{ $ReportInterview->willingness_to_learn }}</p>
                        </td>
                    </tr>

                    <!-- B. Competency -->
                    <tr>
                        <td class="fw-medium pt-4 border-0" colspan="12">B. Competency</td>
                    </tr>

                    <tr class="text-center align-middle">
                        <td class="text-start col-2">SELF CONFIDENCE</td>
                        <td class="text-start col-6">
                            Keyakinan atas kemampuan diri dan obyektifitas dalam menilai kemampuan tersebut.
                        </td>
                        <td>
                            <p>{{ $ReportInterview->self_confidence }}</p>
                        </td>
                    </tr>

                    <tr class="text-center align-middle">
                        <td class="text-start col-2">ADAPTABILITY</td>
                        <td class="text-start col-6">
                            Kemampuan menyesuaikan diri terhadap perubahan (lingkungan, tugas, budaya)
                            dengan tetap efektif.
                        </td>
                        <td>
                            <p>{{ $ReportInterview->adaptability }}</p>
                        </td>
                    </tr>

                    <tr class="text-center align-middle">
                        <td class="text-start col-2">TEAMWORK</td>
                        <td class="text-start col-6">
                            Mampu menjalin kerjasama, peka terhadap kebutuhan orang lain, dan berkontribusi
                            pada aktivitas kelompok.
                        </td>
                        <td>
                            <p>{{ $ReportInterview->teamwork }}</p>
                        </td>
                    </tr>

                    <tr class="text-center align-middle">
                        <td class="text-start col-2">INTERPERSONAL SKILL</td>
                        <td class="text-start col-6">
                            Minat dan perhatian pada orang lain, menciptakan impresi baik, serta mampu
                            menjalin hubungan dengan berbagai kalangan.
                        </td>
                        <td>
                            <p>{{ $ReportInterview->interpersonal_skills }}</p>
                        </td>
                    </tr>

                    <tr class="text-center align-middle">
                        <td class="text-start col-2">COMMUNICATION</td>
                        <td class="text-start col-6">
                            Kemampuan menerima dan memberikan informasi secara efektif.
                        </td>
                        <td>
                            <p>{{ $ReportInterview->communication }}</p>
                        </td>
                    </tr>

                    <!-- C. Functional Competency -->
                    <tr>
                        <td class="fw-medium pt-4 border-0" colspan="12">C. Functional Competency</td>
                    </tr>

                    <tr class="text-center align-middle">
                        <td class="text-start col-2">KNOWLEDGE</td>
                        <td class="text-start col-6">
                            Penguasaan ilmu yang berhubungan dengan pekerjaan.
                        </td>
                        <td>
                            <p>{{ $ReportInterview->knowledge }}</p>
                        </td>
                    </tr>

                    <tr class="text-center align-middle">
                        <td class="text-start col-2">SKILL</td>
                        <td class="text-start col-6">
                            Penguasaan praktis dalam mengaplikasikan ilmu pengetahuan.
                        </td>
                        <td>
                            <p>{{ $ReportInterview->skill }}</p>
                        </td>
                    </tr>

                    <!-- Notes -->
                    <tr>
                        <td class="border-0 pt-3 py-5" colspan="12">
                            <label for="catatan">Catatan (Bila ada):</label>
                            <p>{{ $ReportInterview->catatan }}</p>
                        </td>
                    </tr>

                    <!-- Kesimpulan & Pewawancara -->
                    <tr>
                        <td colspan="2" style="font-size: 14px">
                            <div class="kesimpulan">
                                <p class="fw-semibold">Kesimpulan</p>
                                <p>
                                    Kualifikasi sesuai kriteria, masih dapat dipertimbangkan, atau ditolak.
                                </p>
                            </div>
                            <div class="note pt-3">
                                <p class="fw-semibold">Note</p>
                                <p>1. Poor (1-4) = Potensi di bawah kapasitas yang dibutuhkan</p>
                                <p>2. Acceptable (5-7) = Potensi sesuai kapasitas</p>
                                <p>3. Excellent (8-10) = Potensi sangat menonjol</p>
                                <p>
                                    4. Aspek utama: <span class="fw-semibold fst-italic">
                                        Analytical Thinking, Achievement Orientation, Integrity,
                                        Willingness to Learn
                                    </span>
                                </p>
                                <p>
                                    5. Aspek lain: Adaptability, Teamwork, Interpersonal Skill,
                                    Self Confidence, Communication, Knowledge, Skill
                                </p>
                            </div>
                        </td>

                        <td class="align-middle" colspan="10">
                            <div class="text-center">
                                <div class="d-flex align-items-center justify-content-center">
                                    <p>{{ $ReportInterview->kota_tes }},
                                        {{ \Carbon\Carbon::parse($ReportInterview->tanggal_tes)->format('d M Y') }}
                                    </p>
                                </div>

                                <div class="mt-4">
                                    <p class="fw-semibold">Pewawancara: {{ $ReportInterview->hr->username }}</p>
                                    <div class="form-check mt-5" style="font-size: 13px">
                                        <p>{{ $ReportInterview->ket }}</p>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection
