@extends('layouts.admin.app')

@section('title', 'Gelatik Supra')
@section('nav-title', 'Partnership')

@section('content')
    <div class="container-fluid">
        <h5 class="text-center mb-3">Risalah Interview PC/TL</h5>
        <div class="biodata">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <div class="row g-4">
                        <!-- Informasi Kandidat -->
                        <div class="col-md-6">
                            <div class="mb-2">
                                <small class="text-muted">Nama</small>
                                <div class="fw-semibold">Juna</div>
                            </div>
                            <div class="mb-2">
                                <small class="text-muted">Tgl Lahir / Usia</small>
                                <div class="fw-semibold">12 Jun 2003 / 23 tahun</div>
                            </div>
                            <div class="mb-2">
                                <small class="text-muted">Pendidikan</small>
                                <div class="fw-semibold">S1 Informatika</div>
                            </div>
                        </div>

                        <!-- Informasi Tes -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">No Tes</label>
                                <input type="text" class="form-control" name="test_number" placeholder="Input no tes"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tujuan Tes</label>
                                <input type="text" class="form-control" name="test_purpose"
                                    placeholder="Input tujuan tes" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tanggal Tes</label>
                                <input type="date" class="form-control" name="test_date" readonly required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <form action="{{ route('partnership.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="modal-body">
                <div class="row g-4 p-2">
                    <div class="col-md-12">
                        <label class="form-label mb-1">Name</label>
                        <input type="text" class="form-control py-2" name="name" placeholder="Input name" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label mb-1">Start Contract</label>
                        <input type="date" class="form-control py-2" name="start_contract" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label mb-1">End Contract</label>
                        <input type="date" class="form-control py-2" name="end_contract" required>
                    </div>

                    <div class="col-md-12">
                        <label class="form-label mb-1">Image</label>
                        <input type="file" class="form-control py-2" name="image" required>
                    </div>
                </div>
            </div>

            <div class="modal-footer d-flex justify-content-between">
                <button type="button" class="btn btn-outline-none" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>

@endsection

@push('scripts')
    <script type="module">
        $(document).ready(function() {
            $('#newsEventTable').DataTable();
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.btn-create').on('click', function(e) {
                e.preventDefault();

                $.get('/partnership/create', function(data) {
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
                $.get("/partnership/" + id + "/edit", function(data) {
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
                $.get('/partnership/' + id, function(data) {
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
