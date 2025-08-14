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
                        <div class="fw-semibold">{{ $applicant->profile->namaLengkap }}</div>
                    </div>

                    <!-- Gender -->
                    <div class="col-md-3">
                        <label class="form-label mb-1 text-muted">Gender</label>
                        <div class="fw-semibold">{{ $applicant->profile->kelamin }}</div>
                    </div>

                    <!-- Kelahiran -->
                    <div class="col-md-3">
                        <label class="form-label mb-1 text-muted">Kelahiran</label>
                        <div class="fw-semibold">
                            {{ \Carbon\Carbon::parse($applicant->profile->kelahiran)->format('d M Y') }}</div>
                    </div>

                    <!-- Email -->
                    <div class="col-md-6">
                        <label class="form-label mb-1 text-muted">Email</label>
                        <div class="fw-semibold">{{ $applicant->email }}</div>
                    </div>

                    <!-- No Telp -->
                    <div class="col-md-3">
                        <label class="form-label mb-1 text-muted">No Telp</label>
                        <div class="fw-semibold">{{ $applicant->profile->telp }}</div>
                    </div>

                    <!-- Category -->
                    <div class="col-md-3">
                        <label class="form-label mb-1 text-muted">Category</label>
                        <div class="fw-semibold">{{ $applicant->profile->category }}</div>
                    </div>


                    <!-- City -->
                    <div class="col-md-8">
                        <label class="form-label mb-1 text-muted">Domisili</label>
                        <div class="fw-semibold">{{ $applicant->profile->domisili }}</div>
                    </div>

                    <!-- Pendidikan -->
                    <div class="col-md-4">
                        <label class="form-label mb-1 text-muted">Pendidikan</label>
                        <div class="fw-semibold">{{ $applicant->profile->pendidikan }}</div>
                    </div>

                    <hr>
                    <!-- Pengalaman Kerja -->
                    <div class="col-md-4">
                        <label class="form-label mb-1 text-muted">Pengalaman Kerja 1</label>
                        <div class="fw-semibold">{{ $applicant->profile->pengKerja1 }}</div>
                    </div>

                    <!-- Pengalaman Kerja -->
                    <div class="col-md-4">
                        <label class="form-label mb-1 text-muted">Pengalaman Kerja 2</label>
                        <div class="fw-semibold">{{ $applicant->profile->pengKerja2 }}</div>
                    </div>

                    <!-- Pengalaman Kerja -->
                    <div class="col-md-4">
                        <label class="form-label mb-1 text-muted">Pengalaman Kerja 3</label>
                        <div class="fw-semibold">{{ $applicant->profile->pengKerja3 }}</div>
                    </div>

                </div>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer bg-light rounded-bottom-4">
                <button type="button" class="btn btn-outline-secondary px-4" data-bs-dismiss="modal">
                    Tutup
                </button>
            </div>
        </div>
    </div>
</div>
