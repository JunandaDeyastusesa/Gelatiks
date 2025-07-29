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

            <form action="{{ route('newsEvent.store') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row g-4 p-2">
                        <div class="col-md-12">
                            <label class="form-label mb-1">Title</label>
                            <input type="text" class="form-control py-2" name="title"
                                placeholder="Input title" required>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label mb-1">Date Event</label>
                            <div class="input-group">
                                <input type="date" class="form-control py-2" name="event_date" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label mb-1">Image</label>
                            <div class="input-group">
                                <input type="file" class="form-control py-2" name="image" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label mb-1">Status Event</label>
                            <select class="form-select py-2" name="status" required>
                                <option value="Published">Published</option>
                                <option value="Draft">Draft</option>
                            </select>
                        </div>

                        <div class="col-12">
                            <label class="form-label mb-1">Description</label>
                            <textarea class="form-control py-2" name="content" rows="3" placeholder="Input description"></textarea>
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
