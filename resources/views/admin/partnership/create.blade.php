<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content rounded-4">
            <div class="modal-header bg-pink text-white rounded-top-4 p-4">
                <h5 class="modal-title fw-semibold" id="showModalLabel">
                    <i class="pe-2 fs-5 bi bi-person-check"></i>Add partnership
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>

            <div class="modal-body">
            <form action="{{ route('partnership.store') }}" enctype="multipart/form-data" method="POST" class="needs-validation" novalidate>
                @csrf
                    <div class="row g-4 p-2">
                        <div class="col-md-12">
                            <label class="form-label mb-1">Name</label>
                            <input type="text" class="form-control py-2" name="name" placeholder="Input name" required>
                            <div class="invalid-feedback">Nama partnership wajib diisi.</div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label mb-1">Start Contract</label>
                            <input type="date" class="form-control py-2" name="start_contract" required>
                            <div class="invalid-feedback">Tanggal mulai kontrak wajib diisi.</div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label mb-1">End Contract</label>
                            <input type="date" class="form-control py-2" name="end_contract" required>
                            <div class="invalid-feedback">Tanggal akhir kontrak wajib diisi.</div>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label mb-1">Image</label>
                            <input type="file" class="form-control py-2" name="image" id="imageInput" required>
                            <div class="invalid-feedback" id="imageFeedback">Gambar partnership wajib diunggah.</div>
                        </div>
                    </div>

                    <div class="modal-footer d-flex justify-content-between">
                        <button type="button" class="btn btn-outline-none" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
(() => {
    'use strict';
    const forms = document.querySelectorAll('.needs-validation');
    const imageInput = document.getElementById('imageInput');
    const imageFeedback = document.getElementById('imageFeedback');
    const MAX_SIZE = 5 * 1024 * 1024; // 5MB

    if (imageInput) {
        imageInput.addEventListener('change', () => {
            if (!imageInput.files.length) {
                imageFeedback.textContent = "Gambar partnership wajib diunggah.";
                imageInput.setCustomValidity("required");
                imageInput.classList.add('is-invalid');
                imageInput.classList.remove('is-valid');
            } else {
                const file = imageInput.files[0];
                const allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/webp'];
                if (!allowedTypes.includes(file.type)) {
                    imageFeedback.textContent = "File harus berupa JPG, JPEG, PNG, atau WEBP. File PDF tidak diperbolehkan.";
                    imageInput.value = "";
                    imageInput.setCustomValidity("invalid");
                    imageInput.classList.add('is-invalid');
                    imageInput.classList.remove('is-valid');
                } else if (file.size > MAX_SIZE) {
                    imageFeedback.textContent = "Ukuran file maksimal 5MB.";
                    imageInput.value = "";
                    imageInput.setCustomValidity("invalid");
                    imageInput.classList.add('is-invalid');
                    imageInput.classList.remove('is-valid');
                } else {
                    imageInput.setCustomValidity("");
                    imageInput.classList.add('is-valid');
                    imageInput.classList.remove('is-invalid');
                    imageFeedback.textContent = "";
                }
            }
        });
    }

    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
            let valid = true;
            if (imageInput) {
                if (!imageInput.files.length) {
                    imageFeedback.textContent = "Gambar partnership wajib diunggah.";
                    imageInput.setCustomValidity("required");
                    valid = false;
                } else {
                    const file = imageInput.files[0];
                    const allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/webp'];
                    if (!allowedTypes.includes(file.type)) {
                        imageFeedback.textContent = "File harus berupa JPG, JPEG, PNG, atau WEBP. File PDF tidak diperbolehkan.";
                        imageInput.setCustomValidity("invalid");
                        valid = false;
                    } else if (file.size > MAX_SIZE) {
                        imageFeedback.textContent = "Ukuran file maksimal 5MB.";
                        imageInput.setCustomValidity("invalid");
                        valid = false;
                    } else {
                        imageInput.setCustomValidity("");
                    }
                }
            }
            if (!valid || !form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
    });
})();
</script>
