@extends('layouts.admin.app')

@section('title', 'Gelatik Supra')
@section('nav-title', 'Partnership')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <main class="col-md-12 ms-sm-auto col-lg-12 py-1">
                <div class="d-flex justify-content-end mb-3">
                    <a class="btn btn-create"><i class="bi bi-plus-square-fill"></i>Partnership</a>
                </div>

                <div class="table-responsive">
                    <table class="table table-borderless my-2" id="newsEventTable">
                        <thead class="head-table">
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Name Brand</th>
                                <th class="text-center">Start Contract</th>
                                <th class="text-center">End Contract</th>
                                <th class="text-center">Logo</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($partnerships as $index => $partnership)
                                <tr>
                                    <td class="text-center align-middle">{{ str_pad($index + 1, 3, '0', STR_PAD_LEFT) }}
                                    </td>
                                    <td class="align-middle col-2">{{ $partnership->name }}</td>
                                    <td class="align-middle">
                                        {{ \Carbon\Carbon::parse($partnership->start_contract)->format('d M Y') }}</td>
                                    <td class="align-middle text-start">
                                        {{ \Carbon\Carbon::parse($partnership->end_contract)->format('d M Y') }}</td>
                                    <td class="align-middle text-center">
                                        @if ($partnership->image)
                                            <img class="img-gallery-admin"
                                                src="{{ asset('storage/' . $partnership->image) }}" alt="Image"
                                                style="max-height: 50px;">
                                        @else
                                            <span class="text-muted">No image</span>
                                        @endif
                                    </td>

                                    <td class="align-middle text-center px-1">
                                        <div class="d-flex justify-content-center">
                                            <a href="#" class="btn btn-sm btn-edit" data-id="{{ $partnership->id }}">
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

    <div id="addModalContainer"></div>
    <div id="editModalContainer"></div>
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
