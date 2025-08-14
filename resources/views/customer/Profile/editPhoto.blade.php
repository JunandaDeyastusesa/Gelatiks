<!-- Modal -->
<div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="updateModalPhoto" tabindex="-1"
    aria-labelledby="updateModalPhotoLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content rounded-4">
            <div class="modal-header bg-pink text-white rounded-top-4 p-4">
                <h5 class="modal-title fw-semibold" id="showModalLabel">
                    <i class="bi bi-image-fill me-2"></i>Update Photo
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="{{ route('update.photo', ['id' => $editPhoto->id]) }}" enctype="multipart/form-data"
                    method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row g-4 p-2">

                        <div class="col-md-12">
                            <label class="form-label mb-1">Photo Profile</label>
                            <small class="text-muted"> saat ini:</small><br>
                            <div class="d-flex flex-column flex-md-row align-items-start gap-3">
                                @if (!empty($editPhoto->photo))
                                    <div>
                                        <img src="{{ asset('storage/' . $editPhoto->photo) }}" alt="Foto Profil"
                                            class="rounded shadow-sm border w-100"
                                            style="max-width: 250px; height: auto; object-fit: cover;">
                                    </div>
                                @endif
                                <div class="w-100">
                                    <div class="input-group">
                                        <input type="file" name="photo" class="form-control py-2">
                                    </div>
                                    <small class="form-text text-muted mt-1">Ukuran maksimal 2MB. Format: JPG, JPEG,
                                        PNG.</small>
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
</div>
