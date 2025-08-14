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
                        </div>

                        <div class="col-md-12">
                            <label class="form-label mb-1">Photo</label>
                            <div class="input-group">
                                <input type="file" class="form-control py-2" name="image" required>
                                <div class="invalid-feedback">
                                    Photo wajib diisi.
                                </div>
                            </div>
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
})();
</script>
