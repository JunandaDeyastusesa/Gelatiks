<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'PT. Gelatik Supra – Layanan Retail, Event, dan Outsourcing Profesional')</title>
    <link rel="icon" href="{{ asset('img/icon/logo-gelatik.svg') }}">

    {{-- 🔹 META SEO UTAMA --}}
    <meta name="description" content="PT. Gelatik Supra menyediakan layanan Retail Services, Event & Activation, Building Material, dan Outsourcing profesional untuk mendukung bisnis Anda.">
    <meta name="keywords" content="Gelatik Supra, retail services, event activation, outsourcing, building material, layanan profesional, Indonesia, event organizer, tenaga kerja outsourcing, distribusi retail">
    <meta name="author" content="PT. Gelatik Supra">
    <meta name="robots" content="index, follow">
    <meta name="language" content="id">

    {{-- 🔹 OPEN GRAPH (untuk Facebook, LinkedIn, WhatsApp, dsb) --}}
    <meta property="og:locale" content="id_ID">
    <meta property="og:title" content="PT. Gelatik Supra – Solusi Retail & Event Profesional">
    <meta property="og:description" content="Layanan profesional di bidang retail, event, dan outsourcing. Kami mendukung pertumbuhan bisnis Anda dengan tenaga ahli terpercaya.">
    <meta property="og:image" content="https://gelatik-supra.test/img/og-image.jpg"> // Ganti dengan URL resmi situs
    <meta property="og:url" content="https://gelatik-supra.test/"> // Ganti dengan URL resmi situs
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="PT. Gelatik Supra">

    {{-- 🔹 TWITTER CARD (untuk Twitter/X preview) --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="PT. Gelatik Supra – Solusi Retail & Event Profesional">
    <meta name="twitter:description" content="Layanan profesional di bidang retail, event, dan outsourcing.">
    <meta name="twitter:image" content="https://gelatik-supra.test/img/og-image.jpg"> // Ganti dengan URL resmi situs
    <meta name="twitter:site" content="@gelatiksupra">

    {{-- 🔹 FAVICON & STYLES --}}
    @vite('resources/sass/app.scss')

    {{-- 🔹 STACK TAMBAHAN UNTUK HALAMAN SPESIFIK --}}
    @stack('meta')
</head>

<body>

    @include('layouts.landingPage.nav')

    <div class="landingPage-content">
        @yield('content')
    </div>

    {{-- 🔹 SCRIPT --}}
    @vite('resources/js/app.js')

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @stack('scripts')

    {{-- 🔹 SWEETALERT SESSION FEEDBACK --}}
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sukses!',
                text: '{{ session('success') }}',
                timer: 2000,
                showConfirmButton: false
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: '{{ session('error') }}'
            });
        </script>
    @endif

</body>

</html>
