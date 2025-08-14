<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content rounded-4">
            <div class="modal-header bg-pink text-white rounded-top-4 p-4">
                <h5 class="modal-title fw-semibold" id="showModalLabel">
                    <i class="pe-2 fs-5 bi bi-map"></i>Edit Coverage
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
<!-- Form Edit Coverage -->


<form action="{{ route('coverage.update', $cover->id) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="provinsi" class="form-label">Province Coverage</label>
        <input type="number" class="form-control" id="provinsi" name="qty_province" value="{{ $cover->qty_province }}" required>
        <div class="invalid-feedback">Provinsi wajib diisi.</div>
    </div>

    <div class="mb-3">
        <label for="happy_client" class="form-label">Happy Client</label>
        <input type="number" class="form-control" id="qty_clients" name="qty_clients" value="{{ $cover->qty_clients }}" min="0" required>
        <div class="invalid-feedback">Happy Client wajib diisi.</div>
    </div>

    <div class="mb-3">
        <label for="years_experience" class="form-label">Years Experience</label>
        <input type="number" class="form-control" id="qty_experience" name="qty_experience" value="{{ $cover->qty_experience }}" min="0" required>
        <div class="invalid-feedback">Years Experience wajib diisi.</div>
    </div>

    <button type="submit" class="btn btn-primary">Update Coverage</button>
</form>


   <script>
        (() => {
            'use strict';
            // Ambil semua form dengan class needs-validation
            const forms = document.querySelectorAll('.needs-validation');

            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });

        })();
    </script>

</div>
    </div>
</div>
