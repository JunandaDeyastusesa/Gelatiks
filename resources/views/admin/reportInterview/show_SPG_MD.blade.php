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
        <h5 class="text-center mb-3">RISALAH INTERVIEW SPG / MD</h5>
        <div class="biodata">
            <table class="table table-borderless">
                <tbody>
                    <tr>
                        <td class="align-middle pb-0 col-1 text-muted">Nama</td>
                        <td class="align-middle pb-0 col-5 fw-medium">:
                            {{ $ReportInterview->jobApply->user->profile->namaLengkap }}</td>
                    </tr>
                    <tr>
                        <td class="align-middle pb-0 col-1 text-muted">Tgl Lahir / Usia</td>
                        <td class="align-middle pb-0 col-5 fw-medium">:
                            {{ $ReportInterview->jobApply->user->profile->kelahiran }} /
                            {{ $ReportInterview->jobApply->user->profile->kelahiran ? \Carbon\Carbon::parse($ReportInterview->jobApply->user->profile->kelahiran)->age : '-' }}
                        </td>

                    </tr>
                    <tr>
                        <td class="align-middle pb-0 col-1 text-muted">Tanggal Tes</td>
                        <td class="align-middle pb-0">
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
                        <th class="align-middle" rowspan="2">ASPEK</th>
                        <th class="align-middle" rowspan="2">PARAMATER MINIMAL</th>
                        <th>Penilaian</th>
                        <th class="align-middle" rowspan="2">Keterangan</th>
                    </tr>
                </thead>

                <tbody>
                    <!-- A. Comunication Skill -->
                    <tr>
                        <td class="fw-medium pt-4 border-0" colspan="12">A. Comunication Skill</td>
                    </tr>

                    <tr class="text-center align-middle">
                        <td class="text-start col-2" rowspan="3">PENAMPILAN</td>
                        <td class="text-start py-0 col-5">a. Sopan & Rapi</td>
                        <td>
                            <p>{{ $ReportInterview->penampilan_sopan_rapi }}</p>
                        </td>
                        <td rowspan="3">
                            <p>{{ $ReportInterview->catatan_penampilan ?? 'Tidak ada catatan' }}</p>
                        </td>
                    </tr>

                    <tr class="text-center align-middle">
                        <td class="text-start py-0">b. Sesuai dengan posisi yang dilamar</td>
                        <td>
                            <p>{{ $ReportInterview->penampilan_sesuai_posisi }}</p>
                        </td>
                    </tr>

                    <tr class="text-center align-middle">
                        <td class="text-start py-0">c. Memiliki rasa percaya diri yang memadai</td>
                        <td>
                            <p>{{ $ReportInterview->penampilan_pede }}</p>
                        </td>
                    </tr>

                    <!-- CARA BERKOMUNIKASI -->
                    <tr class="text-center align-middle">
                        <td class="text-start col-2" rowspan="3">CARA BERKOMUNIKASI</td>
                        <td class="text-start py-0 col-5">a. Mampu berkomunikasi dengan baik</td>
                        <td>
                            <p>{{ $ReportInterview->komunikasi_baik }}</p>
                        </td>
                        <td rowspan="3">
                            <p>{{ $ReportInterview->catatan_komunikasi ?? 'Tidak ada catatan' }}</p>
                        </td>
                    </tr>
                    <tr class="text-center align-middle">
                        <td class="text-start py-0">b. Memberikan penjelasan runtut & mudah dipahami</td>
                        <td>
                            <p>{{ $ReportInterview->komunikasi_runtut }}</p>
                        </td>
                    </tr>
                    <tr class="text-center align-middle">
                        <td class="text-start py-0">c. Menjelaskan secara langsung, tegas, dan lugas</td>
                        <td>
                            <p>{{ $ReportInterview->komunikasi_tegas }}</p>
                        </td>
                    </tr>

                    <!-- PENDIDIKAN -->
                    <tr class="text-center align-middle">
                        <td class="text-start col-2">PENDIDIKAN</td>
                        <td class="text-start py-0 col-5">a. Sesuai dengan posisi yang dilamar</td>
                        <td>
                            <p>{{ $ReportInterview->pendidikan_sesuai }}</p>
                        </td>
                        <td>
                            <p>{{ $ReportInterview->catatan_pendidikan ?? 'Tidak ada catatan' }}</p>
                        </td>
                    </tr>

                    <!-- LATAR BELAKANG -->
                    <tr class="text-center align-middle">
                        <td class="text-start col-2" rowspan="4">LATAR BELAKANG</td>
                        <td class="text-start py-0 col-5">a. Tempat tinggal sesuai lokasi/penempatan</td>
                        <td>
                            <p>{{ $ReportInterview->latar_tempat_tinggal }}</p>
                        </td>
                        <td rowspan="4">
                            <p>{{ $ReportInterview->catatan_latar ?? 'Tidak ada catatan' }}</p>
                        </td>
                    </tr>
                    <tr class="text-center align-middle">
                        <td class="text-start py-0">b. Bersedia ditempatkan pada area/lokasi kerja yang jauh dari tempat
                            tinggal saat ini</td>
                        <td>
                            <p>{{ $ReportInterview->latar_penempatan }}</p>
                        </td>
                    </tr>
                    <tr class="text-center align-middle">
                        <td class="text-start py-0">c. Memiliki riwayat kesehatan yang baik</td>
                        <td>
                            <p>{{ $ReportInterview->latar_kesehatan }}</p>
                        </td>
                    </tr>
                    <tr class="text-center align-middle">
                        <td class="text-start py-0">d. Tidak pernah berurusan dengan kepolisian perihal kasus
                            narkoba/kriminalitas dan sejenisnya</td>
                        <td>
                            <p>{{ $ReportInterview->latar_hukum }}</p>
                        </td>
                    </tr>

                    <!-- B. Skill / Knowledge / Attitude (SKA) -->
                    <tr>
                        <td class="fw-medium pt-4 border-0" colspan="12">B. Skill / Knowledge / Attitude (SKA)</td>
                    </tr>

                    <!-- SKILL -->
                    <tr class="text-center align-middle">
                        <td class="text-start col-2" rowspan="4">SKILL</td>
                        <td class="text-start py-0 col-5">a. Menguasai keterampilan/skill yang dibutuhkan dalam posisi
                            yang dilamar</td>
                        <td>
                            <p>{{ $ReportInterview->skill_sesuai }}</p>
                        </td>
                        <td rowspan="4">
                            <p>{{ $ReportInterview->catatan_skill ?? 'Tidak ada catatan' }}</p>
                        </td>
                    </tr>
                    <tr class="text-center align-middle">
                        <td class="text-start py-0">b. Mampu melakukan dan menjalankan koordinasi kerja</td>
                        <td>
                            <p>{{ $ReportInterview->skill_koordinasi }}</p>
                        </td>
                    </tr>
                    <tr class="text-center align-middle">
                        <td class="text-start py-0">c. Mampu bernegosiasi dengan pihak terkait dalam bekerja</td>
                        <td>
                            <p>{{ $ReportInterview->skill_negosiasi }}</p>
                        </td>
                    </tr>
                    <tr class="text-center align-middle">
                        <td class="text-start py-0">d. Penguasaan praktis dalam mengaplikasikan ilmu pengetahuannya
                        </td>
                        <td>
                            <p>{{ $ReportInterview->skill_aplikasi }}</p>
                        </td>
                    </tr>

                    <!-- KNOWLEDGE -->
                    <tr class="text-center align-middle">
                        <td class="text-start col-2" rowspan="5">KNOWLEDGE</td>
                        <td class="text-start py-0 col-5">a. Mengetahui dan memahami jenis pekerjaan yang dilamar</td>
                        <td>
                            <p>{{ $ReportInterview->knowledge_pekerjaan }}</p>
                        </td>
                        <td rowspan="5">
                            <p>{{ $ReportInterview->catatan_knowledge ?? 'Tidak ada catatan' }}</p>
                        </td>
                    </tr>
                    <tr class="text-center align-middle">
                        <td class="text-start py-0">b. Mengetahui dan memahami tentang pekerjaan yang akan dilakukan
                        </td>
                        <td>
                            <p>{{ $ReportInterview->knowledge_tugas }}</p>
                        </td>
                    </tr>
                    <tr class="text-center align-middle">
                        <td class="text-start py-0">c. Pemahaman bekerja dalam team</td>
                        <td>
                            <p>{{ $ReportInterview->knowledge_team }}</p>
                        </td>
                    </tr>
                    <tr class="text-center align-middle">
                        <td class="text-start py-0">d. Pemahaman bekerja dibawah tekanan</td>
                        <td>
                            <p>{{ $ReportInterview->knowledge_pressure }}</p>
                        </td>
                    </tr>
                    <tr class="text-center align-middle">
                        <td class="text-start py-0">e. Pemahaman tentang dasar - dasar digital knowledge</td>
                        <td>
                            <p>{{ $ReportInterview->knowledge_digital }}</p>
                        </td>
                    </tr>

                    <!-- ATTITUDE -->
                    <tr class="text-center align-middle">
                        <td class="text-start col-2" rowspan="3">ATTITUDE</td>
                        <td class="text-start py-0 col-5">a. Mampu menempatkan diri sebagai bawahan maupun atasan</td>
                        <td>
                            <p>{{ $ReportInterview->attitude_posisi }}</p>
                        </td>
                        <td rowspan="3">
                            <p>{{ $ReportInterview->catatan_attitude ?? 'Tidak ada catatan' }}</p>
                        </td>
                    </tr>
                    <tr class="text-center align-middle">
                        <td class="text-start py-0">b. Sikap yang dilakukan jika menerima kritikan</td>
                        <td>
                            <p>{{ $ReportInterview->attitude_kritikan }}</p>
                        </td>
                    </tr>
                    <tr class="text-center align-middle">
                        <td class="text-start py-0">c. Bisa menunjukan sikap kerja yang positive</td>
                        <td>
                            <p>{{ $ReportInterview->attitude_positif }}</p>
                        </td>
                    </tr>

                    <!-- C. Motivasi -->
                    <tr>
                        <td class="fw-medium pt-4 border-0" colspan="12">C. Motivasi</td>
                    </tr>

                    <!-- MOTIVASI -->
                    <tr class="text-center align-middle">
                        <td class="text-start col-2" rowspan="3">MOTIVASI</td>
                        <td class="text-start py-0 col-5">a. Memiliki dorongan yang kuat untuk melakukan sesuatu,
                            mencapai target dan berprestasi</td>
                        <td>
                            <p>{{ $ReportInterview->motivasi_target }}</p>
                        </td>
                        <td rowspan="3">
                            <p>{{ $ReportInterview->catatan_motivasi ?? 'Tidak ada catatan' }}</p>
                        </td>
                    </tr>
                    <tr class="text-center align-middle">
                        <td class="text-start py-0">b. Memiliki tujuan atau harapan yang harus diraih saat ini atau 6
                            bulan kedepan</td>
                        <td>
                            <p>{{ $ReportInterview->motivasi_tujuan }}</p>
                        </td>
                    </tr>
                    <tr class="text-center align-middle">
                        <td class="text-start py-0">c. Mampu menciptakan suasana kerja yang kondusif</td>
                        <td>
                            <p>{{ $ReportInterview->motivasi_suasana }}</p>
                        </td>
                    </tr>

                    <!-- D. Experience -->
                    <tr>
                        <td class="fw-medium pt-4 border-0" colspan="12">D. Experience</td>
                    </tr>

                    <!-- EXPERIENCE -->
                    <tr class="text-center align-middle">
                        <td class="text-start col-2" rowspan="3">EXPERIENCE</td>
                        <td class="text-start py-0 col-5">a. Penguasaan ilmu yang berhubungan dengan pekerjaan</td>
                        <td>
                            <p>{{ $ReportInterview->exp_ilmu }}</p>
                        </td>
                        <td rowspan="3">
                            <p>{{ $ReportInterview->catatan_experience ?? 'Tidak ada catatan' }}</p>
                        </td>
                    </tr>
                    <tr class="text-center align-middle">
                        <td class="text-start py-0">b. Memiliki penngalaman kerja sesuai dengan posisi yang dilamar
                        </td>
                        <td>
                            <p>{{ $ReportInterview->exp_posisi }}</p>
                        </td>
                    </tr>
                    <tr class="text-center align-middle">
                        <td class="text-start py-0">c. Alasan dalam memutuskan pindah pekerjaan</td>
                        <td>
                            <p>{{ $ReportInterview->exp_alasan }}</p>
                        </td>
                    </tr>

                    <!-- E. Tambahan -->
                    <tr>
                        <td class="fw-medium pt-4 border-0" colspan="12">E. Tambahan</td>
                    </tr>

                    <!-- BPJS KESEHATAN -->
                    <tr class="text-center align-middle">
                        <td class="text-start col-2">BPJS KESEHATAN</td>
                        <td class="text-start py-0 col-5">Kesiapan perpindahan status BPJS Kesehatan mandiri ke Badan
                            Usaha</td>
                        <td>
                            <p>{{ $ReportInterview->bpjs }}</p>
                        </td>
                        <td>
                            <p>{{ $ReportInterview->catatan_bpjs ?? 'Tidak ada catatan' }}</p>
                        </td>
                    </tr>

                    <!-- ALAT KOMUNIKASI -->
                    <tr class="text-center align-middle">
                        <td class="text-start col-2" rowspan="2">ALAT KOMUNIKASI</td>
                        <td class="text-start py-0 col-5">a. Memiliki alat komunikasi yang dibutuhkan (disesuaikan
                            dengan project)
                        </td>
                        <td>
                            <p>{{ $ReportInterview->alat_ada }}</p>
                        </td>
                        <td>
                            <p>{{ $ReportInterview->catatan_alat ?? 'Tidak ada catatan' }}</p>
                        </td>
                    </tr>
                    <tr class="text-center align-middle">
                        <td class="text-start py-0">b. Jika Tidak, Apakah siap membeli/menggantinya</td>
                        <td>
                            <p>{{ $ReportInterview->alat_beli }}</p>
                        </td>
                        <td>
                            <p>{{ $ReportInterview->catatan_alat ?? 'Tidak ada catatan' }}</p>
                        </td>
                    </tr>


                    <!-- Notes -->
                    <tr>
                        <td class="border-0 pt-3" colspan="12">
                            <label for="catatan">Catatan (Bila ada):</label>
                            <p>{{ $ReportInterview->catatan ?? 'Tidak ada catatan' }}</p>
                        </td>
                    </tr>

                    <!-- Kesimpulan & Pewawancara -->
                    <tr>
                        <td colspan="2" style="font-size: 14px">
                            <div class="hasil_seleksi">
                                <div class="mb-3">
                                    <p class="form-label fw-bold">Kesimpulan</p>
                                    @if ($ReportInterview->hasil_seleksi == 'Sesuai')
                                        <label class="form-check-label" for="sesuai">
                                            Kualifikasi yang dimiliki sudah sesuai dengan kriterian yang dibutuhkan
                                        </label>
                                    @elseif ($ReportInterview->hasil_seleksi == 'Dipertimbangkan')
                                        <label class="form-check-label" for="dipertimbangkan">
                                            Masih dapat dipertimbangkan
                                        </label>
                                    @else
                                        <label class="form-check-label" for="ditolak">
                                            Ditolak
                                        </label>
                                    @endif
                                </div>
                            </div>
                            <div class="note pt-3">
                                <p class="fw-semibold">Note</p>
                                <p>1. Poor (1-2) : Potensinya di bawah kapasitas yang dibutuhkan</p>
                                <p>2. Acceptable (3-4) : Potensinya cukup sesuai dengan kapasitas yang dibutuhkan</p>
                                <p>3. Excellent (5) : Potensinya sangat menonjol, jauh di atas kapasitas yang dibutuhkan
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
                                    <p class="fw-semibold">Pewawancara: {{ Auth::user()->username }}</p>
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

@push('scripts')
    <script type="module">
        $(document).ready(function() {
            $('#newsEventTable').DataTable();
        });
    </script>

    <script>
        const today = new Date();
        const year = today.getFullYear();
        const month = String(today.getMonth() + 1).padStart(2, '0');
        const day = String(today.getDate()).padStart(2, '0');
        document.getElementById('tanggal').value = `${year}-${month}-${day}`;
    </script>
@endpush
