@extends('layouts.landingPage.app')

@section('title', 'Gelatik Supra')

@section('content')

    <section class="carrer bg-light mt-5 mt-md-0">
        <div class="container py-3 pb-5">
            <div class="mb-2">
                <h2 class="fw-bold text-gray mb-1">Our Gallery</h2>
                <p class="text-secondary mb-0">Dokumentasi kegiatan dan pencapaian kami</p>

                <div class="d-flex justify-content-end align-items-center">
                    <a href="{{ route('home') }}" class="text-decoration-none d-flex align-items-center text-dark">
                        <i class="bi bi-arrow-left-short fs-5 me-1"></i>
                        Homepage
                    </a>
                </div>
                <hr class="mt-3 mb-0" />
            </div>

            <section class="py-3 pb-5 bg-light gallery" id="gallery">
                <div class="container">
                    <div class="row row-cols-2 row-cols-md-4 g-4">
                        @foreach ($gallery as $item)
                            <div class="col">
                                <div class="ratio ratio-4x3">
                                    <img src="{{ asset('storage/' . $item->image) }}" alt="Gallery {{ $loop->index + 1 }}"
                                        class="img-fluid object-fit-cover rounded-3">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
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
                        PT. Gelatik Supra adalah mitra terpercaya dalam menyediakan solusi outsourcing profesional
                        untuk
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
                        <li class="mb-2">
                            <a href="{{ route('home') }}" class="text-gray text-decoration-none">Home</a>
                        </li>
                        <li class="mb-2">
                            <a href="{{ request()->routeIs('home') ? '#what-we-offer' : route('home') . '#what-we-offer' }}"
                                class="text-gray text-decoration-none">Services</a>
                        </li>
                        <li class="mb-2">
                            <a href="{{ request()->routeIs('home') ? '#career' : route('home') . '#career' }}"
                                class="text-gray text-decoration-none">Career</a>
                        </li>
                        <li class="mb-2">
                            <a href="{{ request()->routeIs('home') ? '#news-event' : route('home') . '#news-event' }}"
                                class="text-gray text-decoration-none">News</a>
                        </li>
                        <li class="mb-2">
                            <a href="{{ request()->routeIs('home') ? '#gallery' : route('home') . '#gallery' }}"
                                class="text-gray text-decoration-none">Gallery</a>
                        </li>
                        <li class="mb-2">
                            <a href="{{ request()->routeIs('home') ? '#contact' : route('home') . '#contact' }}"
                                class="text-gray text-decoration-none">Contact</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-3">
                    <h6 class="fw-bold mb-4">Services</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-gray text-decoration-none">Retail
                                Services</a>
                        </li>
                        <li class="mb-2"><a href="#" class="text-gray text-decoration-none">Event &
                                Activation</a></li>
                        <li class="mb-2"><a href="#" class="text-gray text-decoration-none">Building
                                Material</a></li>
                        <li class="mb-2"><a href="#" class="text-gray text-decoration-none">Outsourcing</a>
                        </li>
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
