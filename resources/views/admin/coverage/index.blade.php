@extends('layouts.admin.app')

@section('title', 'Gelatik Supra')
@section('nav-title', 'Coverage')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <main class="col-md-12 ms-sm-auto col-lg-12 py-1">

                <div class="table-responsive">
                    <table class="table table-borderless my-2">
                        <thead class="head-table">
                            <tr>
                                <th class="text-center">Province Coverage</th>
                                <th class="text-center">Happy Client</th>
                                <th class="text-center">Years Experience</th>
                                <th class="text-center">Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($applys as $applicant) --}}
                            <tr>
                                <td class="align-middle text-center">34</td>
                                <td class="align-middle text-center">114</td>
                                <td class="align-middle text-center">23</td>
                                <td class="align-middle text-center px-1">
                                    <div class="d-flex justify-content-center">
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
