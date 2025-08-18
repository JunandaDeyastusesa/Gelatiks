</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>500 Internal Server Error</title>
    <link rel="icon" href="{{ asset('img/icon/logo-gelatik.svg') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite('resources/sass/app.scss')
</head>

<body class="error-page">
    <!-- Full background pattern -->
    <div class="background-pattern" style="background-image: url('{{ asset('img/Pattern.png') }}');"></div>

    <!-- Desktop Layout (sama seperti asli) -->
    <div class="desktop-layout d-none d-md-flex">
        <div class="error-card">
            <div class="error-header">
                <div class="dot-container">
                    <div class="dot"></div>
                    <div class="dot"></div>
                    <div class="dot"></div>
                </div>
            </div>
            <div class="error-content">
                <h1>500</h1>
                <p>Internal Server Error</p>
                <pa>Maaf, terjadi kesalahan pada server internal. Silakan coba lagi nanti.</pa>
                <img src="{{ asset('img/fly-colo-outliine-01.png') }}" alt="Logo" class="error-logo">
            </div>
        </div>
    </div>

    <!-- Mobile Layout (desain baru kreatif) -->
    <div class="mobile-layout d-md-none">
        <div class="container-fluid h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <!-- Bird Image Outside Card -->
                    <div class="mobile-bird-container text-center mb-4">
                        <img src="{{ asset('img/fly-colo-outliine-01.png') }}" alt="Logo" class="mobile-bird-image">
                    </div>

                    <!-- Clean Card without pink header -->
                    <div class="mobile-error-card">
                        <div class="mobile-error-content text-center">
                            <h1 class="mobile-404">500</h1>
                            <h2 class="mobile-title">Kesalahan Internal Server</h2>
                            <p class="mobile-description">Maaf, terjadi kesalahan pada server internal. Silakan coba
                                lagi nanti.</p>
                            <div class="mobile-action mt-4">
                                <a href="/" class="btn btn-primary mobile-btn">
                                    <i class="fas fa-home me-2"></i>Kembali ke Beranda
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
