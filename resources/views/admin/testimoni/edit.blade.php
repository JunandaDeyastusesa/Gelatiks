<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content rounded-4">
            <div class="modal-header bg-pink text-white rounded-top-4 p-4">
                <h5 class="modal-title fw-semibold" id="showModalLabel">
                    <i class="bi bi-briefcase-fill me-2"></i>Edit testimoni
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>

            <form action="{{ route('testimoni.update', $testimoni->id) }}" enctype="multipart/form-data" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row g-4 p-2">
                        <div class="col-md-12">
                            <label class="form-label mb-1">Name</label>
                            <input type="text" class="form-control py-2" name="name" value="{{ $testimoni->name }}"
                                required>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label mb-1">Job Title</label>
                            <input type="text" class="form-control py-2" name="job_title" value="{{ $testimoni->job_title }}"
                                required>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label mb-1">Image</label>
                             @if (!empty($testimoni->image))
                                <small class="text-muted"> saat ini:</small><br>
                                <img src="{{ asset('storage/' . $testimoni->image) }}" alt="Cover Image"
                                    class="img-fluid mt-2 rounded" width="240">
                            @endif
                            <div class="input-group">
                                <input type="file" class="form-control py-2" name="image"> {{-- Removed 'required' as per validation rule --}}
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label mb-1">Status</label>
                            <select class="form-select py-2" name="status" required>
                                <option value="Published" {{ $testimoni->status == 'Published' ? 'selected' : '' }}>
                                    Published</option>
                                <option value="Draft" {{ $testimoni->status == 'Draft' ? 'selected' : '' }}>Draft
                                </option>
                            </select>
                        </div>

                        <div class="col-12">
                            <label class="form-label mb-1">Testimoni</label>
                             <textarea class="form-control py-2" name="testimony" rows="5" placeholder="Input description">{{ $testimoni->testimony }}</textarea>
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
