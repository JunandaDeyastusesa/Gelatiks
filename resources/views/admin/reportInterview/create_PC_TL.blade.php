@extends('layouts.admin.app')

@section('title', 'Gelatik Supra')
@section('nav-title', 'Risalah Interview')

@section('content')
    @php
        use Carbon\Carbon;
        $today = Carbon::now(); // otomatis sesuai APP_TIMEZONE
    @endphp
    <div class="container-fluid mb-5">
        <h5 class="text-center mb-3">Risalah Interview PC/TL</h5>
        <form action="{{ route('reportInterviewPCTL.store', $jobApply->id) }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="biodata">
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <td class="align-middle pb-0 col-2 text-muted">Nama</td>
                            <td class="align-middle pb-0 col-5 fw-medium">: {{ $jobApply->user->profile->namaLengkap }}</td>
                            <td class="align-middle pb-0 col-2 text-muted">No tes</td>
                            <td class="align-middle pb-0">
                                <input type="text" name="no_tes" class="form-control"
                                    placeholder="Masukkan No tes disini" required>
                            </td>
                        </tr>
                        <tr>
                            <td class="align-middle pb-0 col-2 text-muted">Tgl Lahir / Usia</td>
                            <td class="align-middle pb-0 col-5 fw-medium">: {{ $jobApply->user->profile->kelahiran }} /
                                {{ $jobApply->user->profile->kelahiran ? \Carbon\Carbon::parse($jobApply->user->profile->kelahiran)->age : '-' }}
                                Tahun</td>
                            <td class="align-middle pb-0 col-2 text-muted">Tujuan Tes</td>
                            <td class="align-middle pb-0">
                                <input type="text" name="tujuan_tes" class="form-control"
                                    placeholder="Masukkan Tujuan tes disini" required>
                            </td>

                        </tr>
                        <tr>
                            <td class="align-middle pb-0 col-2 text-muted">Pendiikan</td>
                            <td class="align-middle pb-0 col-5 fw-medium">: {{ $jobApply->user->profile->pendidikan }}</td>
                            <td class="align-middle pb-0 col-2 text-muted">Tanggal Tes</td>
                            <td class="align-middle pb-0">
                                <p>{{ $today->translatedFormat('d M Y') }}</p>
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
                            <th class="align-middle" rowspan="2">Competency</th>
                            <th class="align-middle" rowspan="2">Definisi</th>
                            <th colspan="5">Poor</th>
                            <th colspan="2">Acceptable</th>
                            <th colspan="3">Very Good</th>
                        </tr>
                        <tr class="text-center">
                            <td>1</td>
                            <td>2</td>
                            <td>3</td>
                            <td>4</td>
                            <td>5</td>
                            <td>6</td>
                            <td>7</td>
                            <td>8</td>
                            <td>9</td>
                            <td>10</td>
                        </tr>
                    </thead>

                    <tbody>
                        <!-- A. Core Competency -->
                        <tr>
                            <td class="fw-medium pt-4 border-0" colspan="12">A. Core Competency</td>
                        </tr>

                        <tr class="text-center align-middle">
                            <td class="text-start col-2">ANALYTICAL THINKING</td>
                            <td class="text-start col-5">
                                Kemampuan mengenali/mengidentifikasikan hubungan sebab-akibat/jika-mana,
                                serta menyikapi dan membuat keputusan.
                            </td>
                            @for ($i = 1; $i <= 10; $i++)
                                <td><input type="radio" name="analytical_thinking" value="{{ $i }}" required>
                                </td>
                            @endfor
                        </tr>

                        <tr class="text-center align-middle">
                            <td class="text-start col-2">ACHIEVEMENT ORIENTATION</td>
                            <td class="text-start col-5">
                                Upaya menyelesaikan tugas dengan tuntas dan mencapai standar kerja terbaik.
                            </td>
                            @for ($i = 1; $i <= 10; $i++)
                                <td><input type="radio" name="achievement_orientation" value="{{ $i }}"
                                        required></td>
                            @endfor
                        </tr>

                        <tr class="text-center align-middle">
                            <td class="text-start col-2">INTEGRITY</td>
                            <td class="text-start col-5">
                                Menunjukkan kemauan untuk melaksanakan tugas sesuai etika yang berlaku,
                                menjunjung tinggi nilai kehormatan, kemuliaan, dan kepatuhan.
                            </td>
                            @for ($i = 1; $i <= 10; $i++)
                                <td><input type="radio" name="integrity" value="{{ $i }}" required></td>
                            @endfor
                        </tr>

                        <tr class="text-center align-middle">
                            <td class="text-start col-2">WILLINGNESS TO LEARN</td>
                            <td class="text-start col-5">
                                Kemauan memahami dan menerapkan informasi baru untuk meningkatkan pengetahuan
                                dan kompetensi.
                            </td>
                            @for ($i = 1; $i <= 10; $i++)
                                <td><input type="radio" name="willingness_to_learn" value="{{ $i }}" required>
                                </td>
                            @endfor
                        </tr>

                        <!-- B. Competency -->
                        <tr>
                            <td class="fw-medium pt-4 border-0" colspan="12">B. Competency</td>
                        </tr>

                        <tr class="text-center align-middle">
                            <td class="text-start col-2">SELF CONFIDENCE</td>
                            <td class="text-start col-5">
                                Keyakinan atas kemampuan diri dan obyektifitas dalam menilai kemampuan tersebut.
                            </td>
                            @for ($i = 1; $i <= 10; $i++)
                                <td><input type="radio" name="self_confidence" value="{{ $i }}" required></td>
                            @endfor
                        </tr>

                        <tr class="text-center align-middle">
                            <td class="text-start col-2">ADAPTABILITY</td>
                            <td class="text-start col-5">
                                Kemampuan menyesuaikan diri terhadap perubahan (lingkungan, tugas, budaya)
                                dengan tetap efektif.
                            </td>
                            @for ($i = 1; $i <= 10; $i++)
                                <td><input type="radio" name="adaptability" value="{{ $i }}" required></td>
                            @endfor
                        </tr>

                        <tr class="text-center align-middle">
                            <td class="text-start col-2">TEAMWORK</td>
                            <td class="text-start col-5">
                                Mampu menjalin kerjasama, peka terhadap kebutuhan orang lain, dan berkontribusi
                                pada aktivitas kelompok.
                            </td>
                            @for ($i = 1; $i <= 10; $i++)
                                <td><input type="radio" name="teamwork" value="{{ $i }}" required></td>
                            @endfor
                        </tr>

                        <tr class="text-center align-middle">
                            <td class="text-start col-2">INTERPERSONAL SKILL</td>
                            <td class="text-start col-5">
                                Minat dan perhatian pada orang lain, menciptakan impresi baik, serta mampu
                                menjalin hubungan dengan berbagai kalangan.
                            </td>
                            @for ($i = 1; $i <= 10; $i++)
                                <td><input type="radio" name="interpersonal_skills" value="{{ $i }}" required>
                                </td>
                            @endfor
                        </tr>

                        <tr class="text-center align-middle">
                            <td class="text-start col-2">COMMUNICATION</td>
                            <td class="text-start col-5">
                                Kemampuan menerima dan memberikan informasi secara efektif.
                            </td>
                            @for ($i = 1; $i <= 10; $i++)
                                <td><input type="radio" name="communication" value="{{ $i }}" required></td>
                            @endfor
                        </tr>

                        <!-- C. Functional Competency -->
                        <tr>
                            <td class="fw-medium pt-4 border-0" colspan="12">C. Functional Competency</td>
                        </tr>

                        <tr class="text-center align-middle">
                            <td class="text-start col-2">KNOWLEDGE</td>
                            <td class="text-start col-5">
                                Penguasaan ilmu yang berhubungan dengan pekerjaan.
                            </td>
                            @for ($i = 1; $i <= 10; $i++)
                                <td><input type="radio" name="knowledge" value="{{ $i }}" required></td>
                            @endfor
                        </tr>

                        <tr class="text-center align-middle">
                            <td class="text-start col-2">SKILL</td>
                            <td class="text-start col-5">
                                Penguasaan praktis dalam mengaplikasikan ilmu pengetahuan.
                            </td>
                            @for ($i = 1; $i <= 10; $i++)
                                <td><input type="radio" name="skill" value="{{ $i }}" required></td>
                            @endfor
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
