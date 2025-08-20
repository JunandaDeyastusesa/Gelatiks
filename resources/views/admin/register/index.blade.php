@extends('layouts.admin.app')

@section('title', 'Gelatik Supra')
@section('nav-title', 'Registration')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <main class="col-md-12 ms-sm-auto col-lg-12 py-1">
                <div class="d-flex justify-content-end mb-3">
                    <a class="btn btn-create"><i class="bi bi-plus-square-fill"></i> Register</a>
                </div>

                <div class="table-responsive">
                    <table class="table table-borderless my-2" id="registrationTable">
                        <thead class="head-table">
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Applicant Name</th>
                                <th class="text-center">Category</th>
                                <th class="text-center">Phone</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- contoh dummy data --}}
                            <tr>
                                <td class="text-center">001</td>
                                <td>Andi Saputra</td>
                                <td>Admin</td>
                                <td>0812-3456-7890</td>
                                <td>andi@example.com</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-sm btn-detail" data-id="1">
                                        <i class="bi bi-info-square"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>

    {{-- container modal --}}
    <div id="addModalContainer"></div>
    <div id="showModalContainer"></div>
@endsection

@push('scripts')
    <script type="module">
        $(document).ready(function() {
            $('#registrationTable').DataTable();
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.btn-create').on('click', function(e) {
                e.preventDefault();

                $.get('/admin/register/create', function(data) {
                    $('#addModalContainer').html(data);

                    setTimeout(() => {
                        let modalElement = document.getElementById('addModal');
                        if (modalElement) {
                            let myModal = new bootstrap.Modal(modalElement);
                            myModal.show();
                        }
                    });
                }).fail(function() {
                    alert('Gagal memuat modal. Coba lagi.');
                });
            });

            $('.btn-detail').on('click', function(e) {
                e.preventDefault();
                let id = $(this).data('id');

                $.get('/admin/register/' + id, function(data) {
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
