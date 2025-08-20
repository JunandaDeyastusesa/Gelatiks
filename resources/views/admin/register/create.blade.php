<!-- Modal Create Registration -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="createUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content rounded-4">
            <div class="modal-header bg-pink text-white rounded-top-4 p-4">
                <h5 class="modal-title fw-semibold" id="createUserModalLabel">
                    <i class="pe-2 fs-5 bi bi-person-plus"></i> Tambah User Baru
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="{{ route('admin.register.store') }}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    <div class="row g-4 p-2">
                        <div class="col-md-6">
                            <label for="name" class="form-label mb-1">Nama</label>
                            <input type="text" name="name" class="form-control py-2" required placeholder="Input name">
                            <div class="invalid-feedback">Nama wajib diisi.</div>
                        </div>

                        <div class="col-md-6">
                            <label for="email" class="form-label mb-1">Email</label>
                            <input type="email" name="email" class="form-control py-2" required placeholder="Input email">
                            <div class="invalid-feedback">Email tidak valid.</div>
                        </div>

                        <div class="col-md-6">
                            <label for="phone" class="form-label mb-1">Telepon</label>
                            <input type="text" name="phone" class="form-control py-2" required placeholder="Input phone">
                            <div class="invalid-feedback">Nomor telepon wajib diisi.</div>
                        </div>

                        <div class="col-md-6">
                            <label for="role" class="form-label mb-1">Role</label>
                            <select name="role" class="form-select py-2" required>
                                <option value="" disabled selected>-- Pilih Role --</option>
                                <option value="admin">Admin</option>
                                <option value="hr">HR</option>
                            </select>
                            <div class="invalid-feedback">Pilih role terlebih dahulu.</div>
                        </div>

                        <div class="col-md-6">
                            <label for="password" class="form-label mb-1">Password</label>
                            <input type="password" name="password" class="form-control py-2" required placeholder="Input password">
                            <div class="invalid-feedback">Password wajib diisi.</div>
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

<script>
    (() => {
        'use strict';
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
