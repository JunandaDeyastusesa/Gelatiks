@extends('layouts.landingPage.app')

@section('title', 'About – Gelatik Supra')

@section('content')

    <section class="carrer bg-light mt-5 mt-md-0">
        <div class="container py-3 pb-5">
            <div class="mb-2">
                <div>
                    <h2 class="fw-bold text-gray mb-1">About Gelatik Supra</h2>
                    <p class="text-secondary mb-0">
                        Deliver value through people and empower brands to grow
                    </p>
                </div>
                <div class="d-flex justify-content-end align-items-center">
                    <a href="{{ route('home') }}" class="text-decoration-none d-flex align-items-center text-dark">
                        <i class="bi bi-arrow-left-short fs-5 me-1"></i>
                        Homepage
                    </a>
                </div>
            </div>
            <hr class="mt-3 mb-0" />

            <div class="row align-items-center md-3 mt-2 g-4">
                <div class="col-lg-4 col-md-5 col-12 mb-4 mb-md-0">
                    <div class="img-box rounded-4 p-2">
                        <img src="{{ asset('img/ofice-3 1.png') }}" alt="Office" class="img-fluid rounded-4 w-100" />
                    </div>
                </div>
                <div class="col-lg-8 col-md-7 col-12" style="text-align: justify;">
                    <p class="mb-3">
                        Since 1995, when Hadi and Susie Suprapto founded the company, our
                        vision has remained the same: to serve our clients as their
                        extended arm, providing exceptional operational systems and, most
                        importantly, dedicated people. We believe that people are our
                        greatest asset. That's why at Gelatik, we continuously invest in
                        developing our teams by improving their skills, knowledge, and
                        attitude while nurturing a joyful learning environment.
                    </p>

                    <p class="mb-3">
                        Over the years, we've grown to become a trusted partner for more
                        than 117 clients, operating across 34 provinces in Indonesia, with
                        over 6,500 field personnel nationwide. Our commitment to
                        transparency, accountability, and compliance keeps us moving
                        forward in a fast-changing business world.
                    </p>

                    <p class="mb-3">
                        In 2006, we established BTB (PT Bina Tunas Bestari) as an
                        affiliate company to strengthen the independence and
                        confidentiality of our services.
                    </p>

                    <p class="mb-0">
                        Today, retail is at the core of what we do. But tomorrow, we aim
                        higher. We envision Gelatik not just as a workforce provider, but
                        as a human-centered service company that happens to shape brands
                        through people.
                    </p>
                </div>
            </div>
        </div>
    </section>


    <!-- Footer -->
    <footer class="footer-gradient text-gray position-relative overflow-hidden">
        <div class="container py-5">
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 col-12">
                    <h3 class="fw-bolder text-dark mb-3">Let's Connect There</h3>
                    <div class="d-flex align-items-center mb-4">
                        <img src="{{ asset('img/icon/logo-gelatik-full.png') }}" alt="Gelatik Supra" height="40"
                            class="me-3">
                    </div>
                    <p class="mb-4 pe-lg-5">
                        PT. Gelatik Supra adalah mitra terpercaya dalam menyediakan solusi outsourcing profesional untuk
                        berbagai kebutuhan bisnis dengan pengalaman lebih dari 23 tahun.
                    </p>
                    <div class="d-flex gap-3 mb-4 mb-lg-0">
                        <a href="#" class="text-gray fs-5 d-flex align-items-center justify-content-center"
                           style="width: 40px; height: 40px; border-radius: 50%; background-color: rgba(255,255,255,0.1);">
                            <i class="bi bi-facebook"></i>
                        </a>
                        <a href="#" class="text-gray fs-5 d-flex align-items-center justify-content-center"
                           style="width: 40px; height: 40px; border-radius: 50%; background-color: rgba(255,255,255,0.1);">
                            <i class="bi bi-instagram"></i>
                        </a>
                        <a href="#" class="text-gray fs-5 d-flex align-items-center justify-content-center"
                           style="width: 40px; height: 40px; border-radius: 50%; background-color: rgba(255,255,255,0.1);">
                            <i class="bi bi-linkedin"></i>
                        </a>
                        <a href="#" class="text-gray fs-5 d-flex align-items-center justify-content-center"
                           style="width: 40px; height: 40px; border-radius: 50%; background-color: rgba(255,255,255,0.1);">
                            <i class="bi bi-twitter"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-6">
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
                <div class="col-lg-2 col-md-3 col-6">
                    <h6 class="fw-bold mb-4">Services</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-gray text-decoration-none">Retail Services</a></li>
                        <li class="mb-2"><a href="#" class="text-gray text-decoration-none">Event & Activation</a>
                        </li>
                        <li class="mb-2"><a href="#" class="text-gray text-decoration-none">Building Material</a>
                        </li>
                        <li class="mb-2"><a href="#" class="text-gray text-decoration-none">Outsourcing</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <h6 class="fw-bold mb-4">Contact Info</h6>
                    <div class="d-flex align-items-start mb-3">
                        <i class="bi bi-geo-alt me-3 mt-1 text-primary"></i>
                        <div>
                            <p class="mb-0">Jl. Raya Pasar Minggu No. 123<br>Jakarta Selatan 12560, Indonesia</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <i class="bi bi-telephone me-3 text-primary"></i>
                        <a href="tel:+622112345678" class="text-gray text-decoration-none">+62 21 1234 5678</a>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <i class="bi bi-envelope me-3 text-primary"></i>
                        <a href="mailto:info@gelatiksupra.com" class="text-gray text-decoration-none">info@gelatiksupra.com</a>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="bi bi-clock me-3 text-primary"></i>
                        <span>Senin - Jumat: 08:00 - 17:00</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pattern decoration -->
        <div class="position-absolute d-none d-md-block"
            style="bottom: -50px; right: -50px; width: 200px; height: 200px;
                background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
                z-index: 1;">
        </div>
    </footer>

    <!-- Footer Bottom -->
    <div class="footer-bottom py-3 text-center">
        <div class="container">
            <p class="mb-0 text-white small">© 2024 All right reserved — PT Gelatik Supra</p>
        </div>
    </div>

@endsection
