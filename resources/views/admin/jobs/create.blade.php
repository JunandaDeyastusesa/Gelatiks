<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content rounded-4">
            <div class="modal-header bg-pink text-white rounded-top-4 p-4">
                <h5 class="modal-title fw-semibold" id="showModalLabel">
                    <i class="bi bi-briefcase-fill me-2"></i>Add Jobs
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>

            <form action="{{ route('jobs.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row g-4 p-2">
                        <div class="col-md-6">
                            <label class="form-label mb-1">Jobs name</label>
                            <input type="text" class="form-control py-2" name="jobs_name"
                                placeholder="Input jobs name" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label mb-1">Category</label>
                            <select class="form-select py-2" name="category" required>
                                <option value="" selected disabled>Choose category</option>
                                <option value="Sales">Sales</option>
                                <option value="MD">MD</option>
                                <option value="Admin">Admin</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label mb-1">City</label>
                            <input type="text" class="form-control py-2" name="city"
                                placeholder="Input your city" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label mb-1">Store name</label>
                            <input type="text" class="form-control py-2" name="store_name"
                                placeholder="Input store name" required>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label mb-1">Minimum school</label>
                            <select class="form-select py-2" name="education" required>
                                <option value="" selected disabled>Choose Minimum school</option>
                                <option value="S1">S1</option>
                                <option value="SMA/SMK">SMA/SMK</option>
                                <option value="Fresh Graduate">Fresh Graduate</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label mb-1">Quota</label>
                            <input type="number" class="form-control py-2" name="open_position"
                                placeholder="Input min school" required>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label mb-1">Type work</label>
                            <select class="form-select py-2" name="type_work" required>
                                <option value="" selected disabled>Choose Type Work</option>
                                <option value="WFO - Full Time">WFO - Full Time</option>
                                <option value="WFO - Part Time">WFO - Part Time</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label mb-1">Minimum experience</label>
                            <input type="number" class="form-control py-2" name="experience"
                                placeholder="Input min experience">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label mb-1">Gender</label>
                            <select class="form-select py-2" name="gender" required>
                                <option value="" selected disabled>Choose gender</option>
                                <option value="Pria">Pria</option>
                                <option value="Wanita">Wanita</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label mb-1">Close date</label>
                            <div class="input-group">
                                <input type="date" class="form-control py-2" name="close_date" required>
                            </div>
                        </div>

                        <div class="col-12">
                            <label class="form-label mb-1">Description</label>
                            <textarea class="form-control py-2" name="description" rows="3" placeholder="Input description"></textarea>
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
