<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content rounded-4">
            <div class="modal-header bg-pink text-white rounded-top-4 p-4">
                <h5 class="modal-title fw-semibold" id="showModalLabel">
                    <i class="pe-2 fs-5 bi bi-suitcase-lg"></i>Edit Jobs
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="{{ route('jobs.update', $job->id) }}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    @method('PUT')
                    <div class="row g-4 p-2">
                        <div class="col-md-6">
                            <label class="form-label mb-1">Jobs name</label>
                            <input type="text" class="form-control py-2" name="jobs_name"
                                value="{{ old('jobs_name', $job->jobs_name) }}" placeholder="Input jobs name" required>
                            <div class="invalid-feedback">Nama pekerjaan wajib diisi.</div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label mb-1">Category</label>
                            <select class="form-select py-2" name="category" required>
                                <option value="" disabled selected>Choose category</option>
                                <option value="spg_inclined" @selected($job->category == 'spg_inclined')>SPG Inclined</option>
                                <option value="spg_reguler" @selected($job->category == 'spg_reguler')>SPG Reguler</option>
                                <option value="spg_event" @selected($job->category == 'spg_event')>SPG Event</option>
                                <option value="md_merchandiser" @selected($job->category == 'md_merchandiser')>MD (Merchandiser)</option>
                                <option value="smd" @selected($job->category == 'smd')>SMD (Sales Merchandiser)</option>
                                <option value="team_leader" @selected($job->category == 'team_leader')>Team Leader (Supervisor)
                                </option>
                                <option value="arco" @selected($job->category == 'arco')>Arco (Area Coordinator)</option>
                                <option value="stl" @selected($job->category == 'stl')>STL (Senior Team Leader)</option>
                                <option value="tl_corporate" @selected($job->category == 'tl_corporate')>TL Corporate</option>
                                <option value="cbs" @selected($job->category == 'cbs')>CBS (Corporate Business Support)
                                </option>
                                <option value="npc" @selected($job->category == 'npc')>National Project Coordinator (NPC)
                                </option>
                                <option value="project_manager" @selected($job->category == 'project_manager')>Project Manager</option>
                                <option value="operation_manager" @selected($job->category == 'operation_manager')>Operation Manager
                                </option>
                            </select>
                            <div class="invalid-feedback">Kategori wajib dipilih.</div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label mb-1">City</label>
                            <input type="text" class="form-control py-2" name="city"
                                value="{{ old('city', $job->city) }}" placeholder="Input your city" required>
                            <div class="invalid-feedback">Kota wajib diisi.</div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label mb-1">Store name</label>
                            <input type="text" class="form-control py-2" name="store_name"
                                value="{{ old('store_name', $job->store_name) }}" placeholder="Input store name"
                                required>
                            <div class="invalid-feedback">Nama toko wajib diisi.</div>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label mb-1">Minimum school</label>
                            <select class="form-select py-2" name="education" required>
                                <option value="" disabled selected>Choose Minimum school</option>
                                <option value="SMA/SMK" @selected($job->education == 'SMA/SMK')>SMA/SMK</option>
                                <option value="SMK Kesehatan" @selected($job->education == 'SMK Kesehatan')>SMK Kesehatan</option>
                                <option value="Fresh Graduate" @selected($job->education == 'Fresh Graduate')>Fresh Graduate</option>
                                <option value="S1" @selected($job->education == 'S1')>S1</option>
                            </select>
                            <div class="invalid-feedback">Pendidikan minimal wajib dipilih.</div>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label mb-1">Open Position</label>
                            <input type="number" class="form-control py-2" name="open_position"
                                value="{{ old('open_position', $job->open_position) }}"
                                placeholder="Input open position" min="1" required>
                            <div class="invalid-feedback">Kuota wajib diisi.</div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label mb-1">Type work</label>
                            <select class="form-select py-2" name="type_work" required>
                                <option value="" disabled selected>Choose Type Work</option>
                                <option value="WFO - Full Time" @selected($job->type_work == 'WFO - Full Time')>WFO - Full Time</option>
                                <option value="Partnership" @selected($job->type_work == 'Partnership')>Partnership</option>
                            </select>
                            <div class="invalid-feedback">Jenis kerja wajib dipilih.</div>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label mb-1">Minimum experience</label>
                            <input type="number" class="form-control py-2" name="experience"
                                value="{{ old('experience', $job->experience) }}" placeholder="Input min experience"
                                min="0" required>
                            <div class="invalid-feedback">Pengalaman minimal wajib diisi.</div>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label mb-1">Gender</label>
                            <select class="form-select py-2" name="gender" required>
                                <option value="" disabled selected>Choose gender</option>
                                <option value="Pria" @selected($job->gender == 'Pria')>Pria</option>
                                <option value="Wanita" @selected($job->gender == 'Wanita')>Wanita</option>
                                <option value="Pria dan Wanita" @selected($job->gender == 'Pria dan Wanita')>Pria dan Wanita</option>

                            </select>
                            <div class="invalid-feedback">Gender wajib dipilih.</div>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label mb-1">Close date</label>
                            <input type="date" class="form-control py-2" name="close_date"
                                value="{{ old('close_date', \Carbon\Carbon::parse($job->close_date)->format('Y-m-d')) }}"
                                required>
                            <div class="invalid-feedback">Tanggal tutup wajib diisi.</div>
                        </div>

                        <div class="col-12">
                            <label class="form-label mb-1">Description</label>
                            <textarea class="form-control py-2" name="description" rows="3" placeholder="Input description">{{ old('description', $job->description) }}</textarea>
                            <!-- <div class="invalid-feedback">Deskripsi wajib diisi.</div> -->
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
