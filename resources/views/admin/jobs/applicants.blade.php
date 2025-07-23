@extends('layouts.admin.app')

@section('title', 'Gelatik Supra')
@section('nav-title', 'Jobs/' . ($navTitle->jobs_name ?? 'Unknown Job') . ' - ' . $navTitle->store_name)

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
                            @foreach ($viewApplicants as $applicant)
                                <tr class="body-table">
                                    <td class="text-center align-middle">
                                        {{ str_pad($loop->iteration, 3, '0', STR_PAD_LEFT) }}</td>
                                    <td class="align-middle col-2">{{ $applicant->user->profile->namaLengkap ?? '-' }}</td>
                                    <td class="align-middle text-start">{{ $applicant->user->profile->kelamin ?? '-' }}</td>
                                    <td class="align-middle text-center">
                                        {{ $applicant->user->profile?->kelahiran ? \Carbon\Carbon::parse($applicant->user->profile->kelahiran)->age : '-' }}
                                    </td>
                                    <td class="align-middle text-start">{{ $applicant->user->email }}</td>
                                    <td class="align-middle col-3">{{ $applicant->user->profile->domisili ?? '-' }}</td>
                                    <td class="align-middle text-center px-1">
                                        <div class="d-flex justify-content-center">
                                            @if ($applicant->status == 'Review')
                                                <a href="#"
                                                    class="fw-medium btn btn-sm btn-review ms-2 d-flex align-items-center justify-content-center">
                                                    Review
                                                </a>
                                            @elseif($applicant->status == 'Interview')
                                                <a href="#"
                                                    class="fw-medium btn btn-sm btn-interview ms-2 d-flex align-items-center justify-content-center">
                                                    Interview
                                                </a>
                                            @endif

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

    @push('scripts')
        <script type="module">
            $(document).ready(function() {
                $('#applicantsTable').DataTable();
            });
        </script>
    @endpush

@endsection
