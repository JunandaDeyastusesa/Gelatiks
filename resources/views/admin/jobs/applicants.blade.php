@extends('layouts.admin.app')

@section('title', 'Gelatik Supra')
@section('nav-title', 'Jobs/' . ($navTitle->jobs_name ?? 'Unknown Job') . ' - ' . $navTitle->store_name)

@section('content')
    <div class="container-fluid">
        <div class="row">
            <main class="col-md-12 ms-sm-auto col-lg-12 py-1">

                <div class="d-flex justify-content-end mb-3">
                    <div class="dropdown">
                        <a class="btn btn-success dropdown-toggle" href="#" role="button" id="exportDropdown"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-download me-1"></i> Export Excel
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="exportDropdown">
                            <li>
                                <a class="dropdown-item"
                                    href="{{ route('jobs.exportApplicants', ['id' => $navTitle->id, 'status' => 'interview']) }}">
                                    Export Interview
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item"
                                    href="{{ route('jobs.exportApplicants', ['id' => $navTitle->id, 'status' => 'accepted']) }}">
                                    Export Accepted
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

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
                                <th class="text-center">Status</th>
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
                                            @if ($applicant->status == 'In Review')
                                                <a href="{{ route('jobApplies.show', $applicant->id) }}"
                                                    class="btn btn-sm btn-review px-2">
                                                    Done Review
                                                </a>
                                            @elseif ($applicant->status == 'Interview')
                                                <a href="{{ route('jobApplies.show', $applicant->id) }}"
                                                    class="btn btn-sm btn-interview px-2">
                                                    Interview
                                                </a>
                                            @elseif ($applicant->status == 'Accepted')
                                                <a href="{{ route('jobApplies.show', $applicant->id) }}"
                                                    class="btn btn-sm btn-accepted px-2">
                                                    Accepted
                                                </a>
                                            @elseif ($applicant->status == 'Rejected')
                                                <a href="{{ route('jobApplies.show', $applicant->id) }}"
                                                    class="btn btn-sm btn-rejected px-2">
                                                    Rejected
                                                </a>
                                            @else
                                                <form action="{{ route('jobApplies.update', $applicant->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="status" value="In Review">
                                                    <button type="submit" class="btn btn-sm btn-wait-review">Waiting
                                                        Review</button>
                                                </form>
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
