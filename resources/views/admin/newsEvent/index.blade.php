@extends('layouts.admin.app')

@section('title', 'Gelatik Supra')
@section('nav-title', 'News & Event')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <main class="col-md-12 ms-sm-auto col-lg-12 py-1">

                <div class="table-responsive">
                    <table class="table table-borderless my-2" id="newsEventTable">
                        <thead class="head-table">
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Title</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">Description</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($applys as $applicant) --}}
                                <tr>
                                    <td class="text-center align-middle">1</td>
                                    <td class="align-middle col-2">Marketing Event PRJ</td>
                                    <td class="align-middle">12 June 2025</td>
                                    <td class="align-middle text-start">Memasarkan produk dalam event PRJ (Pekan Raya Jakarta)</td>
                                    <td class="align-middle">Publish</td>
                                    <td class="align-middle text-center px-1">
                                        <div class="d-flex justify-content-center">
                                            <a href="#" class="btn btn-sm btn-detail">
                                                <i class="bi bi-info-square"></i>
                                            </a>
                                            <a href="#" class="btn btn-sm btn-edit">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            {{-- @endforeach --}}
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
            $('#newsEventTable').DataTable();
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
