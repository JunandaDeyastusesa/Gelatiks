@extends('layouts.admin.app')

@section('title', 'Gelatik Supra')
@section('nav-title', 'Jobs')

@section('content')
    <div class="container-fluid">
        <!-- Card: Akun -->
        <a class="text-decoration-none text-secondary" href="{{ route('jobs.applicants', $jobApply->job->id) }}"><i
                class="bi bi-arrow-left"></i> Back to Applicant</a>
        <div class="card p-4 p-md-5 my-4 " style="background: #fff">
            @if ($jobApply->status == 'Interview')
                <div class="d-flex mb-4">
                    <p class="fs-4 fw-semibold">Data Pelamar</p>
                    <div class="btn-group ms-auto" role="group">
                        @if ($jobApply->reportInterviewMDSPG->isNotEmpty())
                            <a class="btn btn-outline-primary"
                                href="{{ route('reportInterviewSPGMD.show', $jobApply->reportInterviewMDSPG->first()->id) }}">
                                Hasil Interview MD
                            </a>
                        @elseif ($jobApply->reportInterviewTCTL->isNotEmpty())
                            <a class="btn btn-outline-primary"
                                href="{{ route('reportInterviewPCTL.show', $jobApply->reportInterviewTCTL->first()->id) }}">
                                Hasil Interview PC/TL
                            </a>
                        @else
                            {{-- Belum ada penilaian --}}
                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Form Penilaian
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="{{ route('reportInterview.form', $jobApply->id) }}">
                                        Form Interview PC/TL
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('reportInterviewSPGMD.form', $jobApply->id) }}">
                                        Form Interview MD
                                    </a>
                                </li>
                            </ul>
                        @endif

                    </div>
                </div>
            @endif
            <div class="row g-4 align-items-center">
                <div class="col-md-3 text-center text-md-start">
                    @if ($jobApply->user->profile->photo)
                        <img src="{{ asset('storage/' . $jobApply->user->profile->photo) }}" alt="User Image"
                            class="rounded-4 img-fluid" style="max-width: 200px; height: 200px;">
                        </a>
                    @else
                        <div class="d-flex justify-content-center align-items-center"
                            style="width: 200px; height: 200px; border: 1px dashed #ccc; border-radius: 1rem;">
                            <span class="text-muted">Foto belum diunggah</span>
                        </div>
                    @endif
                </div>

                <div class="col-md-9">
                    <div class="row g-4">
                        <div class="col-md-4">
                            <label class="form-label text-muted mb-1">Nama Lengkap</label>
                            <div class="fw-semibold fs-6">{{ $jobApply->user->profile->namaLengkap ?? '-' }}</div>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label text-muted mb-1">Jenis Kelamin</label>
                            <div class="fw-semibold fs-6">{{ $jobApply->user->profile->kelamin ?? '-' }}</div>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label text-muted mb-1">Tahun Lahir</label>
                            <div class="fw-semibold fs-6">
                                {{ \Carbon\Carbon::parse($jobApply->user->profile->kelahiran)->format('d M Y') }}
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label text-muted mb-1">Usia</label>
                            <div class="fw-semibold fs-6">
                                {{ $jobApply->user->profile?->kelahiran ? \Carbon\Carbon::parse($jobApply->user->profile->kelahiran)->age : '-' }}
                                Tahun
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label text-muted mb-1">Email</label>
                            <div class="fw-semibold fs-6">{{ $user->email ?? '-' }}</div>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label text-muted mb-1">No Telp</label>
                            <div class="fw-semibold fs-6">{{ $jobApply->user->profile->telp ?? '-' }}</div>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label text-muted mb-1">Kategori</label>
                            <div class="fw-semibold fs-6">{{ $jobApply->user->profile->category ?? '-' }}</div>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label text-muted mb-1">Pendidikan</label>
                            <div class="fw-semibold fs-6">{{ $jobApply->user->profile->pendidikan ?? '-' }}</div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label text-muted mb-1">CV</label>
                            <div class="fw-semibold fs-6"><a class="btn btn-success btn-sm"
                                    href="{{ asset('storage/' . $jobApply->user->profile->docCV) }}" target="_blank"><i
                                        class="bi bi-eye-fill me-2"></i> Lihat CV</a></div>
                        </div>
                        <div class="col-md-8">
                            <label class="form-label text-muted mb-1">Domisili</label>
                            <div class="fw-semibold fs-6">{{ $jobApply->user->profile->domisili ?? '-' }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 my-5">
                <hr>
            </div>
            <p class="fs-5 fw-medium mb-2">Pengalaman Kerja</p>
            <div class="col-md-12 table-responsive">
                <table class="table">
                    <thead class="head-table">
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama Perusahaan</th>
                            <th class="text-center">Tahun</th>
                            <th class="text-center">Posisi</th>
                            <th class="text-center">Produk</th>
                            <th class="text-center">Alasan</th>
                        </tr>
                    </thead>
                    <tbody class="body-table">
                        <tr>
                            <td class="text-center">01</td>
                            <td>{{ $pengKerja1[0] ?? '-' }}</td>
                            <td class="text-center">{{ $pengKerja1[1] ?? '-' }}</td>
                            <td>{{ $pengKerja1[2] ?? '-' }}</td>
                            <td>{{ $pengKerja1[3] ?? '-' }}</td>
                            <td>{{ $pengKerja1[4] ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="text-center">02</td>
                            <td>{{ $pengKerja2[0] ?? '-' }}</td>
                            <td class="text-center">{{ $pengKerja2[1] ?? '-' }}</td>
                            <td>{{ $pengKerja2[2] ?? '-' }}</td>
                            <td>{{ $pengKerja2[3] ?? '-' }}</td>
                            <td>{{ $pengKerja2[4] ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="text-center">03</td>
                            <td>{{ $pengKerja3[0] ?? '-' }}</td>
                            <td class="text-center">{{ $pengKerja3[1] ?? '-' }}</td>
                            <td>{{ $pengKerja3[2] ?? '-' }}</td>
                            <td>{{ $pengKerja3[3] ?? '-' }}</td>
                            <td>{{ $pengKerja3[4] ?? '-' }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="justify-content-between d-flex mt-5">

                @if ($jobApply->status != 'Rejected' && $jobApply->status != 'Accepted')
                    <button type="button" class="btn btn-rejected px-4" data-bs-toggle="modal"
                        data-bs-target="#RejectModal">
                        Reject
                    </button>

                    <div class="modal fade " id="RejectModal" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="RejectModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content rounded-top-4">
                                <div class="modal-header bg-pink text-white rounded-top-4 p-4">
                                    <h5 class="modal-title fw-semibold" id="showModalLabel">
                                        <i class="bi bi-briefcase-fill me-2"></i>Silahkan Pilih Alasan Penolakan
                                    </h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('jobApplies.reject', $jobApply->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="status" value="Rejected">

                                        <select class="form-select mt-4" aria-label="Default select example"
                                            name="keterangan" required>
                                            <option value="" selected disabled>Pilih Alasan Penolakan</option>
                                            <option value="Kuota sudah terpenuhi">Kuota sudah terpenuhi</option>
                                            <option value="Tidak memenuhi kualifikasi yang dibutuhkan">Tidak memenuhi
                                                kualifikasi yang dibutuhkan</option>
                                            <option value="Berkas atau data tidak lengkap">Berkas atau data tidak lengkap
                                            </option>
                                            <option value="Lokasi domisili tidak sesuai kebutuhan">Lokasi domisili tidak
                                                sesuai
                                                kebutuhan</option>
                                        </select>

                                        <div class="modal-footer justify-content-between mt-5">
                                            <button type="button" class="btn btn-none"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-rejected px-4">Reject</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif


                @if ($jobApply->status == 'In Review')
                    <button type="button" class="btn btn-interview px-4" data-bs-toggle="modal"
                        data-bs-target="#InterviewModal">
                        Call to Interview
                    </button>

                    <div class="modal fade " id="InterviewModal" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="InterviewModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content rounded-top-4">
                                <div class="modal-header bg-pink text-white rounded-top-4 p-4">
                                    <h5 class="modal-title fw-semibold" id="showModalLabel">
                                        <i class="bi bi-briefcase-fill me-2"></i>Silahkan Tambahkan Keterangan
                                    </h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate
                                        action="{{ route('jobApplies.reject', $jobApply->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="status" value="Interview">

                                        <textarea name="keterangan" class="form-control mt-4"
                                            placeholder="Masukkan keterangan seperti Jadwal, Lokasi, dan Jam" style="height: 100px" required></textarea>
                                        <div class="invalid-feedback">
                                            Keterangan wajib diisi.
                                        </div>

                                        <div class="modal-footer justify-content-between mt-5">
                                            <button type="button" class="btn btn-none"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-interview px-4">Call to
                                                Interview</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                @elseif ($jobApply->status == 'Interview')
                    <form id="accept-form" action="{{ route('jobApplies.reject', $jobApply->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" value="Accepted">
                        <input type="hidden" name="keterangan" value="Selamat anda diterima">
                        <button type="button" class="btn btn-accepted px-4"
                            onclick="confirmAccept(event)">Accepted</button>
                    </form>
                @endif


            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script type="module">
        $(document).ready(function() {
            $('#applicantsTable').DataTable();
        });
    </script>

    <script>
        function confirmAccept(event) {
            event.preventDefault();
            Swal.fire({
                title: 'Apakah Anda Sudah Melakukan Interview?',
                text: "Kandidat akan diterima secara permanen setelah anda klik Terima.",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#198754', // Hijau
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Terima!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('accept-form').submit();
                }
            });
        }
    </script>

    <script>
        (() => {
            'use strict'
            const forms = document.querySelectorAll('.needs-validation')
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
        })();
    </script>
@endpush
