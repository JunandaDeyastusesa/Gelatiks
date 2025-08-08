<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content rounded-4">
            <div class="modal-header bg-pink text-white rounded-top-4 p-4">
                <h5 class="modal-title fw-semibold" id="showModalLabel">
                    <i class="bi bi-briefcase-fill me-2"></i>Edit Partnership
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>

            <form action="{{ route('partnership.update', $partnership->id) }}" enctype="multipart/form-data" method="POST">
                @csrf
                @method('PUT')

                <div class="modal-body">
                    <div class="row g-4 p-2">

                        <!-- Name -->
                        <div class="col-md-12">
                            <label class="form-label mb-1">Name</label>
                            <input type="text" class="form-control py-2" name="name" value="{{ $partnership->name }}" required>
                        </div>

                        <!-- Start Contract -->
                        <div class="col-md-6">
                            <label class="form-label mb-1">Start Contract</label>
                            <input type="date" class="form-control py-2" name="start_contract" value="{{ \Carbon\Carbon::parse($partnership->start_contract)->format('Y-m-d') }}" required>
                        </div>

                        <!-- End Contract -->
                        <div class="col-md-6">
                            <label class="form-label mb-1">End Contract</label>
                            <input type="date" class="form-control py-2" name="end_contract" value="{{ \Carbon\Carbon::parse($partnership->end_contract)->format('Y-m-d') }}" required>
                        </div>

                        <!-- Image -->
                        <div class="col-md-12">
                            <label class="form-label mb-1">Image</label><br>
                            @if ($partnership->image)
                                <small class="text-muted">Saat ini:</small><br>
                                <img src="{{ asset('storage/' . $partnership->image) }}" alt="Image" class="img-fluid mb-2 rounded" style="max-height: 100px;">
                            @endif
                            <input type="file" class="form-control py-2 mt-2" name="image">
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
