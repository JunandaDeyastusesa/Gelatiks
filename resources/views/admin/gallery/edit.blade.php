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

            <form action="{{ route('gallery.update', $gallery->id) }}" enctype="multipart/form-data" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row g-4 p-2">
                        <div class="col-md-12">
                            <label class="form-label mb-1">Name</label>
                            <input type="text" class="form-control py-2" name="title" value="{{ $gallery->title }}" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label mb-1">Photo</label>
                            @if (!empty($gallery->image))
                                <small class="text-muted"> saat ini:</small><br>
                                <img src="{{ asset('storage/' . $gallery->image) }}" alt="Gallery Image"
                                    class="img-fluid mt-2 rounded" width="240">
                            @endif
                            <div class="input-group mt-2">
                                <input type="file" class="form-control py-2" name="image">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label mb-1">Status</label>
                            <select class="form-select py-2" name="status" required>
                                <option value="Published" {{ $gallery->status == 'Published' ? 'selected' : '' }}>
                                    Published</option>
                                <option value="Draft" {{ $gallery->status == 'Draft' ? 'selected' : '' }}>Draft
                            </option>
                            </select>
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
