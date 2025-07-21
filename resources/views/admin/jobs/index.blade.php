@extends('layouts.admin.app')

@section('title', 'Gelatik Supra')
@section('nav-title', 'Jobs')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <main class="col-md-12 ms-sm-auto col-lg-12">
                <div class="d-flex justify-content-end mb-3">
                    <a class="btn btn-create"><i class="bi bi-plus-square-fill"></i>Add Jobs</a>
                </div>


                <!-- Modal -->
                <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="addJobModal" tabindex="-1"
                    aria-labelledby="addJobModalLabel" aria-hidden="true">
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
                                            <input type="number" class="form-control py-2"
                                                placeholder="Input quantity applicants" min="1">
                                        </div>

                                        <!-- Type work -->
                                        <div class="col-md-4">
                                            <label class="form-label mb-1">Type work</label>
                                            <input type="text" class="form-control py-2" placeholder="Input type work">
                                        </div>

                                        <!-- Minimum experience -->
                                        <div class="col-md-4">
                                            <label class="form-label mb-1">Minimum experience</label>
                                            <input type="text" class="form-control py-2"
                                                placeholder="Input min experience">
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
                                        <button type="button" class="btn btn-outline-none"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="table">
                    <table class="table table-borderless" id="applicantsTable">
                        <thead class="head-table">
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Jobs name</th>
                                <th class="text-center">Category</th>
                                <th class="text-center">Store name</th>
                                <th class="text-center">City</th>
                                <th class="text-center">Quota</th>
                                <th class="text-center">Close date</th>
                                <th class="text-center">Qty</th>
                                <th class="text-center">Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="body-table">
                                <td class="text-center align-middle">001</td>
                                <td class="align-middle col-2">Internship sales for Aqua </td>
                                <td class="align-middle">Sales</td>
                                <td class="align-middle text-start col-2">Royal Plaza Surabaya</td>
                                <td class="align-middle">Surabaya</td>
                                <td class="align-middle text-center">3</td>
                                <td class="align-middle">15 Jul 2025</td>
                                <td class="align-middle text-center">1245</td>
                                <td class="align-middle text-center px-1 ">
                                    <div class="d-flex justify-content-center">
                                        <a href="#"
                                            class="btn btn-sm btn-detail d-flex align-items-center justify-content-center"
                                            data-bs-toggle="modal" data-bs-target="#jobDetailModal">
                                            <i class="bi bi-info-square"></i>
                                        </a>
                                        <a href="#"
                                            class="btn btn-sm btn-edit d-flex align-items-center justify-content-center">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <a href="{{ route('admin.jobs/applicants') }}"
                                            class="fw-medium btn btn-sm btn-primary-2 ms-2 d-flex align-items-center justify-content-center">
                                            Applicants
                                        </a>
                                    </div>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Modal Detail Job -->
                <div class="modal fade" id="jobDetailModal" tabindex="-1" aria-labelledby="jobDetailModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content rounded-4 border-0 shadow-lg">
                            <!-- Modal Header -->
                            <div class="modal-header bg-pink text-white rounded-top-4 p-4">
                                <h5 class="modal-title fw-semibold" id="jobDetailModalLabel">
                                    <i class="bi bi-briefcase-fill me-2"></i>Job Details
                                </h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>

                            <!-- Modal Body -->
                            <div class="modal-body p-4">
                                <div class="row g-4 p-2">

                                    <!-- Jobs Name -->
                                    <div class="col-md-6">
                                        <label class="form-label mb-1 text-muted">Jobs Name</label>
                                        <div class="fw-semibold">Sales Promoter</div>
                                    </div>

                                    <!-- Category -->
                                    <div class="col-md-6">
                                        <label class="form-label mb-1 text-muted">Category</label>
                                        <div class="fw-semibold">Sales</div>
                                    </div>

                                    <!-- City -->
                                    <div class="col-md-6">
                                        <label class="form-label mb-1 text-muted">City</label>
                                        <div class="fw-semibold">Jakarta</div>
                                    </div>

                                    <!-- Store Name -->
                                    <div class="col-md-6">
                                        <label class="form-label mb-1 text-muted">Store Name</label>
                                        <div class="fw-semibold">Indomaret Daan Mogot</div>
                                    </div>

                                    <!-- Min School -->
                                    <div class="col-md-4">
                                        <label class="form-label mb-1 text-muted">Minimum School</label>
                                        <div class="fw-semibold">SMA/SMK</div>
                                    </div>

                                    <!-- Qty Applicants -->
                                    <div class="col-md-4">
                                        <label class="form-label mb-1 text-muted">Qty Applicants</label>
                                        <div class="fw-semibold">5 Orang</div>
                                    </div>

                                    <!-- Type Work -->
                                    <div class="col-md-4">
                                        <label class="form-label mb-1 text-muted">Type Work</label>
                                        <div class="fw-semibold">Full Time</div>
                                    </div>

                                    <!-- Min Experience -->
                                    <div class="col-md-4">
                                        <label class="form-label mb-1 text-muted">Min Experience</label>
                                        <div class="fw-semibold">1 Tahun</div>
                                    </div>

                                    <!-- Gender -->
                                    <div class="col-md-4">
                                        <label class="form-label mb-1 text-muted">Gender</label>
                                        <div class="fw-semibold">All</div>
                                    </div>

                                    <!-- Close Date -->
                                    <div class="col-md-4">
                                        <label class="form-label mb-1 text-muted">Close Date</label>
                                        <div class="fw-semibold"><i class="bi bi-calendar-event me-1 text-muted"></i>01
                                            August 2025</div>
                                    </div>

                                    <!-- Description -->
                                    <div class="col-12">
                                        <label class="form-label mb-1 text-muted">Description</label>
                                        <div class="fw-normal">Promosi produk makanan ringan di gerai Indomaret selama masa
                                            event. Wajib ramah,
                                            komunikatif, dan berpenampilan menarik.</div>
                                    </div>

                                </div>
                            </div>

                            <!-- Modal Footer -->
                            <div class="modal-footer bg-light rounded-bottom-4">
                                <button type="button" class="btn btn-outline-secondary px-4 rounded-pill"
                                    data-bs-dismiss="modal">
                                    Tutup
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </main>
        </div>
    </div>

    <div id="addModalContainer"></div>
    <div id="editModalContainer"></div>
    <div id="showModalContainer"></div>
@endsection

@push('scripts')
    <script type="module">
        $(document).ready(function() {
            $('#applicantsTable').DataTable();
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.btn-create').on('click', function(e) {
                e.preventDefault();

                $.get('/jobs/create', function(data) {
                    $('#addModalContainer').html(data);

                    setTimeout(() => {
                        let modalElement = document.getElementById('addModal');
                        if (modalElement) {
                            let myModal = new bootstrap.Modal(modalElement);
                            myModal.show();
                        } else {
                            console.error('Modal tidak ditemukan.');
                        }
                    });
                }).fail(function() {
                    alert('Gagal memuat modal. Coba lagi.');
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $(".btn-edit").on("click", function(e) {
                e.preventDefault();
                let id = $(this).data("id");
                $.get("/inventaris/" + id + "/edit", function(data) {
                    $("#editModalContainer").html(data);
                    setTimeout(() => {
                        let modalElement = document.getElementById("editModal");
                        if (modalElement) {
                            let myModal = new bootstrap.Modal(modalElement);
                            myModal.show();
                        }
                    });
                }).fail(function(xhr) {
                    alert("Gagal mengambil data inventaris!");
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.btn-detail').on('click', function(e) {
                e.preventDefault();
                let id = $(this).data('id');
                $.get('/inventaris/' + id, function(data) {
                    $('#showModalContainer').html(data);
                    setTimeout(() => {
                        let modalElement = document.getElementById('showModal');
                        if (modalElement) {
                            let myModal = new bootstrap.Modal(modalElement);
                            myModal.show();
                        }
                    });
                });
            });
        });
    </script>
@endpush
