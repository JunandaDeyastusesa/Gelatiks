@extends('layouts.landingPage.app')

@section('title', 'Gelatik Supra')

@section('content')

    @php
        $pengKerja1 = explode(' | ', $showProfile->pengKerja1 ?? '');
        $pengKerja2 = explode(' | ', $showProfile->pengKerja2 ?? '');
        $pengKerja3 = explode(' | ', $showProfile->pengKerja3 ?? '');
    @endphp

    <section class="profile bg-light">
        <div class="container py-3 pb-5">
            <div class="mb-2">
                <div class="d-md-flex">
                    <div class="mb-3">
                        <img src="{{ asset('img/icon/logo-gelatik-full.png') }}" alt="" class="me-4"
                            style="max-width: 120px; height: auto;">
                    </div>
                    <div class="d-block">
                        <h2 class="fw-bold text-gray mb-1">{{ $showcarrer->jobs_name }}</h2>
                        <p class="text-secondary mb-0">Deadline:
                            {{ \Carbon\Carbon::parse($showcarrer->close_date)->format('d M Y') }}</p>
                    </div>
                </div>

                <div class="d-md-flex justify-content-end align-items-center d-none">
                    <a href="{{ route('carrer.show', $showcarrer->id) }}"
                        class="text-decoration-none d-flex align-items-center text-dark">
                        <i class="bi bi-arrow-left-short fs-5 me-1"></i>
                        Details Job
                    </a>
                </div>
                <hr class="mt-3 mb-0" />
            </div>

            <!-- Card: Biodata -->
            @if ($showProfile)
                <div class="card p-4 p-md-5 mt-4" style="background: #fff">
                    <p class="fs-4 fw-semibold mb-4">Biodata Anda</p>
                    <div class="row">
                        <div class="col-md-3 text-center text-md-start">
                            @if ($showProfile->photo)
                                <img src="{{ asset('storage/' . $showProfile->photo) }}" alt="User Image"
                                    class="rounded-4 img-fluid" style="max-width: 200px; height: 200px; object-fit: cover;">
                            @else
                                <div class="d-flex justify-content-center align-items-center"
                                    style="width: 200px; height: 200px; border: 1px dashed #ccc; border-radius: 1rem;">
                                    <span class="text-muted">Foto belum diunggah</span>
                                </div>
                            @endif
                        </div>
                        <div class="col">

                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label class="form-label text-muted mb-1">Nama Lengkap</label>
                                    <div class="fw-semibold fs-6">{{ $showProfile->namaLengkap ?? '-' }}</div>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label text-muted mb-1">Kelahiran</label>
                                    <div class="fw-semibold fs-6">
                                        {{ \Carbon\Carbon::parse($showProfile->kelahiran)->format('d M Y') }}
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label text-muted mb-1">Jenis Kelamin</label>
                                    <div class="fw-semibold fs-6">{{ $showProfile->kelamin ?? '-' }}</div>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label text-muted mb-1">Pendidikan</label>
                                    <div class="fw-semibold fs-6">{{ $showProfile->pendidikan ?? '-' }}</div>
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label text-muted mb-1">Kategori</label>
                                    <div class="fw-semibold fs-6">{{ $showProfile->category ?? '-' }}</div>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label text-muted mb-1">No Telp</label>
                                    <div class="fw-semibold fs-6">{{ $showProfile->telp ?? '-' }}</div>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label text-muted mb-1">CV</label>
                                    <div class="fw-semibold fs-6"><a class="btn btn-success btn-sm"
                                            href="{{ asset('storage/' . $showProfile->docCV) }}" target="_blank"><i
                                                class="bi bi-eye-fill me-2"></i> Lihat CV</a></div>
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label text-muted mb-1">Domisili</label>
                                    <div class="fw-semibold fs-6">{{ $showProfile->domisili ?? '-' }}</div>
                                </div>

                                <div class="col-12">
                                    <hr>
                                </div>

                                <p class="fs-5 fw-semibold mb-0">Pengalaman Kerja</p>
                                <div class="col-md-12 table-responsive">
                                    <table class="table">
                                        <thead class="head-table">
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Perusahaan</th>
                                                <th>Tahun</th>
                                                <th>Posisi</th>
                                                <th>Produk</th>
                                                <th>Alasan</th>
                                            </tr>
                                        </thead>
                                        <tbody class="body-table">
                                            <tr>
                                                <td>01</td>
                                                <td>{{ $pengKerja1[0] ?? '-' }}</td>
                                                <td>{{ $pengKerja1[1] ?? '-' }}</td>
                                                <td>{{ $pengKerja1[2] ?? '-' }}</td>
                                                <td>{{ $pengKerja1[3] ?? '-' }}</td>
                                                <td>{{ $pengKerja1[4] ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <td>02</td>
                                                <td>{{ $pengKerja2[0] ?? '-' }}</td>
                                                <td>{{ $pengKerja2[1] ?? '-' }}</td>
                                                <td>{{ $pengKerja2[2] ?? '-' }}</td>
                                                <td>{{ $pengKerja2[3] ?? '-' }}</td>
                                                <td>{{ $pengKerja2[4] ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <td>03</td>
                                                <td>{{ $pengKerja3[0] ?? '-' }}</td>
                                                <td>{{ $pengKerja3[1] ?? '-' }}</td>
                                                <td>{{ $pengKerja3[2] ?? '-' }}</td>
                                                <td>{{ $pengKerja3[3] ?? '-' }}</td>
                                                <td>{{ $pengKerja3[4] ?? '-' }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <form action="{{ route('carrer.submit', $showcarrer->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="jobs_id" value="{{ $showcarrer->id }}">
                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                            <input type="hidden" name="status" value="Waiting Review">
                            <button type="submit" class="btn btn-primary">Lamar Sekarang</button>
                        </form>

                    </div>

                </div>
            @endif
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
