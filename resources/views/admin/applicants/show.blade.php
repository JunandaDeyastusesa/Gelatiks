<!-- Modal Detail Job -->
<div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="showModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content rounded-4 border-0 shadow-lg">
            <!-- Modal Header -->
            <div class="modal-header bg-pink text-white rounded-top-4 p-4">
                <h5 class="modal-title fw-semibold" id="showModalLabel">
                    <i class="bi bi-briefcase-fill me-2"></i>Job Details
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

                    <!-- Category -->
                    <div class="col-md-6">
                        <label class="form-label mb-1 text-muted">Category</label>
                        <div class="fw-semibold">{{ $applicant->profile->category }}</div>
                    </div>

                    <!-- City -->
                    <div class="col-md-6">
                        <label class="form-label mb-1 text-muted">City</label>
                        <div class="fw-semibold">{{ $applicant->profile->domisili }}</div>
                    </div>

                    <!-- Store Name -->
                    <div class="col-md-6">
                        <label class="form-label mb-1 text-muted">Store Name</label>
                        <div class="fw-semibold">{{ $applicant->store_name }}</div>
                    </div>

                    <!-- Min School -->
                    <div class="col-md-4">
                        <label class="form-label mb-1 text-muted">Minimum School</label>
                        <div class="fw-semibold">{{ $applicant->education }}</div>
                    </div>

                    <!-- Qty Applicants -->
                    <div class="col-md-4">
                        <label class="form-label mb-1 text-muted">Quota</label>
                        <div class="fw-semibold">{{ $applicant->open_position }}</div>
                    </div>

                    <!-- Type Work -->
                    <div class="col-md-4">
                        <label class="form-label mb-1 text-muted">Type Work</label>
                        <div class="fw-semibold">{{ $applicant->type_work }}</div>
                    </div>

                    <!-- Min Experience -->
                    <div class="col-md-4">
                        <label class="form-label mb-1 text-muted">Min Experience</label>
                        <div class="fw-semibold">{{ $applicant->experience }}</div>
                    </div>

                    <!-- Gender -->
                    <div class="col-md-4">
                        <label class="form-label mb-1 text-muted">Gender</label>
                        <div class="fw-semibold">{{ $applicant->gender }}</div>
                    </div>

                    <!-- Close Date -->
                    <div class="col-md-4">
                        <label class="form-label mb-1 text-muted">Close Date</label>
                        <div class="fw-semibold"><i
                                class="bi bi-calendar-event me-1 text-muted"></i>{{ \Carbon\Carbon::parse($applicant->close_date)->format('d M Y') }}</div>
                    </div>

                    <!-- Description -->
                    <div class="col-12">
                        <label class="form-label mb-1 text-muted">Description</label>
                        <div class="fw-normal">{{ $applicant->description }}</div>
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
