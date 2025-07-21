@extends('layouts.admin.app')

@section('title', 'Gelatik Supra')
@section('nav-title', 'Applicants')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <main class="col-md-12 ms-sm-auto col-lg-12 py-1">
                {{-- <div class="d-flex justify-content-end mb-3">
                    <a href="#" class="btn btn-primary btn-create">Tambah</a>
                </div> --}}

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
                            <tr class="body-table">
                                <td class="text-center align-middle">001</td>
                                <td class="align-middle">Junanda Deyastusesa</td>
                                <td class="align-middle">Sales</td>
                                <td class="align-middle text-start">082143216321</td>
                                <td class="align-middle">junanda@example.com</td>
                                <td class="text-center px-1 d-flex justify-content-center">
                                    <a href="#" class="btn btn-sm btn-detail">
                                        <i class="bi bi-info-square"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm btn-edit">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr class="body-table">
                                <td class="text-center align-middle">002</td>
                                <td class="align-middle">Jujoe Deyastusesa</td>
                                <td class="align-middle">Sales</td>
                                <td class="align-middle text-start">082143216321</td>
                                <td class="align-middle">Jujoe@example.com</td>
                                <td class="text-center px-1 d-flex justify-content-center">
                                    <a href="#" class="btn btn-sm btn-detail">
                                        <i class="bi bi-info-square"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm btn-edit">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr class="body-table">
                                <td class="text-center align-middle">002</td>
                                <td class="align-middle">Jujoe Deyastusesa</td>
                                <td class="align-middle">MD</td>
                                <td class="align-middle text-start">082143216321</td>
                                <td class="align-middle">Jujoe@example.com</td>
                                <td class="text-center px-1 d-flex justify-content-center">
                                    <a href="#" class="btn btn-sm btn-detail">
                                        <i class="bi bi-info-square"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm btn-edit">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>

    @push('scripts')
        <script type="module">
            $(document).ready(function() {
                $('#applicantsTable').DataTable();
            });
        </script>
    @endpush

@endsection
