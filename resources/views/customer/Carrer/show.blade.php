@extends('layouts.landingPage.app')

@section('title', 'Gelatik Supra')

@section('content')

    <section class="carrer-details bg-light  mt-md-0 mb-5">
        <div class="container py-3 pb-5">
            <div class="mb-2">
                <h2 class="fw-bold text-gray mb-1">Job Details</h2>
                <p class="text-secondary mb-0">You can read job details in here</p>

                <div class="d-md-flex justify-content-end align-items-center d-none">
                    <a href="{{ route('carrer.index') }}" class="text-decoration-none d-flex align-items-center text-dark">
                        <i class="bi bi-arrow-left-short fs-5 me-1"></i>
                        Career
                    </a>
                </div>
                <hr class="mt-3 mb-0" />

            </div>

            <div class="row row-cols-1 row-cols-md-2 mt-2 g-4 container">
                <div class="col requirement">
                    <div class="row">
                        <div class="col-md-2">
                            <img class="w-100 mb-3" style="max-width: 100px"
                                src="{{ asset('img/icon/logo-gelatik-full.png') }}" alt="">
                        </div>
                        <div class="col-md-10">
                            <h5 class="fw-semibold mb-0">{{ $showCarrer->jobs_name }}</h5>
                            <p class="text-success fst-italic small mb-1"> Dibuat :
                                {{ \Carbon\Carbon::parse($showCarrer->created_at)->format('d M Y') }}
                            </p>
                            <p class="btn btn-success btn-sm mb-1 mb-md-4" style="font-size: 12px; padding: 2px 10px;"><i
                                    class="bi bi-clock"></i>
                                {{ \Carbon\Carbon::parse($showCarrer->close_date)->format('d M Y') }}</p>
                            <hr class="d-md-none d-block">
                            <p class="mb-2"><i class="me-2 bi bi-building"></i>
                                {{ $showCarrer->store_name . ', ' . $showCarrer->city }}</p>
                            <p class="mb-2"><i class="me-2 bi bi-people-fill"></i> {{ $showCarrer->open_position }} Orang
                            </p>
                            <p class="mb-2"><i class="me-2 bi bi-clock"></i> {{ $showCarrer->type_work }}</p>
                            <p class="mb-2"><i class="me-2 bi bi-mortarboard"></i> {{ $showCarrer->education }}</p>
                            <p class="mb-2">
                                <i class="me-2 bi bi-hourglass-split"></i>
                                Min Pengalaman
                                {{ $showCarrer->experience ? $showCarrer->experience . ' Tahun' : 'Tidak Ada' }}
                            </p>

                            <div class="mt-4 d-none d-md-flex">
                                <a class="btn btn-primary btn-sm me-2 px-4 py-2"
                                    href="{{ route('carrer.apply', $showCarrer->id) }}">Lamar Sekarang</a>
                                <div class="dropdown">
                                    <button class="btn btn-outline-primary btn-sm px-3 py-2 dropdown-toggle shadow-sm"
                                        type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-share-fill me-1"></i> Bagikan
                                    </button>

                                    <ul class="dropdown-menu shadow-sm p-2">
                                        <div class="d-flex gap-3 align-items-center px-2 py-1">
                                            <a target="_blank"
                                                href="https://api.whatsapp.com/send?text={{ urlencode(url()->current()) }}"
                                                class="text-success fs-5">
                                                <i class="bi bi-whatsapp"></i>
                                            </a>

                                            <a href="#" class="text-danger fs-5"
                                                onclick="copyAndOpenIG('{{ url()->current() }}')">
                                                <i class="bi bi-instagram"></i>
                                            </a>

                                            <a target="_blank"
                                                href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                                                class="fs-5">
                                                <i class="bi bi-facebook"></i>
                                            </a>

                                            <a href="#" onclick="copyToClipboard('{{ url()->current() }}')"
                                                class="text-secondary fs-5">
                                                <i class="bi bi-link-45deg"></i>
                                            </a>
                                        </div>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <h6 class="fw-semibold">Deskripsi</h6>
                    <p class="deskripsi-jobs">{!! nl2br(e($showCarrer->description ?? '-')) !!}</p>
                </div>
            </div>

            <div class="d-block d-md-none position-fixed bottom-0 start-0 end-0 bg-white border-top py-3 px-4"
                style="z-index: 1030;">
                <div class="d-flex justify-content-between">
                    <a class="btn btn-primary btn-sm me-2 px-5 py-2 flex-fill me-2"
                        href="{{ route('carrer.apply', $showCarrer->id) }}">Lamar Sekarang</a>
                    <div class="dropdown">
                        <button class="btn btn-outline-primary btn-sm px-3 py-2 dropdown-toggle shadow-sm" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-share-fill me-1"></i> </button>

                        <ul class="dropdown-menu shadow-sm p-2">
                            <div class="d-flex gap-3 align-items-center px-2 py-1">
                                <a target="_blank"
                                    href="https://api.whatsapp.com/send?text={{ urlencode(url()->current()) }}"
                                    class="text-success fs-5">
                                    <i class="bi bi-whatsapp"></i>
                                </a>

                                <a href="#" class="text-danger fs-5"
                                    onclick="copyAndOpenIG('{{ url()->current() }}')">
                                    <i class="bi bi-instagram"></i>
                                </a>

                                <a target="_blank"
                                    href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                                    class=" fs-5">
                                    <i class="bi bi-facebook"></i>
                                </a>

                                <a href="#" onclick="copyToClipboard('{{ url()->current() }}')"
                                    class="text-secondary fs-5">
                                    <i class="bi bi-link-45deg"></i>
                                </a>
                            </div>
                        </ul>
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
        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(function() {
                alert('Link disalin ke clipboard!');
            });
        }

        function copyAndOpenIG(url) {
            navigator.clipboard.writeText(url).then(function() {
                setTimeout(() => {
                    window.open('https://www.instagram.com/', '_blank');
                }, 500);
            });
        }
    </script>
@endpush
