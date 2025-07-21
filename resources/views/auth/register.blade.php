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

                <form>
                    <div class="mb-4">
                        <label for="FullName" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="FullName" value="John Doe" />
                    </div>

                    <div class="mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" value="jhondoe@gmail.com" />
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" value="••••••••••••" />
                    </div>

                    <div class="mb-3">
                        <label for="cpassword" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="cpassword" value="••••••••••••" />
                    </div>

                    <div class="Login-link">
                        You have account?, <a href="{{ route('login')}}">Login Here</a>
                    </div>

                    <a href="{{route('login')}}" class="btn btn-Register">Register</a>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
