<!-- Modal -->
<div class="modal fade" id="updateModalAccnt" tabindex="-1" aria-labelledby="updateModalAccntLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content rounded-4">
            <div class="modal-header bg-pink text-white rounded-top-4 p-4">
                <h5 class="modal-title fw-semibold" id="updateModalAccntLabel">
                    <i class="bi bi-person-lines-fill me-2"></i>Update Akun
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="{{ route('update.account', $editAccnt->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row g-4 p-2 mb-3">
                        <div class="col-md-6">
                            <label class="form-label mb-1">Username</label>
                            <input type="text" name="username" class="form-control py-2"
                                value="{{ $editAccnt->username }}" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label mb-1">Email</label>
                            <input type="text" name="Email" class="form-control py-2"
                                value="{{ $editAccnt->email }}" readonly>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label mb-1">Password</label>
                            <input type="text" name="password" class="form-control py-2"
                                placeholder="Masukkan password baru">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label mb-1">Comfirm Password</label>
                            <input type="text" name="password_confirmation" class="form-control py-2"
                                placeholder="Konfirmasi password anda">
                        </div>
                    </div>

                    <div class="modal-footer d-flex justify-content-between">
                        <button type="button" class="btn btn-outline-none" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
