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

            <form action="{{ route('partnership.store') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row g-4 p-2">
                        <div class="col-md-12">
                            <label class="form-label mb-1">Name</label>
                            <input type="text" class="form-control py-2" name="name" placeholder="Input name"
                                required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label mb-1">Start Contract</label>
                            <input type="date" class="form-control py-2" name="start_contract" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label mb-1">End Contract</label>
                            <input type="date" class="form-control py-2" name="end_contract" required>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label mb-1">Image</label>
                            <input type="file" class="form-control py-2" name="image" required>
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
