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

            <div class="hero-section pb-4 pb-md-0">
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
                <h2 class="register-title">Register</h2>
                <p class="register-subtitle">You can register for an account</p>

                <form method="POST" action="{{ route('register') }}" class="needs-validation" novalidate>
                    @csrf

                    <div class="mb-4">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" id="username" required />
                        <div class="invalid-feedback">Username wajib diisi.</div>
                        @error('username')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email" required />
                        <div class="invalid-feedback" id="emailFeedback">Email wajib diisi.</div>
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="password" required minlength="6" />
                        <div class="invalid-feedback">Password minimal 6 karakter.</div>
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" name="password_confirmation"
                            id="password_confirmation" required />
                        <div class="invalid-feedback" id="confirmFeedback">Konfirmasi password wajib diisi.</div>
                        @error('password_confirmation')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="Login-link">
                        You have account? <a href="{{ route('login') }}">Login Here</a>
                    </div>

                    <button type="submit" class="btn btn-Register">Register</button>
                </form>
            </div>
        </div>
    </div>
</body>

{{-- @if ($errors->any())
    <div class="alert alert-danger mt-2">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}

<script>
(() => {
    'use strict';

    const form = document.querySelector('.needs-validation');
    const emailInput = document.getElementById('email');
    const emailFeedback = document.getElementById('emailFeedback');
    const passwordInput = document.getElementById('password');
    const confirmInput = document.getElementById('password_confirmation');
    const confirmFeedback = document.getElementById('confirmFeedback');

    // Validasi email realtime
    emailInput.addEventListener('input', () => {
        if (!emailInput.value) {
            emailFeedback.textContent = "Email wajib diisi.";
            emailInput.setCustomValidity("required");
        } else {
            // jangan validasi format saat masih mengetik → hanya required
            emailInput.setCustomValidity("");
        }
    });

    // Validasi konfirmasi password realtime
    confirmInput.addEventListener('input', () => {
        if (!confirmInput.value) {
            confirmFeedback.textContent = "Konfirmasi password wajib diisi.";
            confirmInput.setCustomValidity("required");
        } else if (confirmInput.value !== passwordInput.value) {
            confirmFeedback.textContent = "Konfirmasi password tidak sesuai.";
            confirmInput.setCustomValidity("invalid");
        } else {
            confirmInput.setCustomValidity("");
        }
    });

    // Validasi submit
    form.addEventListener('submit', (event) => {
        // cek format email saat submit
        if (emailInput.value && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailInput.value)) {
            emailFeedback.textContent = "Format email tidak sesuai.";
            emailInput.setCustomValidity("invalid");
        }

        if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        }
        form.classList.add('was-validated');
    }, false);
})();
</script>

</html>
