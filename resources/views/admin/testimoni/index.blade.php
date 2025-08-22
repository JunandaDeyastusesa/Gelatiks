@extends('layouts.admin.app')

@section('title', 'Gelatik Supra')
@section('nav-title', 'Testimoni')

@section('content')
    <div class="container-fluid">

        <div class="d-flex justify-content-end mb-3">
            <a class="btn btn-create"><i class="bi bi-plus-square-fill"></i>Testimoni</a>
        </div>
    </div>

    <div class="row">
        <main class="col-md-12 ms-sm-auto col-lg-12 py-1">

            <div class="table-responsive">
                <table class="table table-borderless my-2" id="newsEventTable">
                    <thead class="head-table">
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Position</th>
                            <th class="text-center">Description</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($testimoni as $data)
                            <tr>
                                <td class="text-center align-middle">
                                    {{ str_pad($loop->iteration, 3, '0', STR_PAD_LEFT) }}</td> {{-- Displays a sequential number for each row --}}
                                <td class="align-middle col-2">{{ $data->name }}</td> {{-- Assuming 'name' is a field in your Testimoni model --}}
                                <td class="align-middle">{{ $data->job_title }}</td> {{-- Assuming 'position' is a field in your Testimoni model --}}
                                <td class="align-middle text-start">{{ $data->testimony }}</td> {{-- Assuming 'content' is a field in your Testimoni model --}}
                                <td class="align-middle text-center">
                                    @if ($data->status == 'Published')
                                        <span class="badge bg-success p-2 fw-medium"
                                            style="font-size: 12px">{{ $data->status }}</span>
                                    @else
                                        <span class="badge bg-danger p-2 fw-medium"
                                            style="font-size: 12px">{{ $data->status }}</span>
                                    @endif
                                </td> {{-- Assuming 'status' is a field in your Testimoni model --}}
                                <td class="align-middle text-center px-1">
                                    <div class="d-flex justify-content-center">
                                        <a href="#" class="btn btn-sm btn-detail" data-id="{{ $data->id }}">
                                            <i class="bi bi-info-square"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-edit" data-id="{{ $data->id }}">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        <form action="{{ route('testimoni.destroy', $data->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus item ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-hapus ms-2">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
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

                $.get('/testimoni/create', function(data) {
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
                $.get("/testimoni/" + id + "/edit", function(data) {
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
                $.get('/testimoni/' + id, function(data) {
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
