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
                            @foreach ($cover as $p)
                                <tr>
                                    <td class="align-middle text-center">{{ $p->qty_province }}</td>
                                    <td class="align-middle text-center">{{ $p->qty_clients }}</td>
                                    <td class="align-middle text-center">{{ $p->qty_experience }}</td>
                                    <td class="align-middle text-center px-1">
                                        <div class="d-flex justify-content-center">
                                            <a href="#" class="btn btn-sm btn-edit" data-id="{{ $p->id }}">
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

    <div id="editModalContainer"></div>

@endsection

@push('scripts')
    <script type="module">
        $(document).ready(function() {
            $('#applicantsTable').DataTable();
        });
    </script>

    <script>
        $(document).ready(function() {
            $(".btn-edit").on("click", function(e) {
                e.preventDefault();
                let id = $(this).data("id");
                $.get("/coverage/" + id + "/edit", function(data) {
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
@endpush
