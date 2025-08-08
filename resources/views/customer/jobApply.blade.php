@extends('layouts.landingPage.app')

@section('title', 'Gelatik Supra')

@section('content')

    <section class="carrer bg-light mt-md-0">
        <div class="container py-3 pb-5">
            <div class="mb-2">
                <h2 class="fw-bold text-gray mb-1">Your Applies</h2>
                <p class="text-secondary mb-0">You see update progress applly</p>

                <div class="d-md-flex justify-content-end align-items-center d-none">
                    <a href="{{ route('home') }}" class="text-decoration-none d-flex align-items-center text-dark">
                        <i class="bi bi-arrow-left-short fs-5 me-1"></i>
                        Homepage
                    </a>
                </div>
                <hr class="mt-3 mb-0" />
            </div>

            <div class="mt-4">
                <div class="d-none d-md-block">
                    <table class="table table-borderless" id="HistoryTable">
                        <thead class="head-table">
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Jobs Name</th>
                                <th class="text-center">Store Name</th>
                                <th class="text-center">City</th>
                                <th class="text-center">Close Date</th>
                                <th class="text-center">Keterangan</th>
                                <th class="text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody class="body-table">
                            @foreach ($jobApplicant as $key => $jobApply)
                                <tr>
                                    <td class="text-center">{{ $key + 1 }}</td>
                                    <td class="">{{ $jobApply->job->jobs_name ?? '-' }}</td>
                                    <td class="text-center">{{ $jobApply->job->store_name }}</td>
                                    <td class="text-center">{{ $jobApply->job->city }}</td>
                                    <td class="text-center">
                                        {{ \Carbon\Carbon::parse($jobApply->job->close_date)->format('d M Y') }}</td>
                                    <td class="col-3">{{ $jobApply->keterangan }}</td>

                                    <td class="text-center">
                                        @if ($jobApply->status == 'In Review')
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#stepPenerimaan"
                                                class="btn btn-sm btn-review px-2">
                                                In Review
                                            </a>
                                        @elseif ($jobApply->status == 'Interview')
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#stepPenerimaan"
                                                class="btn btn-sm btn-interview px-2">
                                                Interview
                                            </a>
                                        @elseif ($jobApply->status == 'Accepted')
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#stepPenerimaan"
                                                class="btn btn-sm btn-accepted px-2">
                                                Accepted
                                            </a>
                                        @elseif ($jobApply->status == 'Rejected')
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#stepPenerimaan"
                                                class="btn btn-sm btn-rejected px-2">
                                                Rejected
                                            </a>
                                        @else
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#stepPenerimaan"
                                                class="btn btn-sm btn-wait-review px-2">
                                                Waiting Review
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="d-block d-md-none">
                    @foreach ($jobApplicant as $key => $jobApply)
                        <div class="card mb-3 border-0">
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <h6 class="fw-bold text-dark mb-0 flex-grow-1 me-3 lh-sm">
                                        {{ $jobApply->job->jobs_name ?? '-' }}
                                    </h6>
                                    @php
                                        $status = $jobApply->status ?? 'Waiting Review';
                                        $statusConfig = match ($status) {
                                            'Review' => [
                                                'class' => 'btn-review',
                                                'icon' => 'bi-clock-history',
                                                'text' => 'In Review',
                                            ],
                                            'Interview' => [
                                                'class' => 'btn-interview',
                                                'icon' => 'bi-person-video2',
                                                'text' => 'Interview',
                                            ],
                                            'Accepted' => [
                                                'class' => 'btn-accepted',
                                                'icon' => 'bi-check-circle',
                                                'text' => 'Accepted',
                                            ],
                                            'Rejected' => [
                                                'class' => 'btn-rejected',
                                                'icon' => 'bi-x-circle',
                                                'text' => 'Rejected',
                                            ],
                                            default => [
                                                'class' => 'btn-wait-review',
                                                'icon' => 'bi-hourglass-split',
                                                'text' => 'Waiting Review',
                                            ],
                                        };
                                    @endphp
                                    <span class="badge {{ $statusConfig['class'] }} px-3 py-2 fs-7 fw-semibold">
                                        <i class="bi {{ $statusConfig['icon'] }} me-1"></i>
                                        {{ $statusConfig['text'] }}
                                    </span>
                                </div>

                                <div class="row g-2 text-muted small">
                                    <div class="col-12">
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-building me-2 text-primary"></i>
                                            <span class="fw-medium">{{ $jobApply->job->store_name }}</span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-geo-alt me-2 text-primary"></i>
                                            <span>{{ $jobApply->job->city }}</span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-calendar2-event me-2 text-primary"></i>
                                            <span>{{ \Carbon\Carbon::parse($jobApply->job->close_date)->format('d M Y') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-4">
                                        <div class="d-flex">
                                            <i class="bi bi-person-workspace me-2 text-primary"></i>
                                            <span class="fw-medium">{{ $jobApply->keterangan ?? '-' }}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-3 pt-2 border-top border-light">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#stepPenerimaan"
                                        class="btn btn-outline-primary btn-sm rounded-3 btn-sm w-100 fw-semibold text-decoration-none">
                                        <i class="bi bi-eye me-1"></i>
                                        Lihat Step
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>


                <!-- Modal -->
                <div class="modal fade" id="stepPenerimaan" tabindex="-1" aria-labelledby="stepPenerimaanLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content rounded-4">
                            <div class="modal-header bg-pink text-white rounded-top-4 p-4">
                                <h5 class="modal-title fw-semibold" id="stepPenerimaanLabel">
                                    <i class="bi bi-person-lines-fill me-2"></i>Step penerimaan kerja
                                </h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <div class="container mt-4 mb-3">
                                    <div class="row row-cols-2 row-cols-md-4 text-center">
                                        <!-- Step 1 -->
                                        <div class="col d-flex flex-column align-items-center mb-4">
                                            <div
                                                class="step-icon mb-2 btn-wait-review d-flex justify-content-center align-items-center">
                                                <i class="bi bi-clock-history fs-3 text-dark"></i>
                                            </div>
                                            <div class="fw-semibold">Waiting Review</div>
                                        </div>

                                        <!-- Step 2 -->
                                        <div class="col d-flex flex-column align-items-center mb-4">
                                            <div
                                                class="step-icon mb-2 btn-review d-flex justify-content-center align-items-center">
                                                <i class="bi bi-eye fs-3 text-dark"></i>
                                            </div>
                                            <div class="fw-semibold">In Review</div>
                                        </div>

                                        <!-- Step 3 -->
                                        <div class="col d-flex flex-column align-items-center mb-4">
                                            <div
                                                class="step-icon mb-2 btn-interview d-flex justify-content-center align-items-center">
                                                <i class="bi bi-envelope-arrow-up fs-3 text-dark"></i>
                                            </div>
                                            <div class="fw-semibold">Interview</div>
                                        </div>

                                        <!-- Step 4 -->
                                        <div class="col d-flex flex-column align-items-center mb-4">
                                            <div
                                                class="step-icon mb-2 btn-accepted d-flex justify-content-center align-items-center">
                                                <i class="bi bi-check2 fs-3 text-dark"></i>
                                            </div>
                                            <div class="fw-semibold">Reject / Accept</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer-gradient text-gray position-relative overflow-hidden">
        <div class="container py-5">
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <h3 class="fw-bolder text-dark mb-3">Let’s Connect There</h3>
                    <div class="d-flex align-items-center mb-4">
                        <img src="{{ asset('img/icon/logo-gelatik-full.png') }}" alt="Gelatik Supra" height="40"
                            class="me-3">
                    </div>
                    <p class="mb-4 pe-md-5">
                        PT. Gelatik Supra adalah mitra terpercaya dalam menyediakan solusi outsourcing profesional untuk
                        berbagai kebutuhan bisnis dengan pengalaman lebih dari 23 tahun.
                    </p>
                    <div class="d-flex gap-3">
                        <a href="#" class="text-gray fs-5"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="text-gray fs-5"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="text-gray fs-5"><i class="bi bi-linkedin"></i></a>
                        <a href="#" class="text-gray fs-5"><i class="bi bi-twitter"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3">
                    <h6 class="fw-bold mb-4">Navigation</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-gray text-decoration-none">Home</a></li>
                        <li class="mb-2"><a href="#" class="text-gray text-decoration-none">Services</a></li>
                        <li class="mb-2"><a href="#" class="text-gray text-decoration-none">Career</a></li>
                        <li class="mb-2"><a href="#" class="text-gray text-decoration-none">News</a></li>
                        <li class="mb-2"><a href="#" class="text-gray text-decoration-none">Gallery</a></li>
                        <li class="mb-2"><a href="#" class="text-gray text-decoration-none">Contact</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-3">
                    <h6 class="fw-bold mb-4">Services</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-gray text-decoration-none">Retail Services</a>
                        </li>
                        <li class="mb-2"><a href="#" class="text-gray text-decoration-none">Event &
                                Activation</a></li>
                        <li class="mb-2"><a href="#" class="text-gray text-decoration-none">Building
                                Material</a></li>
                        <li class="mb-2"><a href="#" class="text-gray text-decoration-none">Outsourcing</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-6">
                    <h6 class="fw-bold mb-4">Contact Info</h6>
                    <div class="d-flex align-items-start mb-3">
                        <i class="bi bi-geo-alt me-3 mt-1"></i>
                        <div>
                            <p class="mb-0">Jl. Raya Pasar Minggu No. 123<br>Jakarta Selatan 12560, Indonesia</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <i class="bi bi-telephone me-3"></i>
                        <span>+62 21 1234 5678</span>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <i class="bi bi-envelope me-3"></i>
                        <span>info@gelatiksupra.com</span>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="bi bi-clock me-3"></i>
                        <span>Senin - Jumat: 08:00 - 17:00</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pattern decoration -->
        <div class="position-absolute"
            style="bottom: -50px; right: -50px; width: 200px; height: 200px; background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%); z-index: 1;">
        </div>
    </footer>

    <!-- Footer Bottom -->
    <div class="footer-bottom py-3 text-center">
        <div class="container">
            <p class="mb-0 text-white">© 2024 All right reserved — PT Gelatik Supra</p>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#HistoryTable').DataTable();
        });
    </script>
@endpush
