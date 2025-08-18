<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content rounded-4">
            <div class="modal-header bg-pink text-white rounded-top-4 p-4">
                <h5 class="modal-title fw-semibold" id="editModalLabel">
                    <i class="bi bi-image-fill me-2"></i>Edit Gallery
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>

            <form class="needs-validation" novalidate action="{{ route('gallery.update', $gallery->id) }}" enctype="multipart/form-data" method="POST">
                @csrf
                @method('PUT')

                <!-- scrollable body -->
                <div class="modal-body overflow-auto" style="max-height:70vh;">
                    <div class="row g-4 p-2">
                        <div class="col-md-12">
                            <label class="form-label mb-1">Name</label>
                            <input type="text" class="form-control py-2" name="title" value="{{ $gallery->title }}" required>
                            <div class="invalid-feedback">
                                Name wajib diisi.
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label mb-1">Photo</label>
                            @if (!empty($gallery->image))
                                <small class="text-muted"> saat ini:</small><br>
                                <img src="{{ asset('storage/' . $gallery->image) }}" alt="Gallery Image"
                                    class="img-fluid mt-2 rounded" width="240">
                            @endif
                            <div class="input-group mt-2">
                                <input type="file" class="form-control py-2" name="image" id="editImageInput">
                            </div>
                            <small class="text-danger d-none" id="editImageError"></small>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label mb-1">Status</label>
                            <select class="form-select py-2" name="status" required>
                                <option value="Published" {{ $gallery->status == 'Published' ? 'selected' : '' }}>Published</option>
                                <option value="Draft" {{ $gallery->status == 'Draft' ? 'selected' : '' }}>Draft</option>
                            </select>
                            <div class="invalid-feedback">
                                Status wajib diisi.
                            </div>
                        </div>
                    </div>
                </div>

                <!-- sticky footer -->
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

    // Validasi file hanya jpg/jpeg/png + max 5MB di Edit
    const editImageInput = document.getElementById('editImageInput');
    const editErrorText = document.getElementById('editImageError');
    const MAX_SIZE = 5 * 1024 * 1024; // 5MB

    if (editImageInput) {
        editImageInput.addEventListener('change', function () {
            const file = this.files[0];
            if (file) {
                const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png'];
                if (!allowedTypes.includes(file.type)) {
                    editErrorText.textContent = "File harus berupa JPG, JPEG, atau PNG.";
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
                // kalau user batal pilih file, sembunyikan pesan error
                editErrorText.classList.add('d-none');
            }
        });
    }
})();
</script>
