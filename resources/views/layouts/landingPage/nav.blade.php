<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top py-3">
    <div class="container-fluid px-3 px-md-5">
        <!-- Logo -->
        <a class="navbar-brand" href="#">
            <img src="{{ asset('img/icon/logo-gelatik-full.png') }}" alt="Logo" style="height: 40px;">
        </a>

        <!-- Toggle button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain"
            aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu -->
        <div class="collapse navbar-collapse" id="navbarMain">
            <ul class="navbar-nav ms-auto align-items-center gap-2 gap-md-1">
                <!-- Links -->
                @php
                    $navLinks = [
                        '/' => 'Home',
                        '#what-we-offer' => 'Services',
                        '#career' => 'Career',
                        '#news-event' => 'News',
                        '#gallery' => 'Gallery',
                        '#contact' => 'Contact',
                    ];
                @endphp

                @foreach ($navLinks as $link => $label)
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is(ltrim($link, '#')) ? 'active fw-semibold text-pri' : '' }}"
                            href="{{ $link }}" onclick="setActive(this)">
                            {{ $label }}
                        </a>
                    </li>
                @endforeach

                <!-- Auth -->
                @guest
                    <li class="nav-item ms-md-3">
                        <a class="btn btn-login btn-sm px-4 text-white" href="{{ route('login') }}">Login</a>
                    </li>
                @endguest

                @auth
                    <li class="nav-item dropdown ms-md-3">
                        <a class="nav-link dropdown-toggle d-flex align-items-center gap-2" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="fw-medium">Hi, {{ Auth::user()->username }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0 mt-2">
                            <li>
                                <a class="dropdown-item d-flex align-items-center gap-2"
                                    href="{{ route('profile.index', Auth::user()->id) }}">
                                    <i class="bi bi-person-circle"></i> Profile
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center gap-2"
                                    href="{{ route('history.index') }}">
                                    <i class="bi bi-clock-history"></i> History
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center gap-2 text-danger" href="#"
                                    onclick="confirmLogout(event)">
                                    <i class="bi bi-box-arrow-right"></i> Logout
                                </a>
                            </li>
                        </ul>

                        <!-- Logout Form -->
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<script>
    function setActive(element) {
        document.querySelectorAll('.nav-link').forEach(link => link.classList.remove('active', 'fw-semibold',
            'text-pri'));
        element.classList.add('active', 'fw-semibold', 'text-pri');
    }

    function confirmLogout(event) {
        event.preventDefault();
        Swal.fire({
            title: 'Yakin ingin keluar?',
            text: "Kamu akan keluar dari sesi login.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Logout',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('logout-form').submit();
            }
        });
    }
</script>
