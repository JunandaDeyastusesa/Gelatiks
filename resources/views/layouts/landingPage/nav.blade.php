<nav class="navbar navbar-expand-lg fixed-top py-md-3">
    <div class="container-fluid px-3 px-md-5">
        <a class="navbar-brand" href="#"><img class="w-100" src="{{ asset('img/icon/logo-gelatik-full.png')}}" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 gap-md-2">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route("home")}}">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route("customer.carrer")}}">Career</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">News</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Gallery</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
                <li class="nav-item ms-3">
                    <a class="nav-link btn-login text-light px-3" href="{{ Route('login')}}">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
