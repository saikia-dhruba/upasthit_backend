<!-- Fixed Top Black Bar with Contact Info -->
<header class="d-none d-lg-block">
    <div class="bg-blue text-white py-2 position-fixed top-0 w-100 z-index-fixed">
        <div class="container-fluid d-flex flex-column flex-md-row justify-content-end align-items-center">
            <div class="d-flex align-items-left px-5 gap-4 small">
                <a href="mailto:info@upasthiti.org" class="text-white text-decoration-none">
                    <i class="fas fa-envelope me-1"></i> info@upasthiti.org
                </a>
                <a href="tel:+96597242099" class="text-white text-decoration-none">
                    <i class="fas fa-phone me-1"></i> +965-97242099
                </a>
                <a href="tel:+917385454487" class="text-white text-decoration-none">
                    <i class="fas fa-phone me-1"></i> +91-7385454487
                </a>|
                @if (!Auth::check())
                    <a href="{{ route('login') }}" class="text-white text-decoration-none">
                        <i class="fas fa-sign-in me-1"></i> Login
                    </a>
                @else
                    <a href="{{ route('user.dashboard') }}" class="text-white text-decoration-none">
                        <i class="fas fa-user me-1"></i> Dashboard
                    </a>
                @endif
            </div>
        </div>
    </div>
</header>

<!-- Navbar & Hero Start -->
<div class="container-fluid position-relative p-0 nav-container"> <!-- Adjusted for fixed top bar height -->
    <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0 bg-white">
        <a href="" class="navbar-brand p-0">
            {{-- <h1 class="text-primary"><i class="fas fa-hand-holding-water me-3"></i>Acuas</h1> --}}
            <img src="{{ asset('assets/frontend/img/logo/logo.png') }}" alt="Logo">
        </a>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0 gap-4">
                <a href="{{ route('home') }}"
                    class="nav-item nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>

                {{-- About Us --}}
                <div class="nav-item dropdown {{ request()->routeIs('about-us.*') ? 'active' : '' }}">
                    <a href="#"
                        class="nav-link dropdown-toggle {{ request()->routeIs('about-us.*') ? 'active' : '' }}"
                        data-bs-toggle="dropdown">About Us</a>
                    <div class="dropdown-menu m-0 border-0">
                        <a href="{{ route('about-us.founders-message') }}"
                            class="dropdown-item {{ request()->routeIs('about-us.founders-message') ? 'active' : '' }}">Founders
                            Message</a>
                        <a href="{{ route('about-us.journey-of-upasthiti') }}"
                            class="dropdown-item {{ request()->routeIs('about-us.journey-of-upasthiti') ? 'active' : '' }}">Our
                            Journey of Impact</a>
                        <a href="{{ route('about-us.mission-vision') }}"
                            class="dropdown-item {{ request()->routeIs('about-us.mission-vision') ? 'active' : '' }}">Mission
                            & Vision</a>
                        {{-- <a href="{{ route('about-us.media-reports') }}"
                            class="dropdown-item {{ request()->routeIs('about-us.media-reports') ? 'active' : '' }}">Media
                            Reports</a> --}}
                        <a href="{{ route('about-us.chapters') }}"
                            class="dropdown-item {{ request()->routeIs('about-us.chapters') ? 'active' : '' }}">Chapters</a>

                        <a href="{{ route('about-us.behind-upasthiti') }}"
                            class="dropdown-item {{ request()->routeIs('about-us.behind-upasthiti') ? 'active' : '' }}">Behind
                            upasthiti</a>
                    </div>
                </div>
                {{-- Our Projects --}}

                <div class="nav-item dropdown {{ request()->is('projects*') ? 'active' : '' }}">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Our Projects</a>
                    <div class="dropdown-menu m-0 border-0">
                        @forelse ($headerProjects as $project)
                            {{--
                1. Add an @if check to ensure slugDetail exists. This is crucial for preventing
                   errors if an old project doesn't have a slug yet.
            --}}
                            @if ($project->slugDetail)
                                <a href="{{ route('slug.show', $project->slugDetail->slug) }}"
                                    class="dropdown-item {{--
                       2. The new, reliable "active" logic:
                          Compare the project's slug with the $currentSlug from the composer.
                   --}}
                   {{ $project->slugDetail->slug === $currentSlug ? 'active' : '' }}">
                                    {{ $project->title }}
                                </a>
                            @endif
                        @empty
                            <a href="#" class="dropdown-item disabled">No projects found</a>
                        @endforelse
                    </div>
                </div>
                {{-- Events --}}
                <div class="nav-item dropdown {{ request()->routeIs('events-and-gallery.*') ? 'active' : '' }}">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Events & Gallery</a>
                    <div class="dropdown-menu m-0 border-0">
                        <a href="{{ route('events-and-gallery.events') }}"
                            class="dropdown-item {{ request()->routeIs('events-and-gallery.events') ? 'active' : '' }}">Events</a>
                        <a href="{{ route('events-and-gallery.gallery') }}"
                            class="dropdown-item events-and-gallery.gallery">Gallery</a>
                    </div>
                </div>
                {{-- Behind upasthiti --}}

                {{-- Gallery --}}
                {{-- <a href="#" class="nav-item nav-link">Gallery</a> --}}
                <div
                    class="nav-item dropdown {{ request()->routeIs('get-involved.volunteer') || request()->routeIs('get-involved.donation') ? 'active' : '' }}">
                    <a href="#"
                        class="nav-link dropdown-toggle {{ request()->routeIs('get-involved.*') ? 'active' : '' }}"
                        data-bs-toggle="dropdown">Get Involved</a>
                    <div class="dropdown-menu m-0 border-0">
                        <a href="{{ route('get-involved.volunteer') }}"
                            class="dropdown-item {{ request()->routeIs('get-involved.volunteer') ? 'active' : '' }}">Volunteer</a>
                        <a href="{{ route('get-involved.donation') }}"
                            class="dropdown-item {{ request()->routeIs('get-involved.donation') ? 'active' : '' }}">Donate</a>
                        {{-- <a href="team.html" class="dropdown-item">Partner with us</a> --}}
                    </div>
                </div>
                <a href="{{ route('get-involved.contact-us') }}"
                    class="nav-item nav-link {{ request()->routeIs('get-involved.contact-us') ? 'active' : '' }}">Contact
                    Us</a>
            </div>
            {{-- <div class="d-none d-xl-flex me-3">
                <div class="d-flex flex-column pe-3 border-end border-primary">
                    <span class="text-body"><i class="fas fa-envelope"></i>&nbsp;info@upasthiti.org</span>
                    <a href="tel:+96597242099"><span class="text-primary"><i class="fas fa-phone"></i> +965-97242099</span></a>
                    <a href="tel:+917385454487"><span class="text-primary"> <i class="fas fa-phone"></i> +91-7385454487</span></a>
                </div>
            </div> --}}
            {{-- <button class="btn btn-primary btn-md-square d-flex flex-shrink-0 mb-3 mb-lg-0 rounded-circle me-3"
                data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fas fa-search"></i></button> --}}
            <a href="{{ route('get-involved.donation') }}"
                class="btn btn-primary rounded-pill d-inline-flex flex-shrink-0 py-2 px-4">
                Donate
                Now
            </a>

            <div class="d-block d-lg-none mt-4">
                <span class="text-blue">For Info:</span>
            </div>
            <div class="d-flex d-lg-none align-items-left gap-4 small text-blue">
                <a href="mailto:info@upasthiti.org" class="text-blue text-decoration-none">
                    <i class="fas fa-envelope me-1"></i> info@upasthiti.org
                </a>

                <a href="tel:+96597242099" class="text-blue text-decoration-none">
                    <i class="fas fa-phone me-1"></i> +965-97242099
                </a>
                <a href="tel:+917385454487" class="text-blue text-decoration-none">
                    <i class="fas fa-phone me-1"></i> +91-7385454487
                </a>
            </div>
        </div>
    </nav>
    @yield('hero')

</div>
<!-- Navbar & Hero End -->
