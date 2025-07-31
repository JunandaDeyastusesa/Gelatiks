<nav class="navbar navbar-expand-lg fixed-top py-md-3">
    <div class="container-fluid px-3 px-md-5">
        <a class="navbar-brand" href="#"><img class="w-100" src="{{ asset('img/icon/logo-gelatik-full.png') }}"
                alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 gap-md-2">

                <!-- Home -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" aria-current="page" href="#"
                        onclick="setActive(this)">Home</a>
                </li>

                <!-- Services -->
                <li class="nav-item">
                    <a class="nav-link" href="#what-we-offer" onclick="setActive(this)">Services</a>
                </li>

                <!-- Career -->
                <li class="nav-item">
                    <a class="nav-link" href="#career" onclick="setActive(this)">Career</a>
                </li>

                <!-- News -->
                <li class="nav-item">
                    <a class="nav-link" href="#news-event" onclick="setActive(this)">News</a>
                </li>

                <!-- Gallery -->
                <li class="nav-item">
                    <a class="nav-link" href="#gallery" onclick="setActive(this)">Gallery</a>
                </li>

                <!-- Contact -->
                <li class="nav-item">
                    <a class="nav-link" href="#contact" onclick="setActive(this)">Contact</a>
                </li>

                <!-- Login -->
                <li class="nav-item ms-3">
                    <a class="nav-link btn-login text-light px-3" href="{{ route('login') }}">Login</a>
                </li>

            </ul>
        </div>
    </div>
</nav>


<script>
    function setActive(element) {
        document.querySelectorAll('.nav-link').forEach(link => link.classList.remove('active'));
        element.classList.add('active');
    }
</script>
