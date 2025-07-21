<!-- Modal -->
<div class="modal fade" id="addModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content rounded-4">

            <div class="modal-header bg-pink text-white rounded-top-4 p-4">
                <h5 class="modal-title fw-medium" id="jobDetailModalLabel">
                    <i class="bi bi-plus-square-fill me-2"></i>Add Job
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>

            <div class="modal-body p-3">
                <form>
                    <div class="row g-4 p-2">
                        <!-- Jobs Name -->
                        <div class="col-md-6">
                            <label class="form-label mb-1">Jobs name</label>
                            <input type="text" class="form-control py-2" placeholder="Input jobs name">
                        </div>

                        <!-- Category -->
                        <div class="col-md-6">
                            <label class="form-label mb-1">Category</label>
                            <select class="form-select py-2">
                                <option selected disabled>Choose category</option>
                                <option>Sales</option>
                                <option>Marketing</option>
                                <option>Admin</option>
                            </select>
                        </div>

                        <!-- City -->
                        <div class="col-md-6">
                            <label class="form-label mb-1">City</label>
                            <input type="text" class="form-control py-2" placeholder="Input your city">
                        </div>

                        <!-- Store name -->
                        <div class="col-md-6">
                            <label class="form-label mb-1">Store name</label>
                            <input type="text" class="form-control py-2" placeholder="Input store name">
                        </div>

                        <!-- Minimum school -->
                        <div class="col-md-4">
                            <label class="form-label mb-1">Minimum school</label>
                            <input type="text" class="form-control py-2" placeholder="Input min school">
                        </div>

                        <!-- Qty applicants -->
                        <div class="col-md-4">
                            <label class="form-label mb-1">Qty applicants</label>
                            <input type="number" class="form-control py-2" placeholder="Input quantity applicants"
                                min="1">
                        </div>

                        <!-- Type work -->
                        <div class="col-md-4">
                            <label class="form-label mb-1">Type work</label>
                            <input type="text" class="form-control py-2" placeholder="Input type work">
                        </div>

                        <!-- Minimum experience -->
                        <div class="col-md-4">
                            <label class="form-label mb-1">Minimum experience</label>
                            <input type="text" class="form-control py-2" placeholder="Input min experience">
                        </div>

                        <!-- Gender -->
                        <div class="col-md-4">
                            <label class="form-label mb-1">Gender</label>
                            <select class="form-select py-2">
                                <option selected disabled>Choose gender</option>
                                <option>Male</option>
                                <option>Female</option>
                                <option>All</option>
                            </select>
                        </div>

                        <!-- Close date -->
                        <div class="col-md-4">
                            <label class="form-label mb-1">Close date</label>
                            <div class="input-group">
                                <input type="date" class="form-control py-2">
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="col-12">
                            <label class="form-label mb-1">Description</label>
                            <textarea class="form-control py-2" rows="3" placeholder="Input description"></textarea>
                        </div>

                    </div>

                    <!-- Action buttons -->
                    <div class="d-flex justify-content-between mt-5">
                        <button type="button" class="btn btn-outline-none" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
