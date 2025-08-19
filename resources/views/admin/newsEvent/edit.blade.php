<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content rounded-4">
            <div class="modal-header bg-pink text-white rounded-top-4 p-4">
                <h5 class="modal-title fw-semibold" id="editModalLabel">
                    <i class="bi bi-briefcase-fill me-2"></i>Edit News & Event
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>

            <!-- body scrollable -->
            <div class="modal-body">
                <form class="needs-validation" novalidate id="editNewsForm"
                      action="{{ route('newsEvent.update', $news->id) }}"
                      enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row g-4 p-2">
                        <div class="col-md-12">
                            <label class="form-label mb-1">Title</label>
                            <input type="text" class="form-control py-2" name="title"
                                   value="{{ $news->title }}" required>
                            <div class="invalid-feedback">Title wajib diisi.</div>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label mb-1">Date Event</label>
                            <input type="date" class="form-control py-2" name="event_date"
                                   value="{{ \Carbon\Carbon::parse($news->event_date)->format('Y-m-d') }}" required>
                            <div class="invalid-feedback">Tanggal event wajib diisi.</div>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label mb-1">Image</label>
                            @if (!empty($news->image))
                                <small class="text-muted"> saat ini:</small><br>
                                <img src="{{ asset('storage/' . $news->image) }}" alt="Cover Image"
                                    class="img-fluid mt-2 rounded" width="240">
                            @endif
                            <div class="input-group">
                                <input type="file" class="form-control py-2" name="image" id="editNewsImage">
                            </div>
                            <small class="text-danger d-none" id="editNewsImageError"></small>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label mb-1">Status Event</label>
                            <select class="form-select py-2" name="status" required>
                                <option value="Published" {{ $news->status == 'Published' ? 'selected' : '' }}>Published</option>
                                <option value="Draft" {{ $news->status == 'Draft' ? 'selected' : '' }}>Draft</option>
                            </select>
                            <div class="invalid-feedback">Status wajib diisi.</div>
                        </div>

                        <div class="col-12">
                            <label class="form-label mb-1">Description</label>
                            <textarea class="form-control py-2" name="content" rows="5" placeholder="Input description" required>{{ $news->content }}</textarea>
                            <div class="invalid-feedback">Description wajib diisi.</div>
                        </div>
                    </div>
                </form>
            </div>

            <!-- footer tetap, tidak ikut scroll -->
            <div class="modal-footer d-flex justify-content-between">
                <button type="button" class="btn btn-outline-none" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary" form="editNewsForm">Update</button>
            </div>
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

    // Validasi file hanya jpg/jpeg/png + max 5MB di Edit News & Event
    const editImageInput = document.getElementById('editNewsImage');
    const editErrorText = document.getElementById('editNewsImageError');
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
                editErrorText.classList.add('d-none');
            }
        });
    }
})();
</script>
