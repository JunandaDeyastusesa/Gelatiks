@php
    $pengKerja1 = explode(' | ', $applicant->profile->pengKerja1 ?? '');
    $pengKerja2 = explode(' | ', $applicant->profile->pengKerja2 ?? '');
    $pengKerja3 = explode(' | ', $applicant->profile->pengKerja3 ?? '');
@endphp

<!-- Modal Detail Job -->
<div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="showModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content rounded-4 border-0 shadow-lg">
            <!-- Modal Header -->
            <div class="modal-header bg-pink text-white rounded-top-4 p-4">
                <h5 class="modal-title fw-semibold" id="showModalLabel">
                    <i class="bi bi-briefcase-fill me-2"></i>Details Applicant
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body p-4">
                <div class="row g-4 p-2">

                    <!-- Jobs Name -->
                    <div class="col-md-6">
                        <label class="form-label mb-1 text-muted">Nama Lengkap</label>
                        <div class="fw-semibold">{{ $applicant->profile->namaLengkap ?? '-' }}</div>
                    </div>

                    <!-- Gender -->
                    <div class="col-md-3">
                        <label class="form-label mb-1 text-muted">Gender</label>
                        <div class="fw-semibold">{{ $applicant->profile->kelamin ?? '-' }}</div>
                    </div>

                    <!-- Kelahiran -->
                    <div class="col-md-3">
                        <label class="form-label mb-1 text-muted">Kelahiran</label>
                        <div class="fw-semibold">
                            {{ \Carbon\Carbon::parse($applicant->profile->kelahiran)->format('d M Y') ?? '-' }}</div>
                    </div>

                    <!-- Email -->
                    <div class="col-md-6">
                        <label class="form-label mb-1 text-muted">Email</label>
                        <div class="fw-semibold">{{ $applicant->email ?? '-' }}</div>
                    </div>

                    <!-- No Telp -->
                    <div class="col-md-3">
                        <label class="form-label mb-1 text-muted">No Telp</label>
                        <div class="fw-semibold">{{ $applicant->profile->telp ?? '-' }}</div>
                    </div>

                    <!-- Category -->
                    <div class="col-md-3">
                        <label class="form-label mb-1 text-muted">Category</label>
                        <div class="fw-semibold">{{ $applicant->profile->category ?? '-' }}</div>
                    </div>


                    <!-- City -->
                    <div class="col-md-6">
                        <label class="form-label mb-1 text-muted">Domisili</label>
                        <div class="fw-semibold">{{ $applicant->profile->domisili ?? '-' }}</div>
                    </div>

                    <!-- Pendidikan -->
                    <div class="col-md-3">
                        <label class="form-label mb-1 text-muted">Pendidikan</label>
                        <div class="fw-semibold">{{ $applicant->profile->pendidikan ?? '-' }}</div>
                    </div>

                    <!-- CV -->
                    <div class="col-md-3">
                        <label class="form-label mb-1 text-muted">CV</label>
                        <div class="fw-semibold"><a class="btn btn-success btn-sm"
                                href="{{ asset('storage/' . $applicant->profile->docCV) }}" target="_blank"><i
                                    class="bi bi-eye-fill me-2"></i> Lihat CV</a></div>
                    </div>

                    <hr>
                    <p class="fs-5 fw-semibold mb-0">Pengalaman Kerja</p>
                    <div class="col-md-12 mt-2 table-responsive">
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
                                    <td>01</td>
                                    <td>{{ $pengKerja1[0] ?? '-' }}</td>
                                    <td>{{ $pengKerja1[1] ?? '-' }}</td>
                                    <td>{{ $pengKerja1[2] ?? '-' }}</td>
                                    <td>{{ $pengKerja1[3] ?? '-' }}</td>
                                    <td>{{ $pengKerja1[4] ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td>02</td>
                                    <td>{{ $pengKerja2[0] ?? '-' }}</td>
                                    <td>{{ $pengKerja2[1] ?? '-' }}</td>
                                    <td>{{ $pengKerja2[2] ?? '-' }}</td>
                                    <td>{{ $pengKerja2[3] ?? '-' }}</td>
                                    <td>{{ $pengKerja2[4] ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td>03</td>
                                    <td>{{ $pengKerja3[0] ?? '-' }}</td>
                                    <td>{{ $pengKerja3[1] ?? '-' }}</td>
                                    <td>{{ $pengKerja3[2] ?? '-' }}</td>
                                    <td>{{ $pengKerja3[3] ?? '-' }}</td>
                                    <td>{{ $pengKerja3[4] ?? '-' }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
