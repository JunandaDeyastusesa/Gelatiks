<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content rounded-4">
            <div class="modal-header bg-pink text-white rounded-top-4 p-4">
                <h5 class="modal-title fw-semibold" id="editModalLabel">
                    <i class="bi bi-briefcase-fill me-2"></i>Edit Partnership
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>

            <form action="{{ route('partnership.update', $partnership->id) }}" enctype="multipart/form-data" method="POST" class="needs-validation" novalidate>
                @csrf
                @method('PUT')

                <div class="modal-body overflow-auto" style="max-height:70vh;">
                    <div class="row g-4 p-2">
                        <div class="col-md-12">
                            <label class="form-label mb-1">Name</label>
                            <input type="text" class="form-control py-2" name="name" value="{{ $partnership->name }}" required>
                            <div class="invalid-feedback">Nama partnership wajib diisi.</div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label mb-1">Start Contract</label>
                            <input type="date" class="form-control py-2" name="start_contract" value="{{ \Carbon\Carbon::parse($partnership->start_contract)->format('Y-m-d') }}" required>
                            <div class="invalid-feedback">Tanggal mulai kontrak wajib diisi.</div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label mb-1">End Contract</label>
                            <input type="date" class="form-control py-2" name="end_contract" value="{{ \Carbon\Carbon::parse($partnership->end_contract)->format('Y-m-d') }}" required>
                            <div class="invalid-feedback">Tanggal akhir kontrak wajib diisi.</div>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label mb-1">Image</label><br>
                            @if ($partnership->image)
                                <small class="text-muted">Saat ini:</small><br>
                                <img src="{{ asset('storage/' . $partnership->image) }}" alt="Image" class="img-fluid mb-2 rounded" style="max-height: 100px;">
                            @endif
                            <div class="input-group mt-2">
                                <input type="file" class="form-control py-2" name="image" id="editImageInput">
                            </div>
                            <small class="text-danger d-none" id="editImageError"></small>
                        </div>
                    </div>
                </div>

                <div class="modal-footer d-flex justify-content-between p-1 sticky-bottom bg-white">
                    <button type="button" class="btn btn-outline-none" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

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

    // Validasi file hanya jpg/jpeg/png/webp + max 5MB, tolak PDF
    const editImageInput = document.getElementById('editImageInput');
    const editErrorText = document.getElementById('editImageError');
    const MAX_SIZE = 5 * 1024 * 1024; // 5MB

    if (editImageInput) {
        editImageInput.addEventListener('change', function () {
            const file = this.files[0];
            if (file) {
                const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/webp'];
                if (!allowedTypes.includes(file.type)) {
                    editErrorText.textContent = "File harus berupa JPG, JPEG, PNG, atau WEBP. File PDF tidak diperbolehkan.";
                    editErrorText.classList.remove('d-none');
                    this.value = ''; // reset input
                } else if (file.size > MAX_SIZE) {
                    editErrorText.textContent = "Ukuran file maksimal 5MB.";
                    editErrorText.classList.remove('d-none');
                    this.value = ''; // reset input
                } else {
                    editErrorText.classList.add('d-none');
                }
            } else {
                editErrorText.classList.add('d-none');
            }
        });
    }
})();
</script>