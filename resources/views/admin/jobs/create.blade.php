<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content rounded-4">
            <div class="modal-header bg-pink text-white rounded-top-4 p-4">
                <h5 class="modal-title fw-semibold" id="showModalLabel">
                    <i class="pe-2 fs-5 bi bi-suitcase-lg"></i>Add Jobs
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="{{ route('jobs.store') }}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    <div class="row g-4 p-2">
                        <div class="col-md-6">
                            <label class="form-label mb-1">Jobs name</label>
                            <input type="text" class="form-control py-2" name="jobs_name"
                                placeholder="Input jobs name" required>
                            <div class="invalid-feedback">Nama pekerjaan wajib diisi.</div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label mb-1">Category</label>
                            <select class="form-select py-2" name="category" required>
                                <option value="" selected disabled>Choose category</option>
                                <option value="SPG Inclined">SPG Inclined</option>
                                <option value="SPG Reguler">SPG Reguler</option>
                                <option value="SPG Event">SPG Event</option>
                                <option value="MD (Merchandiser)">MD (Merchandiser)</option>
                                <option value="SMD (Sales Merchandiser)">SMD (Sales Merchandiser)</option>
                                <option value="Team Leader (Supervisor)">Team Leader (Supervisor)</option>
                                <option value="Arco (Area Coordinator)">Arco (Area Coordinator)</option>
                                <option value="STL (Senior Team Leader)">STL (Senior Team Leader)</option>
                                <option value="TL Corporate">TL Corporate</option>
                                <option value="CBS (Corporate Business Support)">CBS (Corporate Business Support)</option>
                                <option value="National Project Coordinator (NPC)">National Project Coordinator (NPC)</option>
                                <option value="Project Manager">Project Manager</option>
                                <option value="Operation Manager">Operation Manager</option>
                            </select>
                            <div class="invalid-feedback">Kategori wajib dipilih.</div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label mb-1">City</label>
                            <input type="text" class="form-control py-2" name="city" placeholder="Input your city"
                                required>
                            <div class="invalid-feedback">Kota wajib diisi.</div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label mb-1">Store name</label>
                            <input type="text" class="form-control py-2" name="store_name"
                                placeholder="Input store name" required>
                            <div class="invalid-feedback">Nama toko wajib diisi.</div>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label mb-1">Minimum school</label>
                            <select class="form-select py-2" name="education" required>
                                <option value="" selected disabled>Choose Minimum school</option>
                                <option value="SMA/SMK">SMA/SMK</option>
                                <option value="SMA Kesehatan"> SMK Kesehatan </option>
                                <option value="Fresh Graduate">Fresh Graduate</option>
                                <option value="S1">S1</option>
                            </select>
                            <div class="invalid-feedback">Pendidikan minimal wajib dipilih.</div>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label mb-1">Quota</label>
                            <input type="number" class="form-control py-2" name="open_position"
                                placeholder="Input min school" min="1" required>
                            <div class="invalid-feedback">Kuota wajib diisi.</div>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label mb-1">Type work</label>
                            <select class="form-select py-2" name="type_work" required>
                                <option value="" selected disabled>Choose Type Work</option>
                                <option value="WFO - Full Time">WFO - Full Time</option>
                                <option value="Partnership">Partnership</option>
                            </select>
                            <div class="invalid-feedback">Jenis kerja wajib dipilih.</div>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label mb-1">Minimum experience</label>
                            <input type="number" class="form-control py-2" name="experience"
                                placeholder="Input min experience" min="0" required>
                            <div class="invalid-feedback">Pengalaman minimal wajib diisi.</div>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label mb-1">Gender</label>
                            <select class="form-select py-2" name="gender" required>
                                <option value="" selected disabled>Choose gender</option>
                                <option value="Pria">Pria</option>
                                <option value="Wanita">Wanita</option>
                                <option value="Pria dan Wanita">Pria dan Wanita</option>
                            </select>
                            <div class="invalid-feedback">Gender wajib dipilih.</div>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label mb-1">Close date</label>
                            <div class="input-group">
                                <input type="date" class="form-control py-2" name="close_date" required>
                                <div class="invalid-feedback">Tanggal tutup wajib diisi.</div>
                            </div>
                        </div>

                        <div class="col-8">
                            <label class="form-label mb-1">Description</label>
                            <textarea class="form-control py-2" name="description" rows="3" placeholder="Input description"></textarea>
                            <!-- <div class="invalid-feedback">Deskripsi wajib diisi</div> -->
                        </div>

                        <div class="col-md-4">
                            <label class="form-label mb-1">Status</label>
                            <select class="form-select py-2" name="status" required>
                                <option value="" selected disabled>Choose status</option>
                                <option value="Open">Open</option>
                                <option value="Closed">Closed</option>
                            </select>
                            <div class="invalid-feedback">Status wajib dipilih.</div>
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
        // Ambil semua form dengan class needs-validation
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

