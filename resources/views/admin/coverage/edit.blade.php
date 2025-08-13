<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content rounded-4">
            <div class="modal-header bg-pink text-white rounded-top-4 p-4">
                <h5 class="modal-title fw-semibold" id="showModalLabel">
                    <i class="bi bi-briefcase-fill me-2"></i>Edit News & Event
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>

            <form action="{{ route('coverage.update', $cover->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row g-4 p-2">
                        <div class="mb-3 col-md-4">
                            <label for="provinsi" class="form-label">Province Coverage</label>
                            <input type="number" class="form-control" id="provinsi" name="qty_province"
                                value="{{ $cover->qty_province }}" required>
                        </div>

                        <div class="mb-3 col-md-4">
                            <label for="happy_client" class="form-label">Happy Client</label>
                            <input type="number" class="form-control" id="qty_clients" name="qty_clients"
                                value="{{ $cover->qty_clients }}" min="0" required>
                        </div>

                        <div class="mb-3 col-md-4">
                            <label for="years_experience" class="form-label">Years Experience</label>
                            <input type="number" class="form-control" id="qty_experience" name="qty_experience"
                                value="{{ $cover->qty_experience }}" min="0" required>
                        </div>
                    </div>
                </div>

                <div class="modal-footer d-flex justify-content-between">
                    <button type="button" class="btn btn-outline-none" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>

        </div>
    </div>
</div>
