<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'BeLearn')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,1,0" rel="stylesheet">
    <!-- Add Bootstrap JS for Collapse functionality -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    

</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('images/icon BeLearn 1.png') }}" alt="BeLearn Logo" style="width: 40px; height: 40px; margin-right: 10px;">
            BeLearn</a>
            <a class="ms-3 text-decoration-none text-dark" href="{{ route('material.index') }}" style="font-size: 18px;">
            Materials
            </a>
            <a class="ms-3 text-decoration-none text-dark" href="{{ route('material.index') }}" style="font-size: 18px;">
            Try Out
            </a>
            <a class="ms-3 text-decoration-none text-dark" href="{{ route('material.index') }}" style="font-size: 18px;">
            Blog
            </a>
            <a class="ms-3 text-decoration-none text-dark" href="{{ route('bookmark.index') }}" style="font-size: 18px;">
            Bookmark
            </a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @guest
                        <!-- Link untuk pengunjung yang belum login -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                    @endguest

                    @auth
                        <!-- Link untuk pengguna yang sudah login -->
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle me-2"></i>{{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                        </ul>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <!-- Flash Messages -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @yield('content')
    </div>

    <!-- Form logout -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
        <!-- Footer Section -->
        <footer class="bg-dark text-white text-center text-lg-start shadow-sm mt-5">
        <div class="container p-4">
            <div class="row">
                <!-- About Section -->
                <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">BeLearn</h5>
                    <p class="text-justify">
                        BeLearn adalah platform pembelajaran interaktif yang membantu siswa meningkatkan prestasi akademik dengan materi berkualitas dan pengalaman belajar yang menyenangkan.
                    </p>
                </div>
                <!-- Links Section -->
                <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Quick Links</h5>
                    <ul class="list-unstyled mb-0">
                        <li>
                            <a href="{{ route('material.index') }}" class="text-white text-decoration-none">Materials</a>
                        </li>
                        <li>
                            <a href="{{ route('material.index') }}" class="text-white text-decoration-none">Try Out</a>
                        </li>
                        <li>
                            <a href="{{ route('material.index') }}" class="text-white text-decoration-none">Blog</a>
                        </li>
                        <li>
                            <a href="#" class="text-white text-decoration-none">Contact Us</a>
                        </li>
                    </ul>
                </div>
                <!-- Contact Section -->
                <div class="col-lg-4 col-md-12 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Contact</h5>
                    <p>
                        <i class="bi bi-geo-alt-fill me-2"></i> Jl. Telekomunikasi No.1, Bandung
                    </p>
                    <p>
                        <i class="bi bi-envelope-fill me-2"></i> support@belearn.com
                    </p>
                    <p>
                        <i class="bi bi-telephone-fill me-2"></i> +62 811 9940 105
                    </p>
                </div>
            </div>
        </div>
        <div class="text-center p-3 bg-dark text-white" style="font-size: 14px;">
            © {{ date('Y') }} BeLearn. All Rights Reserved.
        </div>
    </footer>

</body>
</html>
