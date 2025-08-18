<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>403 Forbidden</title>
    <link rel="icon" href="{{ asset('img/icon/logo-gelatik.svg') }}">
    @vite('resources/sass/app.scss')
</head>

<body class="error-page">
    <!-- Full background pattern -->
    <div class="background-pattern" style="background-image: url('{{ asset('img/Pattern.png') }}');"></div>

    <!-- Card -->
    <div class="error-card">
        <div class="error-header">
            <div class="dot-container">
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
            </div>
        </div>
        <div class="error-content">
            <h1>403</h1>
            <p>Forbidden</p>
            <pa>Maaf, Anda tidak memiliki izin untuk mengakses halaman ini.</pa>
            <img src="{{ asset('img/fly-colo-outliine-01.png') }}" alt="Logo" class="error-logo">
        </div>
    </div>
</body>

</html>
