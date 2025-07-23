@extends('layouts.admin.app')

@section('title', 'Gelatik Supra')
@section('nav-title', 'Applicants')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <main class="col-md-12 ms-sm-auto col-lg-12 py-1">

                <div class="table-responsive">
                    <table class="table table-borderless my-2" id="applicantsTable">
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
                            @foreach ($applys as $index => $applicant)
                                <tr>
                                    <td class="text-center align-middle">
                                        {{ str_pad($loop->iteration, 3, '0', STR_PAD_LEFT) }}</td>
                                    <td class="align-middle col-2">{{ $applicant->profile->namaLengkap ?? '-' }}</td>
                                    <td class="align-middle">{{ $applicant->profile->category }}</td>
                                    <td class="align-middle text-start">{{ $applicant->profile->telp ?? '-' }}</td>
                                    <td class="align-middle">{{ $applicant->email }}</td>
                                    <td class="align-middle text-center px-1">
                                        <div class="d-flex justify-content-center">
                                            <a href="#" class="btn btn-sm btn-detail" data-id="{{ $applicant->id }}">
                                                <i class="bi bi-info-square"></i>
                                            </a>
                                            <a href="#" class="btn btn-sm btn-edit">
                                                <i class="bi bi-pencil-square"></i>
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
            $('.btn-detail').on('click', function(e) {
                e.preventDefault();
                let id = $(this).data('id');
                $.get('/applicants/' + id, function(data) {
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
