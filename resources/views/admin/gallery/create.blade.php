<!-- Modal Create Gallery -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content rounded-4">
            <div class="modal-header bg-pink text-white rounded-top-4 p-4">
                <h5 class="modal-title fw-semibold" id="addModalLabel">
                    <i class="bi bi-images me-2"></i>Add Gallery
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>

            <form class="needs-validation" novalidate action="{{ route('gallery.store') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row g-4 p-2">
                        <div class="col-md-6">
                            <label class="form-label mb-1">Name</label>
                            <input type="text" class="form-control py-2" name="title" placeholder="Input name" required>
                            <div class="invalid-feedback">
                                Name wajib diisi.
                            </div>
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label mb-1">Status</label>
                            <select class="form-select py-2" name="status" required>
                                <option value="Published">Published</option>
                                <option value="Draft">Draft</option>
                            </select>
                            <div class="invalid-feedback">
                                Status wajib diisi.
                            </div>
                            @error('status')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <label class="form-label mb-1">Photo</label>
                            <div class="input-group">
                                <input type="file" class="form-control py-2" name="image" id="addImageInput" required>
                                <div class="invalid-feedback" id="addImageFeedback"></div>
                            </div>
                            @error('image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
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

<script>
(() => {
    'use strict';
    const forms = document.querySelectorAll('.needs-validation');
    const imageInput = document.getElementById('addImageInput');
    const feedback = document.getElementById('addImageFeedback');

    const MAX_SIZE = 5 * 1024 * 1024; // 5MB dalam byte

    // Realtime validasi saat pilih file
    imageInput.addEventListener('change', () => {
        if (!imageInput.files.length) {
            feedback.textContent = "Harap upload gambar (PNG, JPG, atau JPEG).";
            imageInput.setCustomValidity("required");
            imageInput.classList.add('is-invalid');
            imageInput.classList.remove('is-valid');
        } else {
            const file = imageInput.files[0];
            const allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];

            if (!allowedTypes.includes(file.type)) {
                feedback.textContent = "File harus berupa PNG, JPG, atau JPEG.";
                imageInput.value = ""; // reset input supaya file tidak nyangkut
                imageInput.setCustomValidity("invalid");
                imageInput.classList.add('is-invalid');
                imageInput.classList.remove('is-valid');
            } else if (file.size > MAX_SIZE) {
                feedback.textContent = "Ukuran file maksimal 5MB.";
                imageInput.value = ""; // reset input biar tidak bisa submit
                imageInput.setCustomValidity("invalid");
                imageInput.classList.add('is-invalid');
                imageInput.classList.remove('is-valid');
            } else {
                imageInput.setCustomValidity("");
                imageInput.classList.add('is-valid');
                imageInput.classList.remove('is-invalid');
                feedback.textContent = "";
            }
        }
    });

    // Validasi saat submit
    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
            let valid = true;

            if (!imageInput.files.length) {
                feedback.textContent = "Harap upload gambar (PNG, JPG, atau JPEG).";
                imageInput.setCustomValidity("required");
                valid = false;
            } else {
                const file = imageInput.files[0];
                const allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];

                if (!allowedTypes.includes(file.type)) {
                    feedback.textContent = "File harus berupa PNG, JPG, atau JPEG.";
                    imageInput.setCustomValidity("invalid");
                    valid = false;
                } else if (file.size > MAX_SIZE) {
                    feedback.textContent = "Ukuran file maksimal 5MB.";
                    imageInput.setCustomValidity("invalid");
                    valid = false;
                } else {
                    imageInput.setCustomValidity("");
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
