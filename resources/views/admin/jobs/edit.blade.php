<!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content rounded-4">
            <div class="modal-header bg-pink text-white rounded-top-4 p-4">
                <h5 class="modal-title fw-semibold" id="editModalLabel">
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
                                <option value="" disabled>Choose category</option>
                                <option value="SPG Inclined" @selected($job->category == 'SPG Inclined')>SPG Inclined</option>
                                <option value="SPG Reguler" @selected($job->category == 'SPG Reguler')>SPG Reguler</option>
                                <option value="SPG Event" @selected($job->category == 'SPG Event')>SPG Event</option>
                                <option value="MD (Merchandiser)" @selected($job->category == 'MD (Merchandiser)')>MD (Merchandiser)
                                </option>
                                <option value="SMD (Sales Merchandiser)" @selected($job->category == 'SMD (Sales Merchandiser)')>SMD (Sales
                                    Merchandiser)</option>
                                <option value="Team Leader (Supervisor)" @selected($job->category == 'Team Leader (Supervisor)')>Team Leader
                                    (Supervisor)</option>
                                <option value="Arco (Area Coordinator)" @selected($job->category == 'Arco (Area Coordinator)')>Arco (Area
                                    Coordinator)</option>
                                <option value="STL (Senior Team Leader)" @selected($job->category == 'STL (Senior Team Leader)')>STL (Senior Team
                                    Leader)</option>
                                <option value="TL Corporate" @selected($job->category == 'TL Corporate')>TL Corporate</option>
                                <option value="CBS (Corporate Business Support)" @selected($job->category == 'CBS (Corporate Business Support)')>CBS
                                    (Corporate Business Support)</option>
                                <option value="National Project Coordinator (NPC)" @selected($job->category == 'National Project Coordinator (NPC)')>
                                    National Project Coordinator (NPC)</option>
                                <option value="Project Manager" @selected($job->category == 'Project Manager')>Project Manager</option>
                                <option value="Operation Manager" @selected($job->category == 'Operation Manager')>Operation Manager
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
                                <option value="" disabled>Choose Minimum school</option>
                                <option value="SMA/SMK" @selected($job->education == 'SMA/SMK')>SMA/SMK</option>
                                <option value="SMA Kesehatan" @selected($job->education == 'SMA Kesehatan')>SMK Kesehatan</option>
                                <option value="Fresh Graduate" @selected($job->education == 'Fresh Graduate')>Fresh Graduate</option>
                                <option value="S1" @selected($job->education == 'S1')>S1</option>
                            </select>
                            <div class="invalid-feedback">Pendidikan minimal wajib dipilih.</div>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label mb-1">Quota</label>
                            <input type="number" class="form-control py-2" name="open_position"
                                value="{{ old('open_position', $job->open_position) }}" placeholder="Input quota"
                                min="1" required>
                            <div class="invalid-feedback">Kuota wajib diisi.</div>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label mb-1">Type work</label>
                            <select class="form-select py-2" name="type_work" required>
                                <option value="" disabled>Choose Type Work</option>
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
                                <option value="" disabled>Choose gender</option>
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

                        <div class="col-8">
                            <label class="form-label mb-1">Description</label>
                            <textarea class="form-control py-2" name="description" rows="3" placeholder="Input description">{{ old('description', $job->description) }}</textarea>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label mb-1">Status</label>
                            <select class="form-select py-2" name="status" required>
                                <option value="" disabled>Choose status</option>
                                <option value="Open" @selected($job->status == 'Open')>Open</option>
                                <option value="Closed" @selected($job->status == 'Closed')>Closed</option>
                            </select>
                            <div class="invalid-feedback">Status wajib dipilih.</div>
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
