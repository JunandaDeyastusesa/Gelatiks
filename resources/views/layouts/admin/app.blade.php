<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Gelatik Supra')</title>
    <link rel="icon" href="{{ asset('img/icon/logo-gelatik.svg') }}">

    @vite('resources/sass/app.scss')

</head>

<body>

    <div class="container-fluid adminPage">
        <div class="row">
            @include('layouts.admin.side')
            <div class="col-md-10 ms-sm-auto col-lg-10">
                @include('layouts.admin.nav')
                <div class="pt-4">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (optional) -->
    @vite('resources/js/app.js')
    
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    @stack('scripts')

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
