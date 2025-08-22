@extends('layouts.admin.app')

@section('title', 'Gelatik Supra')
@section('nav-title', 'Jobs')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <main class="col-md-12 ms-sm-auto col-lg-12">
                <div class="d-flex justify-content-end mb-3">
                    <a class="btn btn-create"><i class="bi bi-plus-square-fill"></i>Jobs</a>
                    <a href="{{ route('jobs.exportExcel') }}" class="btn btn-outline-success ms-2">
                        <i class="bi bi-download me-1"></i> Export Excel
                    </a>
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
                            @foreach ($jobs as $j)
                                <tr>
                                    <td class="text-center align-middle">
                                        {{ str_pad($loop->iteration, 3, '0', STR_PAD_LEFT) }}</td>
                                    <td class="align-middle col-2">{{ $j->jobs_name }}</td>
                                    <td class="align-middle">{{ $j->category }}</td>
                                    <td class="align-middle text-start col-2">{{ $j->store_name }}</td>
                                    <td class="align-middle">{{ $j->city }}</td>
                                    <td class="align-middle text-center">{{ $j->open_position }}</td>
                                    <td class="align-middle">{{ \Carbon\Carbon::parse($j->close_date)->format('d M Y') }}
                                    </td>

                                    <td class="align-middle text-center">{{ $j->applies_count }}</td>
                                    <td class="align-middle text-center px-1 ">
                                        <div class="d-flex justify-content-center">
                                            <a href="#"
                                                class="btn btn-sm btn-detail d-flex align-items-center justify-content-center"
                                                data-id="{{ $j->id }}">
                                                <i class="bi bi-info-square"></i>
                                            </a>
                                            <a href="#"
                                                class="btn btn-sm btn-edit d-flex align-items-center justify-content-center"
                                                data-id="{{ $j->id }}">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <a href="{{ route('jobs.applicants', $j->id) }}"
                                                class="fw-medium btn btn-sm btn-primary-2 ms-2 d-flex align-items-center justify-content-center">
                                                Applicants
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
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
                $.get("/jobs/" + id + "/edit", function(data) {
                    $("#editModalContainer").html(data);
                    setTimeout(() => {
                        let modalElement = document.getElementById("editModal");
                        if (modalElement) {
                            let myModal = new bootstrap.Modal(modalElement);
                            myModal.show();
                        }
                    });
                }).fail(function(xhr) {
                    alert("Gagal mengambil data!");
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.btn-detail').on('click', function(e) {
                e.preventDefault();
                let id = $(this).data('id');
                $.get('/jobs/' + id, function(data) {
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
