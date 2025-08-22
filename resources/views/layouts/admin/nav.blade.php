<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid py-2">
        <a class="nav-brand text-decoration-none" href="#">@yield('nav-title', 'Gelatik Supra')</a>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <!-- Dropdown untuk User Logged In -->
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle text-decoration-none text-dark" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Hi, {{ Auth::user()->username }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="#" onclick="confirmLogout(event)">Logout</a>
                        </li>
                    </ul>

                    <!-- Form Logout (disembunyikan) -->
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>

                </li>

            </ul>
        </div>
    </div>
</nav>

<script>
    function confirmLogout(event) {
        event.preventDefault();
        Swal.fire({
            title: 'Yakin ingin Keluar?',
            text: "Kamu akan keluar dari sesi login.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, logout!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('logout-form').submit();
            }
        });
    }
</script>
