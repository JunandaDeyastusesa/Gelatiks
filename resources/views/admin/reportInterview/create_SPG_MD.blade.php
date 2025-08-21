@extends('layouts.admin.app')

@section('title', 'Gelatik Supra')
@section('nav-title', 'Risalah Interview')

@section('content')
    @php
        use Carbon\Carbon;
        $today = Carbon::now(); // otomatis sesuai APP_TIMEZONE
    @endphp
    <div class="container-fluid mb-5">
        <h5 class="text-center mb-3">RISALAH INTERVIEW SPG / MD</h5>
        <form action="{{ route('reportInterviewSPGMD.store', $jobApply->id) }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="biodata">
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <td class="align-middle pb-0 col-1 text-muted">Nama</td>
                            <td class="align-middle pb-0 col-5 fw-medium">: {{ $jobApply->user->profile->namaLengkap }}</td>
                        </tr>
                        <tr>
                            <td class="align-middle pb-0 col-1 text-muted">Tgl Lahir / Usia</td>
                            <td class="align-middle pb-0 col-5 fw-medium">: {{ $jobApply->user->profile->kelahiran }} /
                                {{ $jobApply->user->profile->kelahiran ? \Carbon\Carbon::parse($jobApply->user->profile->kelahiran)->age : '-' }}
                            </td>

                        </tr>
                        <tr>
                            <td class="align-middle pb-0 col-1 text-muted">Tanggal Tes</td>
                            <td class="align-middle pb-0">
                                <p>: {{ $today->translatedFormat('d M Y') }}</p>
                                <input type="date" name="tanggal_tes" id="tanggal" class="form-control d-none"
                                    value="{{ $today->format('Y-m-d') }}" readonly>
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
                            <th colspan="5">Penilaian</th>
                            <th class="align-middle" rowspan="2">Keterangan</th>
                        </tr>
                        <tr class="text-center">
                            <td>1</td>
                            <td>2</td>
                            <td>3</td>
                            <td>4</td>
                            <td>5</td>
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
                            @for ($i = 1; $i <= 5; $i++)
                                <td>
                                    <input type="radio" name="penampilan_sopan_rapi" value="{{ $i }}" required>
                                </td>
                            @endfor
                            <td rowspan="3">
                                <textarea class="form-control" name="catatan_penampilan" rows="4" placeholder="Catatan..."></textarea>
                            </td>
                        </tr>

                        <tr class="text-center align-middle">
                            <td class="text-start py-0">b. Sesuai dengan posisi yang dilamar</td>
                            @for ($i = 1; $i <= 5; $i++)
                                <td>
                                    <input type="radio" name="penampilan_sesuai_posisi" value="{{ $i }}"
                                        required>
                                </td>
                            @endfor
                        </tr>

                        <tr class="text-center align-middle">
                            <td class="text-start py-0">c. Memiliki rasa percaya diri yang memadai</td>
                            @for ($i = 1; $i <= 5; $i++)
                                <td>
                                    <input type="radio" name="penampilan_pede" value="{{ $i }}" required>
                                </td>
                            @endfor
                        </tr>

                        <!-- CARA BERKOMUNIKASI -->
                        <tr class="text-center align-middle">
                            <td class="text-start col-2" rowspan="3">CARA BERKOMUNIKASI</td>
                            <td class="text-start py-0 col-5">a. Mampu berkomunikasi dengan baik</td>
                            @for ($i = 1; $i <= 5; $i++)
                                <td><input type="radio" name="komunikasi_baik" value="{{ $i }}" required></td>
                            @endfor
                            <td rowspan="3">
                                <textarea class="form-control" name="catatan_komunikasi" rows="5" placeholder="Catatan..."></textarea>
                            </td>
                        </tr>
                        <tr class="text-center align-middle">
                            <td class="text-start py-0">b. Memberikan penjelasan runtut & mudah dipahami</td>
                            @for ($i = 1; $i <= 5; $i++)
                                <td><input type="radio" name="komunikasi_runtut" value="{{ $i }}" required>
                                </td>
                            @endfor
                        </tr>
                        <tr class="text-center align-middle">
                            <td class="text-start py-0">c. Menjelaskan secara langsung, tegas, dan lugas</td>
                            @for ($i = 1; $i <= 5; $i++)
                                <td><input type="radio" name="komunikasi_tegas" value="{{ $i }}" required>
                                </td>
                            @endfor
                        </tr>

                        <!-- PENDIDIKAN -->
                        <tr class="text-center align-middle">
                            <td class="text-start col-2">PENDIDIKAN</td>
                            <td class="text-start py-0 col-5">a. Sesuai dengan posisi yang dilamar</td>
                            @for ($i = 1; $i <= 5; $i++)
                                <td><input type="radio" name="pendidikan_sesuai" value="{{ $i }}" required>
                                </td>
                            @endfor
                            <td>
                                <textarea class="form-control" name="catatan_pendidikan" rows="2" placeholder="Catatan..."></textarea>
                            </td>
                        </tr>

                        <!-- LATAR BELAKANG -->
                        <tr class="text-center align-middle">
                            <td class="text-start col-2" rowspan="4">LATAR BELAKANG</td>
                            <td class="text-start py-0 col-5">a. Tempat tinggal sesuai lokasi/penempatan</td>
                            @for ($i = 1; $i <= 5; $i++)
                                <td><input type="radio" name="latar_tempat_tinggal" value="{{ $i }}" required>
                                </td>
                            @endfor
                            <td rowspan="4">
                                <textarea class="form-control" name="catatan_latar" rows="4" placeholder="Catatan..."></textarea>
                            </td>
                        </tr>
                        <tr class="text-center align-middle">
                            <td class="text-start py-0">b. Bersedia ditempatkan pada area/lokasi kerja yang jauh dari tempat
                                tinggal saat ini</td>
                            @for ($i = 1; $i <= 5; $i++)
                                <td><input type="radio" name="latar_penempatan" value="{{ $i }}" required>
                                </td>
                            @endfor
                        </tr>
                        <tr class="text-center align-middle">
                            <td class="text-start py-0">c. Memiliki riwayat kesehatan yang baik</td>
                            @for ($i = 1; $i <= 5; $i++)
                                <td><input type="radio" name="latar_kesehatan" value="{{ $i }}" required>
                                </td>
                            @endfor
                        </tr>
                        <tr class="text-center align-middle">
                            <td class="text-start py-0">d. Tidak pernah berurusan dengan kepolisian perihal kasus
                                narkoba/kriminalitas dan sejenisnya</td>
                            @for ($i = 1; $i <= 5; $i++)
                                <td><input type="radio" name="latar_hukum" value="{{ $i }}" required></td>
                            @endfor
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
                            @for ($i = 1; $i <= 5; $i++)
                                <td><input type="radio" name="skill_sesuai" value="{{ $i }}" required></td>
                            @endfor
                            <td rowspan="4">
                                <textarea class="form-control" name="catatan_skill" rows="9" placeholder="Catatan..."></textarea>
                            </td>
                        </tr>
                        <tr class="text-center align-middle">
                            <td class="text-start py-0">b. Mampu melakukan dan menjalankan koordinasi kerja</td>
                            @for ($i = 1; $i <= 5; $i++)
                                <td><input type="radio" name="skill_koordinasi" value="{{ $i }}" required>
                                </td>
                            @endfor
                        </tr>
                        <tr class="text-center align-middle">
                            <td class="text-start py-0">c. Mampu bernegosiasi dengan pihak terkait dalam bekerja</td>
                            @for ($i = 1; $i <= 5; $i++)
                                <td><input type="radio" name="skill_negosiasi" value="{{ $i }}" required>
                                </td>
                            @endfor
                        </tr>
                        <tr class="text-center align-middle">
                            <td class="text-start py-0">d. Penguasaan praktis dalam mengaplikasikan ilmu pengetahuannya
                            </td>
                            @for ($i = 1; $i <= 5; $i++)
                                <td><input type="radio" name="skill_aplikasi" value="{{ $i }}" required>
                                </td>
                            @endfor
                        </tr>

                        <!-- KNOWLEDGE -->
                        <tr class="text-center align-middle">
                            <td class="text-start col-2" rowspan="5">KNOWLEDGE</td>
                            <td class="text-start py-0 col-5">a. Mengetahui dan memahami jenis pekerjaan yang dilamar</td>
                            @for ($i = 1; $i <= 5; $i++)
                                <td><input type="radio" name="knowledge_pekerjaan" value="{{ $i }}"
                                        required></td>
                            @endfor
                            <td rowspan="5">
                                <textarea class="form-control" name="catatan_knowledge" rows="9" placeholder="Catatan..."></textarea>
                            </td>
                        </tr>
                        <tr class="text-center align-middle">
                            <td class="text-start py-0">b. Mengetahui dan memahami tentang pekerjaan yang akan dilakukan
                            </td>
                            @for ($i = 1; $i <= 5; $i++)
                                <td><input type="radio" name="knowledge_tugas" value="{{ $i }}" required>
                                </td>
                            @endfor
                        </tr>
                        <tr class="text-center align-middle">
                            <td class="text-start py-0">c. Pemahaman bekerja dalam team</td>
                            @for ($i = 1; $i <= 5; $i++)
                                <td><input type="radio" name="knowledge_team" value="{{ $i }}" required>
                                </td>
                            @endfor
                        </tr>
                        <tr class="text-center align-middle">
                            <td class="text-start py-0">d. Pemahaman bekerja dibawah tekanan</td>
                            @for ($i = 1; $i <= 5; $i++)
                                <td><input type="radio" name="knowledge_pressure" value="{{ $i }}"
                                        required></td>
                            @endfor
                        </tr>
                        <tr class="text-center align-middle">
                            <td class="text-start py-0">e. Pemahaman tentang dasar - dasar digital knowledge</td>
                            @for ($i = 1; $i <= 5; $i++)
                                <td><input type="radio" name="knowledge_digital" value="{{ $i }}" required>
                                </td>
                            @endfor
                        </tr>

                        <!-- ATTITUDE -->
                        <tr class="text-center align-middle">
                            <td class="text-start col-2" rowspan="3">ATTITUDE</td>
                            <td class="text-start py-0 col-5">a. Mampu menempatkan diri sebagai bawahan maupun atasan</td>
                            @for ($i = 1; $i <= 5; $i++)
                                <td><input type="radio" name="attitude_posisi" value="{{ $i }}" required>
                                </td>
                            @endfor
                            <td rowspan="3">
                                <textarea class="form-control" name="catatan_attitude" rows="5" placeholder="Catatan..."></textarea>
                            </td>
                        </tr>
                        <tr class="text-center align-middle">
                            <td class="text-start py-0">b. Sikap yang dilakukan jika menerima kritikan</td>
                            @for ($i = 1; $i <= 5; $i++)
                                <td><input type="radio" name="attitude_kritikan" value="{{ $i }}" required>
                                </td>
                            @endfor
                        </tr>
                        <tr class="text-center align-middle">
                            <td class="text-start py-0">c. Bisa menunjukan sikap kerja yang positive</td>
                            @for ($i = 1; $i <= 5; $i++)
                                <td><input type="radio" name="attitude_positif" value="{{ $i }}" required>
                                </td>
                            @endfor
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
                            @for ($i = 1; $i <= 5; $i++)
                                <td><input type="radio" name="motivasi_target" value="{{ $i }}" required>
                                </td>
                            @endfor
                            <td rowspan="3">
                                <textarea class="form-control" name="catatan_motivasi" rows="5" placeholder="Catatan..."></textarea>
                            </td>
                        </tr>
                        <tr class="text-center align-middle">
                            <td class="text-start py-0">b. Memiliki tujuan atau harapan yang harus diraih saat ini atau 6
                                bulan kedepan</td>
                            @for ($i = 1; $i <= 5; $i++)
                                <td><input type="radio" name="motivasi_tujuan" value="{{ $i }}" required>
                                </td>
                            @endfor
                        </tr>
                        <tr class="text-center align-middle">
                            <td class="text-start py-0">c. Mampu menciptakan suasana kerja yang kondusif</td>
                            @for ($i = 1; $i <= 5; $i++)
                                <td><input type="radio" name="motivasi_suasana" value="{{ $i }}" required>
                                </td>
                            @endfor
                        </tr>

                        <!-- D. Experience -->
                        <tr>
                            <td class="fw-medium pt-4 border-0" colspan="12">D. Experience</td>
                        </tr>

                        <!-- EXPERIENCE -->
                        <tr class="text-center align-middle">
                            <td class="text-start col-2" rowspan="3">EXPERIENCE</td>
                            <td class="text-start py-0 col-5">a. Penguasaan ilmu yang berhubungan dengan pekerjaan</td>
                            @for ($i = 1; $i <= 5; $i++)
                                <td><input type="radio" name="exp_ilmu" value="{{ $i }}" required></td>
                            @endfor
                            <td rowspan="3">
                                <textarea class="form-control" name="catatan_experience" rows="5" placeholder="Catatan..."></textarea>
                            </td>
                        </tr>
                        <tr class="text-center align-middle">
                            <td class="text-start py-0">b. Memiliki penngalaman kerja sesuai dengan posisi yang dilamar
                            </td>
                            @for ($i = 1; $i <= 5; $i++)
                                <td><input type="radio" name="exp_posisi" value="{{ $i }}" required></td>
                            @endfor
                        </tr>
                        <tr class="text-center align-middle">
                            <td class="text-start py-0">c. Alasan dalam memutuskan pindah pekerjaan</td>
                            @for ($i = 1; $i <= 5; $i++)
                                <td><input type="radio" name="exp_alasan" value="{{ $i }}" required></td>
                            @endfor
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
                            <td colspan="2">
                                <input type="radio" name="bpjs" value="Ya" required> Ya
                            </td>
                            <td colspan="3">
                                <input type="radio" name="bpjs" value="Tidak" required> Tidak
                            </td>

                            <td>
                                <textarea class="form-control" name="catatan_bpjs" rows="2" placeholder="Catatan..."></textarea>
                            </td>
                        </tr>

                        <!-- ALAT KOMUNIKASI -->
                        <tr class="text-center align-middle">
                            <td class="text-start col-2" rowspan="2">ALAT KOMUNIKASI</td>
                            <td class="text-start py-0 col-5">a. Memiliki alat komunikasi yang dibutuhkan (disesuaikan
                                dengan project)
                            </td>
                            <td colspan="2">
                                <input type="radio" name="alat_ada" value="Ya" required> Ya
                            </td>
                            <td colspan="3">
                                <input type="radio" name="alat_ada" value="Tidak" required> Tidak
                            </td>

                            <td rowspan="2">
                                <textarea class="form-control" name="catatan_alat" rows="3" placeholder="Catatan..."></textarea>
                            </td>
                        </tr>
                        <tr class="text-center align-middle">
                            <td class="text-start py-0">b. Jika Tidak, Apakah siap membeli/menggantinya</td>
                            <td colspan="2">
                                <input type="radio" name="alat_beli" value="Ya" required> Ya
                            </td>
                            <td colspan="3">
                                <input type="radio" name="alat_beli" value="Tidak" required> Tidak
                            </td>
                        </tr>


                        <!-- Notes -->
                        <tr>
                            <td class="border-0 pt-3" colspan="12">
                                <label for="catatan">Catatan (Bila ada):</label>
                                <textarea name="catatan" id="catatan" rows="3" class="form-control"></textarea>
                            </td>
                        </tr>

                        <!-- Kesimpulan & Pewawancara -->
                        <tr>
                            <td colspan="2" style="font-size: 14px">
                                <div class="hasil_seleksi">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Kesimpulan</label>
                                        <div class="form-check">
                                            <input type="radio" name="hasil_seleksi"
                                                id="sesuai" value="Sesuai" required>
                                            <label class="form-check-label" for="sesuai">
                                                Kualifikasi yang dimiliki sudah sesuai dengan kriterian yang dibutuhkan
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" name="hasil_seleksi"
                                                id="dipertimbangkan" value="Dipertimbangkan">
                                            <label class="form-check-label" for="dipertimbangkan">
                                                Masih dapat dipertimbangkan
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" name="hasil_seleksi"
                                                id="ditolak" value="Ditolak">
                                            <label class="form-check-label" for="ditolak">
                                                Ditolak
                                            </label>
                                        </div>
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
                                        <input type="text" name="kota_tes" class="form-control w-75"
                                            placeholder="Masukkan Kota Wawancara" required>
                                        <p>, {{ $today->translatedFormat('d M Y') }}</p>
                                        <input type="hidden" name="tanggal_tes" value="{{ $today->format('Y-m-d') }}">
                                    </div>

                                    <div class="mt-4">
                                        <p class="fw-semibold">Pewawancara: {{ Auth::user()->username }}</p>
                                        <div class="form-check mt-5">
                                            <input class="form-check-input" name="ket" type="checkbox"
                                                id="checkChecked"
                                                value="Saya sebagai pewawancara menyatakan bahwa wawancara ini telah saya lakukan dengan penuh kesadaran, objektif, dan sesuai prosedur yang berlaku. Seluruh penilaian dan keterangan yang saya berikan adalah benar dan dapat dipertanggungjawabkan.">
                                            <label class="form-check-label text-start" style="font-size: 14px"
                                                for="checkChecked">
                                                Saya sebagai pewawancara menyatakan bahwa wawancara ini telah saya lakukan
                                                dengan penuh kesadaran, objektif, dan sesuai prosedur yang berlaku.
                                                Seluruh penilaian dan keterangan yang saya berikan adalah benar
                                                dan dapat dipertanggungjawabkan.
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <input type="hidden" name="job_apply_id" value="{{ $jobApply->id }}">

            </div>

            <div class="modal-footer d-flex mt-5">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
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
