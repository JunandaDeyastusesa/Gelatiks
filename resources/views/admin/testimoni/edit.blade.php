<!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content rounded-4">
            <div class="modal-header text-white rounded-top-4 p-4" style="background-color:#d63384;">
                <h5 class="modal-title fw-semibold" id="editModalLabel">
                    <i class="bi bi-chat-right-text me-2"></i>Edit Testimoni
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="{{ route('testimoni.update', $testimoni->id) }}" method="POST"
                    enctype="multipart/form-data" class="needs-validation" novalidate>
                    @csrf
                    @method('PUT')

                    <div class="row g-4 p-2">
                        <div class="col-md-6">
                            <label class="form-label mb-1">Name</label>
                            <input type="text" class="form-control py-2" name="name"
                                value="{{ $testimoni->name }}" placeholder="Input name" required>
                            <div class="invalid-feedback">Nama wajib diisi.</div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label mb-1">Position</label>
                            <input type="text" class="form-control py-2" name="job_title"
                                value="{{ $testimoni->job_title }}" placeholder="Input position" required>
                            <div class="invalid-feedback">Posisi wajib diisi.</div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label mb-1">Image</label>
                            @if (!empty($testimoni->image))
                                <div class="mb-2">
                                    <small class="text-muted">Saat ini:</small><br>
                                    <img src="{{ asset('storage/' . $testimoni->image) }}" alt="Cover Image"
                                        class="img-fluid rounded shadow-sm mt-1" width="180">
                                </div>
                            @endif
                            <input type="file" id="editImage" class="form-control py-2" name="image">
                            <div id="editImageFeedback" class="invalid-feedback">
                                Harap upload gambar (PNG, JPG, atau JPEG).
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label mb-1">Status</label>
                            <select class="form-select py-2" name="status" required>
                                <option value="" disabled>Pilih status</option>
                                <option value="Published" {{ $testimoni->status == 'Published' ? 'selected' : '' }}>
                                    Published</option>
                                <option value="Draft" {{ $testimoni->status == 'Draft' ? 'selected' : '' }}>Draft
                                </option>
                            </select>
                            <div class="invalid-feedback">Status wajib dipilih.</div>
                        </div>

                        <div class="col-12">
                            <label class="form-label mb-1">Testimoni</label>
                            <textarea class="form-control py-2" name="testimony" rows="3" placeholder="Input testimoni" required>{{ $testimoni->testimony }}</textarea>
                            <div class="invalid-feedback">Testimoni wajib diisi.</div>
                        </div>
                    </div>

                    <div class="modal-footer d-flex justify-content-between">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Script Validasi untuk Modal Edit -->
<script>
    (() => {
        'use strict';

        const editModal = document.getElementById('editModal');
        if (!editModal) return;

        const editForm = editModal.querySelector('form.needs-validation');
        const imageInput = document.getElementById('editImage');
        const feedback = document.getElementById('editImageFeedback');
        const allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
        const maxSize = 5 * 1024 * 1024; // 5 MB

        // ✅ Validasi realtime saat pilih file
        imageInput.addEventListener('change', () => {
            if (imageInput.files.length) {
                const file = imageInput.files[0];

                if (!allowedTypes.includes(file.type)) {
                    // Jika format salah
                    feedback.textContent =
                        "File harus berupa PNG, JPG, atau JPEG. Atau biarkan kosong untuk tetap menggunakan gambar lama.";
                    imageInput.setCustomValidity("invalid");
                    imageInput.classList.add('is-invalid');
                    imageInput.classList.remove('is-valid');
                    imageInput.value = "";
                } else if (file.size > maxSize) {
                    // Jika ukuran terlalu besar
                    feedback.textContent =
                        "Ukuran file maksimal 5MB. Atau biarkan kosong untuk tetap menggunakan gambar lama.";
                    imageInput.setCustomValidity("invalid");
                    imageInput.classList.add('is-invalid');
                    imageInput.classList.remove('is-valid');
                    imageInput.value = "";
                } else {
                    // Jika valid
                    imageInput.setCustomValidity("");
                    imageInput.classList.add('is-valid');
                    imageInput.classList.remove('is-invalid');
                    feedback.textContent = "";
                }
            } else {
                // Input kosong tetap valid (untuk edit)
                imageInput.setCustomValidity("");
                imageInput.classList.remove('is-invalid', 'is-valid');
                feedback.textContent = "";
            }
        });

        // ✅ Validasi saat submit
        editForm.addEventListener('submit', (event) => {
            let isValid = true;
            let message = "";

            if (imageInput.files.length) {
                const file = imageInput.files[0];

                if (!allowedTypes.includes(file.type)) {
                    isValid = false;
                    message =
                        "File harus berupa PNG, JPG, atau JPEG. Atau biarkan kosong untuk tetap menggunakan gambar lama.";
                } else if (file.size > maxSize) {
                    isValid = false;
                    message =
                        "Ukuran file maksimal 5MB. Atau biarkan kosong untuk tetap menggunakan gambar lama.";
                }

                if (!isValid) {
                    feedback.textContent = message;
                    imageInput.setCustomValidity("invalid");
                    imageInput.classList.add('is-invalid');
                    imageInput.classList.remove('is-valid');
                    event.preventDefault();
                    event.stopPropagation();
                } else {
                    imageInput.setCustomValidity("");
                }
            } else {
                imageInput.setCustomValidity(""); // Kosong tetap valid
            }

            if (!editForm.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }

            editForm.classList.add('was-validated');
        });
    })();
</script>
