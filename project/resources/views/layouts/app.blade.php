<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Blood Donation System</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body { 
            background-color: #f8f9fa;
            font-family: 'Roboto', sans-serif; 
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        /* E-RaktKosh maroon palette */
        .bg-maroon { background-color: #a71d2a !important; }
        .text-maroon { color: #a71d2a !important; }
        .btn-maroon { background-color: #a71d2a; color: white; border: none; }
        .btn-maroon:hover { background-color: #881520; color: white; }
        
        /* Navbar enhancements */
        .navbar-brand { font-weight: bold; color: #ffffff !important; font-size: 1.5rem; }
        .nav-link { color: rgba(255, 255, 255, 0.9) !important; font-weight: 500; }
        .nav-link:hover { color: #ffffff !important; text-decoration: underline; }
        
        .footer { background-color: #343a40; color: white; padding: 20px 0; margin-top: auto; }
        .shadow-soft { box-shadow: 0 .125rem .25rem rgba(0,0,0,.075)!important; }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-maroon shadow-sm py-3">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="/">
                <span class="fs-3 me-2">🩸</span> 
                <span>E-Blood Donation</span>
            </a>
            <button class="navbar-toggler border-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    @guest
                        <li class="nav-item"><a class="nav-link px-3" href="{{ route('login') }}">Login</a></li>
                        <li class="nav-item"><a class="btn btn-outline-light ms-2 rounded-pill px-4" href="{{ route('register') }}">Join as Donor</a></li>
                    @else
                        <li class="nav-item"><a class="nav-link px-3" href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="nav-item ms-2">
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-outline-light rounded-pill px-4 border-0">Logout</button>
                            </form>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4 mb-5 flex-grow-1">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="footer bg-dark text-white text-center py-4">
        <div class="container">
            <p class="mb-0">&copy; {{ date('Y') }} E-Blood Donation System (e-RaktKosh Inspired). Built for saving lives.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
