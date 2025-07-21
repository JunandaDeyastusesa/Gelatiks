@extends('layouts.admin.app')

@section('title', 'Gelatik Supra')
@section('nav-title', 'Jobs/Internship sales for Aqua - Royal Plaza Surabaya')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <main class="col-md-12 ms-sm-auto col-lg-12 py-1">
                {{-- <div class="d-flex justify-content-end mb-3">
                    <a href="#" class="btn btn-primary btn-create">Tambah</a>
                </div> --}}

                <div class="table">
                    <table class="table table-borderless" id="applicantsTable">
                        <thead class="head-table">
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Applicant name</th>
                                <th class="text-center">Gender</th>
                                <th class="text-center">Age</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Address</th>
                                <th class="text-center">Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="body-table">
                                <td class="text-center align-middle">001</td>
                                <td class="align-middle col-2">Junanda Deyastusesa </td>
                                <td class="align-middle text-start">Pria</td>
                                <td class="align-middle text-center">22</td>
                                <td class="align-middle text-start">junanda@gmail.com</td>
                                <td class="align-middle col-3">Jl Keitntang Barat Indah, No 27, Surabaya</td>
                                <td class="align-middle text-center px-1 ">
                                    <div class="d-flex justify-content-center">
                                        <a href="#"
                                            class="fw-medium btn btn-sm btn-primary ms-2 d-flex align-items-center justify-content-center">
                                            Review
                                        </a>
                                    </div>

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
