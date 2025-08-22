@extends('layouts.landingPage.app')

@section('title', 'Gelatik Supra')

@section('content')

    <section class="hero-content d-flex align-items-center">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-6 flex-column justify-content-center text-center text-md-start">
                    <h2 class="pb-2">Mitra <span style="color: #EC008C; font-weight: 700;"> Outsourcing Profesional </span>
                        untuk Kebutuhan Bisnis Anda</h2>
                    <p class="desc">SPG, SPB, Beauty Consultant, &amp; Merchandiser terbaik siap membantu kesuksesan
                        brand Anda.</p>

                    <div class="d-flex justify-content-center justify-content-md-start gap-3">
                        <a href="{{ route('carrer.index') }}" class="btn btn-login">Lihat Karir</a>
                        <a href="#coverage" class="btn btn-readMore">Selengkapnya</a>
                    </div>
                </div>

                <div class="col-md-6 d-none d-md-block">
                    <img src="{{ asset('img/team 2.png') }}" alt="Hero Image" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <section class="coverage">
        <div class="container">
            <div class="card border-0">
                <div class="card-body">
                    <img class="position-absolute top-0 end-0 d-none d-md-block" src="{{ asset('img/icon/top-right.png') }}"
                        alt="">

                    <div class="row pb-3">
                        <div
                            class="col-12 col-md-9 d-flex flex-column justify-content-center align-items-center align-items-md-start text-start">
                            <h2 class="title text-center text-md-start">Kami Berkontribusi dalam <span
                                    style="color: #EC008C; font-weight: 700; line-height: 2rem;">
                                    Meningkatkan Produktivitas & Efisiensi </span> Organisasi di Indonesia</h2>
                            <p class="text-center text-md-start">GELATIK mengembangkan SDM andal untuk solusi terbaik.</p>
                        </div>
                        <div class="col-md-3 d-flex justify-content-center justify-content-md-start">
                        </div>
                    </div>

                    <div class="row row-cols-1 row-cols-md-3 g-md-4 g-2  z-3">
                        <div class="col d-flex flex-column align-items-center align-items-md-start text-start">
                            <div class="text-start">
                                <div class="d-flex justify-content-center justify-content-md-start align-items-center pb-2">
                                    <i class="bi bi-geo-fill fs-1 me-2"></i>
                                    @foreach ($coverage as $item)
                                        <h1 class="mb-0 text-pri fw-bold">{{ $item->qty_province }}</h1>
                                    @endforeach
                                    {{-- <h1 class="mb-0 text-pri fw-bold">{{$coverage->qty_province}}</h1> --}}
                                </div>
                                <p class="mb-0">Province Coverage</p>
                            </div>
                        </div>

                        <div class="col d-flex flex-column align-items-center text-center">
                            <div class="text-start">
                                <div class="d-flex justify-content-center justify-content-md-start align-items-center pb-2">
                                    <i class="bi bi-people-fill fs-1 me-2"></i>
                                    @foreach ($coverage as $item)
                                        <h1 class="mb-0 text-pri fw-bold">{{ $item->qty_clients }}</h1>
                                    @endforeach
                                    {{-- <h1 class="mb-0 text-pri fw-bold">{{$coverage->qty_clients}}</h1> --}}
                                </div>
                                <p class="mb-0">Happy Clients</p>
                            </div>
                        </div>

                        <div class="col d-flex flex-column align-items-center align-items-md-end">
                            <div class="text-start">
                                <div class="d-flex justify-content-center justify-content-md-start align-items-center pb-2">
                                    <i class="bi bi-clock-history fs-1 me-2"></i>
                                    @foreach ($coverage as $item)
                                        <h1 class="mb-0 text-pri fw-bold">{{ $item->qty_experience }}</h1>
                                    @endforeach
                                    {{-- <h1 class="mb-0 text-pri fw-bold">{{$coverage->qty_experience}}</h1> --}}
                                </div>
                                <p class="mb-0">Years Experience</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="about d-flex align-items-center pt-5 my-5 my-md-0" id="coverage">
        <div class="container my-5 my-md-0">
            <div class="row">
                <div class="col-md-5 d-none d-md-block">
                    <img src="{{ asset('img/ofice-3 1.png') }}" alt="">
                </div>

                <div class="col-md-7 px-5">
                    <div class="header pb-4">
                        <p class="fs-5 mb-0 text-pri fw-medium">Tentang Kami</p>
                        <h2 class="fw-bold">PT. Gelatik Supra</h2>
                    </div>

                    <div class="col-md-5 pb-4 d-md-none">
                        <img src="{{ asset('img/ofice-3 1.png') }}" alt="">
                    </div>

                    <div class="content mb-5 mb-md-0">
                        <p class="mb-5">Since it was founded by Hadi and Susie Suprapto, in 1995, our vision remain
                            unchanged that is to
                            serve our clients as their extended arms, giving the best value of money through its best
                            operating systems and most importantly highly dedicated qualified people. <br> <br> We firmly
                            believe that
                            people are our ultimate important assets, thereby At Gelatik, we continuously seek ways to
                            develop our people in matters of their skill, knowledge and attitude while at the same time
                            maintaining a happy learning atmosphere.</p>
                        <a class="btn btn-readMore" href="{{ route('customer.about') }}">Lihat Lanjut</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- What We Offer -->
    <section class="What-We-Offer bg-light mt-5 mt-md-0" id="what-we-offer">
        <div class="container py-3 pb-5">
            <div class="text-center mb-5">
                <h2 class="fw-bold text-gray mb-3">What We Offer</h2>
                <p class="lead">Layanan profesional yang dapat kami berikan untuk mendukung bisnis Anda</p>
            </div>

            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 border-0 shadow-sm text-center py-5 px-4">
                        <div class="offer-icon mx-auto mb-4">
                            <i class="bi bi-shop"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Retail Services</h5>
                        <p class="text-muted">Penyediaan tenaga kerja profesional untuk kebutuhan retail dan penjualan
                            dengan standar pelayanan terbaik.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 border-0 shadow-sm text-center py-5 px-4">
                        <div class="offer-icon mx-auto mb-4">
                            <i class="bi bi-calendar-event"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Event & Activation</h5>
                        <p class="text-muted">Tim profesional untuk mendukung event dan aktivasi brand dengan pengalaman
                            yang luas di berbagai industri.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 border-0 shadow-sm text-center py-5 px-4">
                        <div class="offer-icon mx-auto mb-4">
                            <i class="bi bi-building"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Building Material Services</h5>
                        <p class="text-muted">Solusi tenaga kerja untuk industri material bangunan dengan keahlian teknis
                            yang mumpuni.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Career Section -->
    <section class="career-section py-3" id="career">
        <div class="container py-5">
            <div class="row py-md-5 align-items-center">
                <div class="col-lg-6">
                    <h2 class="fw-bold text-gray mb-4">Grow With <span class="text-pink">Gelatik Supra</span></h2>
                    <p class="mb-4">We are a people-focused company committed to delivering exceptional value through
                        efficient operations and a passionate, dedicated team. <br><br> We believe that our people are our
                        greatest
                        strength. That’s why we invest in continuous development — nurturing skills, expanding knowledge,
                        and building the right mindset, all within a positive and supportive environment.</p>

                    <div class="mb-4">
                        <p class="fw-medium">Benefits :</p>
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <ul>
                                    <li class="">Personal & Professional Growth</li>
                                    <li class="">Team-Oriented Culture</li>
                                    <li class="">Career Development</li>
                                </ul>
                            </div>

                            <div class="col-md-6 col-12">
                                <ul>
                                    <li class="">Personal & Professional Growth</li>
                                    <li class="">Team-Oriented Culture</li>
                                    <li class="">Career Development</li>
                                </ul>
                            </div>

                        </div>
                    </div>

                    <a href="{{ route('carrer.index') }}" class="btn btn-login text-center w-50 d-none d-md-block">Lihat
                        Semua Lowongan</a>
                </div>
                <div class="col-lg-6">
                    <div class="row g-3">
                        @foreach ($job as $item)
                            <div class="col-12">
                                <a href="{{ route('carrer.show', $item->id) }}" class="text-decoration-none">
                                    <div class="job-card card py-4 px-4">
                                        <div class="row d-flex align-items-center">
                                            <div class="col-2">
                                                <img src="{{ asset('img/icon/logo-gelatik.svg') }}" alt=""
                                                    class="rounded-circle me-3" width="75" height="75">
                                            </div>
                                            <div class="col-10 ps-4">
                                                <div class="ps-3 ps-md-0 d-flex justify-content-between align-items-start">
                                                    <div>
                                                        <h5 class="fw-bold text-gray mb-0"> {{ $item->jobs_name }}</h5>
                                                        <p class="text-success fst-italic small mb-2"> Dibuat :
                                                            <span>{{ $item->created_at->format('d F Y') }}</span>
                                                        </p>
                                                        <p class="text-muted mb-0"><i class="bi bi-pin-map-fill pe-2"></i>
                                                            {{ $item->store_name }}, {{ $item->city }}</p>
                                                        <p class="text-muted mb-0"><i class="bi bi-person-add pe-2"></i>
                                                            {{ $item->open_position }}
                                                            Orang</p>
                                                    </div>
                                                    <span
                                                        class="badge bg-success">{{ $item->close_date->format('d M Y') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="btn-respon">
                    <a href="#" class="btn btn-login text-center d-md-none w-100 px-3 mt-5">Lihat Semua Lowongan</a>
                </div>

            </div>
        </div>
    </section>

    <!-- News & Event -->
    <section class="py-5 bg-light newsEvent" id="news-event">
        <div class="container py-5">
            <div class="text-center mb-5">
                <h2 class="fw-bold text-gray mb-3">News & Event</h2>
                <p class="lead">Informasi terbaru dan event yang akan datang</p>
            </div>

            <div class="row g-4">
                @foreach ($newsEvent as $event)
                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="ratio ratio-16x9">
                                <img src="{{ asset('storage/' . $event->image) }}" alt="News 1"
                                    class="img-fluid object-fit-cover">
                            </div>
                            <div class="card-body">
                                <p class="text-muted small mb-2">{{ $event->created_at->format('d F Y') }}</p>
                                <h5 class="fw-bold mb-3">{{ $event->title }}</h5>
                                <p class="text-muted">{{ $event->content }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Happy Clients -->
    <section class="HappyClients py-5" style="background-color: #f8f9fa;">
        <div class="container py-5">
            <div class="text-center mb-5">
                <h2 class="fw-bold text-gray mb-3">Happy Clients</h2>
                <p class="lead">Testimoni dari klien yang puas dengan layanan kami</p>
            </div>

            <div class="row g-4">
                @foreach ($testimoni as $item)
                    <div class="col-lg-4">
                        <div class="card h-100 border-0 shadow-sm px-4 py-5">
                            <div class="mb-3">
                                <i class="bi bi-quote text-pink" style="font-size: 2rem;"></i>
                            </div>
                            <p class="mb-4">{{ $item->testimony }}</p>
                            <div class="d-flex align-items-center pb-4">
                                <img src="{{ asset('storage/' . $item->image) }}" alt="Client 1"
                                    class="rounded-circle me-3" width="50" height="50">
                                <div>
                                    <h6 class="fw-bold mb-0">{{ $item->name }}</h6>
                                    <small class="text-muted">{{ $item->job_title }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Client Logos -->
    <section class="py-5 bg-white mt-5">
        <div class="px-4 px-md-0">
            <!-- Wrapper Swiper -->
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    @foreach ($lgPartner as $partnership)
                        <div class="swiper-slide text-center">
                            <img src="{{ asset('storage/' . $partnership->image) }}" alt="Client Logo" class="img-fluid"
                                style="max-height: 60px;">
                        </div>
                    @endforeach

                    @foreach ($lgPartner as $partnership)
                        <div class="swiper-slide text-center">
                            <img src="{{ asset('storage/' . $partnership->image) }}" alt="Client Logo" class="img-fluid"
                                style="max-height: 60px;">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery -->
    <section class="py-5 bg-light gallery" id="gallery">
        <div class="container py-5">
            <div class="text-center mb-5">
                <h2 class="fw-bold text-gray mb-3">Gallery</h2>
                <p class="lead">Dokumentasi kegiatan dan pencapaian kami</p>
            </div>

            <div class="row row-cols-2 row-cols-md-4 g-4">
                @foreach ($gallery as $item)
                    <div class="col">
                        <div class="ratio ratio-4x3">
                            <img src="{{ asset('storage/' . $item->image) }}" alt="Gallery {{ $loop->index + 1 }}"
                                class="img-fluid object-fit-cover rounded-3">
                        </div>
                    </div>
                @endforeach

                <div class="col">
                    <div class="card h-100 border-0 shadow-sm d-flex align-items-center justify-content-center text-center"
                        style="min-height: 90px;">
                        <div class="card-body">
                            <i class="bi bi-images text-pink mb-3 d-none d-md-block" style="font-size: 3rem;"></i>
                            <h5 class="fw-bold mb-3">View All</h5>
                            <a href="{{ route('gallery.all') }}" class="btn btn-primary">Lihat Semua</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ -->
    <section class="py-5 bg-white">
        <div class="container py-5">
            <div class="text-center mb-5">
                <h2 class="fw-bold text-gray mb-2">Frequently Asked Questions (FAQ)</h2>
                <p class="text-muted">Pertanyaan yang sering diajukan tentang layanan kami</p>
            </div>

            <div class="row justify-content-center">
                <div class="">
                    <div class="accordion gap-4" id="faqAccordion">
                        <div class="accordion-item mb-3 border-0">
                            <h2 class="accordion-header">
                                <button class="accordion-button py-4 fw-bold" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq1">
                                    Apa saja layanan yang disediakan oleh PT. Gelatik Supra?
                                </button>
                            </h2>
                            <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Kami menyediakan berbagai layanan outsourcing profesional termasuk Retail Services,
                                    Event & Activation, dan Building Material Services. Tim ahli kami siap membantu
                                    kebutuhan tenaga kerja perusahaan Anda.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item mb-3 border-0">
                            <h2 class="accordion-header">
                                <button class="accordion-button py-4 collapsed fw-bold" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq2">
                                    Bagaimana cara mengajukan kerjasama dengan PT. Gelatik Supra?
                                </button>
                            </h2>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Anda dapat menghubungi kami melalui form contact di website ini, email, atau telepon.
                                    Tim kami akan segera merespons dan membantu Anda dalam proses kerjasama.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item mb-3 border-0">
                            <h2 class="accordion-header">
                                <button class="accordion-button py-4 collapsed fw-bold" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq3">
                                    Berapa lama pengalaman PT. Gelatik Supra di industri ini?
                                </button>
                            </h2>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    PT. Gelatik Supra telah berpengalaman lebih dari 23 tahun di industri outsourcing dan
                                    telah melayani 117 klien di 34 provinsi di Indonesia.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item mb-3 border-0">
                            <h2 class="accordion-header">
                                <button class="accordion-button py-4 collapsed fw-bold" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq4">
                                    Apakah tersedia lowongan kerja di PT. Gelatik Supra?
                                </button>
                            </h2>
                            <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Ya, kami selalu membuka kesempatan karir untuk berbagai posisi. Silakan kunjungi halaman
                                    Career untuk melihat lowongan terbaru atau hubungi tim HR kami.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item mb-3 border-0">
                            <h2 class="accordion-header">
                                <button class="accordion-button py-4 collapsed fw-bold" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq5">
                                    Dimana saja wilayah operasional PT. Gelatik Supra?
                                </button>
                            </h2>
                            <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Kami beroperasi di 34 provinsi di seluruh Indonesia, dengan kantor pusat di Jakarta dan
                                    cabang-cabang di kota-kota besar lainnya.
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 5,
            spaceBetween: 30,
            loop: true,
            loopedSlides: 10, // duplikat agar cukup untuk loop
            autoplay: {
                delay: 0,
                disableOnInteraction: false,
            },
            speed: 3000,
            breakpoints: {
                320: {
                    slidesPerView: 2
                },
                768: {
                    slidesPerView: 3
                },
                992: {
                    slidesPerView: 4
                },
                1200: {
                    slidesPerView: 5
                }
            }
        });
    </script>
@endpush
