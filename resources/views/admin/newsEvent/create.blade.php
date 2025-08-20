<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content rounded-4">
            <div class="modal-header bg-pink text-white rounded-top-4 p-4">
                <h5 class="modal-title fw-semibold" id="showModalLabel">
                    <i class="bi bi-briefcase-fill me-2"></i>Add News Event
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>

            <form class="needs-validation" novalidate action="{{ route('newsEvent.store') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row g-4 p-2">
                        <div class="col-md-12">
                            <label class="form-label mb-1">Title</label>
                            <input type="text" class="form-control py-2" name="title"
                                placeholder="Input title" required>
                            <div class="invalid-feedback">Title wajib diisi.</div>
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label class="form-label mb-1">Date Event</label>
                            <div class="input-group">
                                <input type="date" class="form-control py-2" name="event_date" required>
                                <div class="invalid-feedback">Tanggal event wajib diisi.</div>
                            </div>
                            @error('event_date')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label class="form-label mb-1">Image</label>
                            <div class="input-group">
                                <input type="file" class="form-control py-2" name="image" id="newsImageInput" required>
                                <div class="invalid-feedback" id="newsImageFeedback"></div>
                            </div>
                            @error('image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label class="form-label mb-1">Status Event</label>
                            <select class="form-select py-2" name="status" required>
                                <option value="Published">Published</option>
                                <option value="Draft">Draft</option>
                            </select>
                            <div class="invalid-feedback">Status wajib diisi.</div>
                            @error('status')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label mb-1">Description</label>
                            <textarea class="form-control py-2" name="content" rows="3" placeholder="Input description" required></textarea>
                            <div class="invalid-feedback">Description wajib diisi.</div>
                            @error('content')
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
    const imageInput = document.getElementById('newsImageInput');
    const feedback = document.getElementById('newsImageFeedback');

    const MAX_SIZE = 5 * 1024 * 1024; // 5MB
    const allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];

    if (imageInput) {
        imageInput.addEventListener('change', () => {
            if (!imageInput.files.length) {
                feedback.textContent = "Harap upload gambar (PNG, JPG, atau JPEG).";
                imageInput.setCustomValidity("required");
                imageInput.classList.add('is-invalid');
                imageInput.classList.remove('is-valid');
            } else {
                const file = imageInput.files[0];

                if (!allowedTypes.includes(file.type)) {
                    feedback.textContent = "File harus berupa PNG, JPG, atau JPEG.";
                    imageInput.value = "";
                    imageInput.setCustomValidity("invalid");
                    imageInput.classList.add('is-invalid');
                    imageInput.classList.remove('is-valid');
                } else if (file.size > MAX_SIZE) {
                    feedback.textContent = "Ukuran file maksimal 5MB.";
                    imageInput.value = "";
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
    }

    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
            let valid = true;

            if (!imageInput.files.length) {
                feedback.textContent = "Harap upload gambar (PNG, JPG, atau JPEG).";
                imageInput.setCustomValidity("required");
                valid = false;
            } else {
                const file = imageInput.files[0];
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
