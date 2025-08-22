<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Mitra Outsourcing</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('style/style.css') }}" />
</head>

<body>
    <div class="container-fluid p-0">
        <div class="main-container">
            <img class="w-25 d-md-none pt-5" src="{{ asset('img/icon/logo-gelatik.svg') }}" alt="Logo" />
            <div class="hero-section">
                <div class="hero-content-wrapper">
                    <p class="hero-text-line pt-2 pt-md-0">Mitra <span class="fw-bold"
                            style="color: #ec008c">Outsourcing
                            Profesional</span> untuk Kebutuhan Bisnis Anda</p>
                </div>
                <div class="logo-container">
                    <img src="{{ asset('img/icon/logo-gelatik.svg') }}" alt="Logo" />
                </div>
            </div>

            <div class="login-section">
                <h2 class="login-title">Login</h2>
                <p class="login-subtitle pb-2">You can login for apply</p>

                <form method="POST" action="{{ route('login') }}" class="need-validation" novalidate>
                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger text-center">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <div class="mb-5">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="mb-0 form-control" id="email" placeholder="Masukkan Email" required/>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Masukkan Password" required/>
                    </div>

                    <div class="register-link">
                        You don’t have account?, <a href="{{ route('register') }}">Register Here</a>
                    </div>

                    <button type="submit" class="btn btn-login">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
