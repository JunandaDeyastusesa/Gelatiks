<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content rounded-4">
            <div class="modal-header bg-pink text-white rounded-top-4 p-4" style="background-color:#d63384;">
                <h5 class="modal-title fw-semibold" id="addModalLabel">
                    <i class="bi bi-chat-right-text me-2"></i>Add Testimoni
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="{{ route('testimoni.store') }}" method="POST" enctype="multipart/form-data"
                    class="needs-validation" novalidate>
                    @csrf
                    <div class="row g-4 p-2">
                        <div class="col-md-6">
                            <label class="form-label mb-1">Name</label>
                            <input type="text" class="form-control py-2" name="name" placeholder="Input name"
                                required>
                            <div class="invalid-feedback">Nama wajib diisi.</div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label mb-1">Position</label>
                            <input type="text" class="form-control py-2" name="job_title"
                                placeholder="Input position" required>
                            <div class="invalid-feedback">Posisi wajib diisi.</div>
                        </div>

                        <div class="col-md-6">
                            <label for="image">Upload Gambar</label>
                            <input type="file" name="image" id="image" class="form-control" required>
                            <div class="invalid-feedback" id="imageFeedback">
                                Harap upload gambar (PNG, JPG, atau JPEG, maks 5MB).
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label mb-1">Status</label>
                            <select class="form-select py-2" name="status" required>
                                <option value="" disabled selected>Select status</option>
                                <option value="Published">Published</option>
                                <option value="Draft">Draft</option>
                            </select>
                            <div class="invalid-feedback">Status wajib dipilih.</div>
                        </div>

                        <div class="col-12">
                            <label class="form-label mb-1">Testimoni</label>
                            <textarea class="form-control py-2" name="testimony" rows="3" placeholder="Input testimoni" required></textarea>
                            <div class="invalid-feedback">Testimoni wajib diisi.</div>
                        </div>
                    </div>

                    <div class="modal-footer d-flex justify-content-between">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Script Validasi -->
<script>
    (() => {
        'use strict';
        const forms = document.querySelectorAll('.needs-validation');
        const imageInput = document.getElementById('image');
        const feedback = document.getElementById('imageFeedback');

        const maxSize = 5 * 1024 * 1024; // 5 MB
        const allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];

        // cek gambar ketika dipilih
        imageInput.addEventListener('change', () => {
            if (imageInput.files.length) {
                const file = imageInput.files[0];

                if (!allowedTypes.includes(file.type)) {
                    feedback.textContent = "File harus berupa PNG, JPG, atau JPEG.";
                    imageInput.setCustomValidity("invalid");
                    imageInput.classList.add('is-invalid');
                    imageInput.classList.remove('is-valid');

                    // reset input kalau salah
                    imageInput.value = "";
                    return;
                }

                if (file.size > maxSize) {
                    feedback.textContent = "Ukuran file maksimal 5MB.";
                    imageInput.setCustomValidity("invalid");
                    imageInput.classList.add('is-invalid');
                    imageInput.classList.remove('is-valid');

                    // reset input kalau salah
                    imageInput.value = "";
                    return;
                }


                // ✅ valid
                imageInput.setCustomValidity("");
                imageInput.classList.add('is-valid');
                imageInput.classList.remove('is-invalid');
            } else {
                // belum pilih file
                imageInput.setCustomValidity("invalid");
                imageInput.classList.add('is-invalid');
                imageInput.classList.remove('is-valid');
            }
        });

        // bootstrap validasi
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

                        // kosongkan kembali input file kalau salah
                        imageInput.value = "";
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
