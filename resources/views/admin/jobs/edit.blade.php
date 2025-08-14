<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content rounded-4">
            <div class="modal-header bg-pink text-white rounded-top-4 p-4">
                <h5 class="modal-title fw-semibold" id="showModalLabel">
                    <i class="bi bi-briefcase-fill me-2"></i>Edit Jobs
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="{{ route('jobs.update', $job->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row g-4 p-2">
                        <div class="col-md-6">
                            <label class="form-label mb-1">Jobs name</label>
                            <input type="text" class="form-control py-2" name="jobs_name"
                                value="{{ old('jobs_name', $job->jobs_name) }}" placeholder="Input jobs name">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label mb-1">Category</label>
                            <select class="form-select py-2" name="category">
                                <option disabled>Choose category</option>
                                <option value="Sales" @selected($job->category == 'Sales')>Sales</option>
                                <option value="Marketing" @selected($job->category == 'Marketing')>Marketing</option>
                                <option value="Admin" @selected($job->category == 'Admin')>Admin</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label mb-1">City</label>
                            <input type="text" class="form-control py-2" name="city"
                                value="{{ old('city', $job->city) }}" placeholder="Input your city">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label mb-1">Store name</label>
                            <input type="text" class="form-control py-2" name="store_name"
                                value="{{ old('store_name', $job->store_name) }}" placeholder="Input store name">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label mb-1">Minimum school</label>
                            <input type="text" class="form-control py-2" name="education"
                                value="{{ old('education', $job->education) }}" placeholder="Input min school">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label mb-1">Open Position</label>
                            <input type="text" class="form-control py-2" name="open_position"
                                value="{{ old('open_position', $job->open_position) }}"
                                placeholder="Input open position">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label mb-1">Type work</label>
                            <input type="text" class="form-control py-2" name="type_work"
                                value="{{ old('type_work', $job->type_work) }}" placeholder="Input type work">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label mb-1">Minimum experience</label>
                            <input type="text" class="form-control py-2" name="experience"
                                value="{{ old('experience', $job->experience) }}" placeholder="Input min experience">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label mb-1">Gender</label>
                            <select class="form-select py-2" name="gender">
                                <option disabled>Choose gender</option>
                                <option value="Pria" @selected($job->gender == 'Pria')>Pria</option>
                                <option value="Wanita" @selected($job->gender == 'Wanita')>Wanita</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label mb-1">Close date</label>
                            <input type="date" class="form-control py-2" name="close_date"
                                value="{{ old('close_date', \Carbon\Carbon::parse($job->close_date)->format('Y-m-d')) }}">
                        </div>

                        <div class="col-12">
                            <label class="form-label mb-1">Description</label>
                            <textarea class="form-control py-2" name="description" rows="3" placeholder="Input description">{{ old('description', $job->description) }}</textarea>
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
