@php
    $currentRouteName = Route::currentRouteName();
@endphp

<!-- Sidebar -->
<nav class="col-md-2 col-lg-2 d-md-block sidebar sidebar-shadow shadow">
    <div class="sidebar-menu position-sticky pt-4 py-1">
        <div class="text-center mb-4">
            <img src="{{ asset('img/icon/logo-gelatik-full.png') }}" alt="Logo" class="side-logo img-fluid">
        </div>
        @auth

            <div class="managae-jobs mt-3">
                <p class="fw-medium mb-2">Manage Jobs</p>
                <ul class="nav flex-column ms-1 me-4">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="pe-2 fs-5 bi bi-columns-gap"></i>
                            Dashboard
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ $currentRouteName == 'applicants.index' ? 'active' : '' }}"
                            href="{{ route('applicants.index') }}">
                            <i class="pe-2 fs-5 bi bi-people"></i>
                            Applicants
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ in_array($currentRouteName, ['jobs.index', 'admin.jobs/applicants']) ? 'active' : '' }}"
                            href="{{ route('jobs.index') }}">
                            <i class="pe-2 fs-5 bi bi-suitcase-lg"></i>
                            Jobs
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ in_array($currentRouteName, ['admin.register.index']) ? 'active' : '' }}"
                            href="{{ route('admin.register.index') }}">
                            <i class="pe-2 fs-5 bi bi-person-lines-fill"></i>
                            Registration
                        </a>
                    </li>


                </ul>
            </div>

            @if (auth()->user()->userRole?->name === 'Admin')
                <div class="managae-landingPage mt-3">
                    <p class="fw-medium mb-2">Manage Landing Page</p>
                    <ul class="nav flex-column ms-1 me-4">
                        <li class="nav-item">
                            <a class="nav-link {{ $currentRouteName == 'partnership.index' ? 'active' : '' }}"
                                href="{{ route('partnership.index') }}">
                                <i class="pe-2 fs-5 bi bi-person-check"></i>
                                Partnership
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ $currentRouteName == 'newsEvent.index' ? 'active' : '' }}"
                                href="{{ route('newsEvent.index') }}">
                                <i class="pe-2 fs-5 bi bi-newspaper"></i>
                                News & Event
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ $currentRouteName == 'testimoni.index' ? 'active' : '' }}"
                                href={{ route('testimoni.index') }}>
                                <i class="pe-2 fs-5 bi bi-chat-right-text"></i>
                                Testimoni
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ $currentRouteName == 'gallery.index' ? 'active' : '' }}"
                                href="{{ route('gallery.index') }}">
                                <i class="pe-2 fs-5 bi bi-images"></i>
                                Gallery
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ $currentRouteName == 'coverage.index' ? 'active' : '' }}"
                                href="{{ route('coverage.index') }}">
                                <i class="pe-2 fs-5 bi bi-map"></i>
                                Coverage
                            </a>
                        </li>
                    </ul>
                </div>
            @endif
        @endauth
    </div>
</nav>
