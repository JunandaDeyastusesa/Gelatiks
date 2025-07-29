<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>About – Gelatik Supra</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{ asset('style/styleAbout.css') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet" />
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-white py-3 shadow-sm">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="{{ asset('img/icon/logo-gelatik-full.png') }}" alt="Logo" width="150" class="me-2" />
            </a>
           
            <a class="btn btn-pink" href="#">Login</a>
        </div>
    </nav>

    <!-- About Section -->
    <section class="py-5">
        <div class="container">
            <div class="about-section-header d-flex justify-content-between align-items-end flex-wrap">
                <div>
                    <h2 class="fw-bold mb-1">About Gelatik Supra</h2>
                    <p class="text-muted mb-1">
                        deliver value through people and empower brands to grow
                    </p>
                </div>
                <a href="{{ route(('home'))}}" class="homepage-link text-decoration-none">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-arrow-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                    </svg> Homepage
                </a>
            </div>
            <hr class="mt-3 mb-0" />

            <div class="row align-items-center mt-5">
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="img-box rounded-4 p-2">
                        <img src="{{asset('img/ofice-3 1.png')}}" alt="Office" class="img-fluid rounded-4" />
                    </div>
                </div>
                <div class="col-md-8">
                    <p>
                        Since 1995, when Hadi and Susie Suprapto founded the company, our
                        vision has remained the same: to serve our clients as their
                        extended arm, providing exceptional operational systems and, most
                        importantly, dedicated people. We believe that people are our
                        greatest asset. That’s why at Gelatik, we continuously invest in
                        developing our teams by improving their skills, knowledge, and
                        attitude while nurturing a joyful learning environment.
                    </p>

                    <p>
                        Over the years, we’ve grown to become a trusted partner for more
                        than 117 clients, operating across 34 provinces in Indonesia, with
                        over 6,500 field personnel nationwide. Our commitment to
                        transparency, accountability, and compliance keeps us moving
                        forward in a fast-changing business world.
                    </p>

                    <p>
                        In 2006, we established BTB (PT Bina Tunas Bestari) as an
                        affiliate company to strengthen the independence and
                        confidentiality of our services.
                    </p>

                    <p>
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
                        <li class="mb-2"><a href="#" class="text-secondary text-decoration-none">Home</a></li>
                        <li class="mb-2"><a href="#" class="text-secondary text-decoration-none">Services</a></li>
                        <li class="mb-2"><a href="#" class="text-secondary text-decoration-none">Career</a></li>
                        <li class="mb-2"><a href="#" class="text-secondary text-decoration-none">News</a></li>
                        <li class="mb-2"><a href="#" class="text-secondary text-decoration-none">Gallery</a></li>
                        <li class="mb-2"><a href="#" class="text-secondary text-decoration-none">Contact</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-3">
                    <h6 class="fw-bold mb-4">Services</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-secondary text-decoration-none">Retail
                                Services</a>
                        </li>
                        <li class="mb-2"><a href="#" class="text-secondary text-decoration-none">Event &
                                Activation</a></li>
                        <li class="mb-2"><a href="#" class="text-secondary text-decoration-none">Building
                                Material</a></li>
                        <li class="mb-2"><a href="#" class="text-secondary text-decoration-none">Outsourcing</a>
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

</html>
