<!-- Modal Create Registration -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="createUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content rounded-4">
            <div class="modal-header bg-pink text-white rounded-top-4 p-4">
                <h5 class="modal-title fw-semibold" id="createUserModalLabel">
                    <i class="pe-2 fs-5 bi bi-person-plus"></i> Tambah User Baru
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="{{ route('admin.register.store') }}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    <div class="row g-4 p-2">

                        <!-- Username -->
                        <div class="col-md-6">
                            <label for="username" class="form-label mb-1">Nama</label>
                            <input type="text" name="username"
                                class="form-control py-2 @error('username') is-invalid @enderror"
                                placeholder="Input name" value="{{ old('username') }}" required>
                            @error('username')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @else
                                <div class="invalid-feedback">Nama wajib diisi.</div>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="col-md-6">
                            <label for="email" class="form-label mb-1">Email</label>
                            <input type="email" name="email"
                                class="form-control py-2 @error('email') is-invalid @enderror" placeholder="Input email"
                                value="{{ old('email') }}" required>
                            @error('email')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @else
                                <div class="invalid-feedback">Email tidak valid.</div>
                            @enderror
                        </div>

                        <!-- Role -->
                        <div class="col-md-6">
                            <label for="role" class="form-label mb-1">Role</label>
                            <select name="role" class="form-select py-2 @error('role') is-invalid @enderror"
                                required>
                                <option value="" disabled {{ old('role') ? '' : 'selected' }}>-- Pilih Role --
                                </option>
                                <option value="Admin" {{ old('role') == 'Admin' ? 'selected' : '' }}>Admin</option>
                                <option value="HRD" {{ old('role') == 'HRD' ? 'selected' : '' }}>HRD</option>
                            </select>
                            @error('role')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @else
                                <div class="invalid-feedback">Pilih role terlebih dahulu.</div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="col-md-6">
                            <label for="password" class="form-label mb-1">Password</label>
                            <input type="password" name="password"
                                class="form-control py-2 @error('password') is-invalid @enderror"
                                placeholder="Input password" required>
                            @error('password')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @else
                                <div class="invalid-feedback">Password wajib diisi.</div>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div class="col-md-6 mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" name="password_confirmation"
                                class="form-control @error('password') is-invalid @enderror" required>
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
