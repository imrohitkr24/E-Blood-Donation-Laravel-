@extends('layouts.app')
@section('content')

<!-- Hero Section -->
<div class="row align-items-center mb-5 mt-3">
    <div class="col-lg-7 text-center text-lg-start mb-4 mb-lg-0">
        <span class="badge bg-danger mb-2 px-3 py-2 border border-danger shadow-sm">India's Lifeline</span>
        <h1 class="display-4 fw-bold text-dark mb-3">Donate Blood,<br>Save Lives <span class="text-maroon">Instantly</span>.</h1>
        <p class="lead text-secondary mb-4">A centralized platform linking voluntary blood donors with those in critical need of blood across the nation. Join our noble initiative today.</p>
        
        <div class="d-flex justify-content-center justify-content-lg-start gap-3">
            <a href="{{ route('register') }}" class="btn btn-maroon btn-lg px-4 rounded-pill shadow-sm">Register as Donor</a>
            <a href="#quick-search" class="btn btn-outline-dark btn-lg px-4 rounded-pill shadow-sm">Check Availability</a>
        </div>
    </div>
    
    <div class="col-lg-5" id="quick-search">
        <!-- Quick Search Form -->
        <div class="card shadow-soft border-0 rounded-4">
            <div class="card-header bg-maroon text-white text-center py-3 rounded-top-4">
                <h5 class="mb-0 fw-bold">Quick Blood Search</h5>
            </div>
            <div class="card-body p-4 bg-white rounded-bottom-4">
                <form action="{{ route('login') }}" method="GET">
                    <div class="mb-3">
                        <label class="form-label text-muted fw-bold">Select Blood Group</label>
                        <select class="form-select form-select-lg bg-light" name="bg">
                            <option value="">-- Choose Priority --</option>
                            <option>A+</option><option>A-</option>
                            <option>B+</option><option>B-</option>
                            <option>AB+</option><option>AB-</option>
                            <option>O+</option><option>O-</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="form-label text-muted fw-bold">Select Component</label>
                        <select class="form-select form-select-lg bg-light">
                            <option>Whole Blood</option>
                            <option>Packed Red Blood Cells</option>
                            <option>Platelet Concentrate</option>
                            <option>Fresh Frozen Plasma</option>
                        </select>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-danger btn-lg rounded-3 fw-bold">Search Availability</button>
                    </div>
                    <div class="text-center mt-3">
                        <small class="text-muted">You will be asked to login to view protected results.</small>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Motivational Carousel Section -->
<div class="row mb-5 mt-5">
    <div class="col-12">
        <div class="bg-white p-4 rounded-4 shadow-soft border transition-effect">
            <div id="motivationalCarousel" class="carousel slide carousel-fade rounded-4 overflow-hidden shadow-sm" data-bs-ride="carousel" style="max-height: 450px;">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#motivationalCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#motivationalCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#motivationalCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner h-100">
                    <div class="carousel-item active h-100" data-bs-interval="4000">
                        <img src="{{ asset('images/motivation_1.png') }}" class="d-block w-100" style="object-fit: cover; object-position: center; height: 450px;" alt="Hope and giving life">
                        <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-75 rounded-4 p-4 mb-4 border border-light border-opacity-25 shadow-lg backdrop-blur">
                            <h3 class="fw-bold text-white mb-2">Give the Gift of Life</h3>
                            <p class="fs-5 mb-0 text-light">Your single donation can save up to three lives. Be the hope someone is praying for today.</p>
                        </div>
                    </div>
                    <div class="carousel-item h-100" data-bs-interval="4000">
                        <img src="{{ asset('images/motivation_2.png') }}" class="d-block w-100" style="object-fit: cover; object-position: center top; height: 450px;" alt="Be a Hero, Donate Blood">
                        <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-75 rounded-4 p-4 mb-4 border border-light border-opacity-25 shadow-lg backdrop-blur">
                            <h3 class="fw-bold text-white mb-2">Be a Hero Without a Cape</h3>
                            <p class="fs-5 mb-0 text-light">True heroes bleed for others. Join our community of life-savers and make a real impact.</p>
                        </div>
                    </div>
                    <div class="carousel-item h-100" data-bs-interval="4000">
                        <img src="{{ asset('images/motivation_3.png') }}" class="d-block w-100" style="object-fit: cover; object-position: center; height: 450px;" alt="Blood forming lifeline">
                        <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-75 rounded-4 p-4 mb-4 border border-light border-opacity-25 shadow-lg backdrop-blur">
                            <h3 class="fw-bold text-white mb-2">Every Drop Counts</h3>
                            <p class="fs-5 mb-0 text-light">Blood cannot be manufactured. It can only come from generous donors. Your contribution is vital.</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#motivationalCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon shadow" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#motivationalCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon shadow" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            
            <div class="text-center mt-4 px-3">
                <h4 class="text-dark fw-bold mb-4">Why Donate Blood? 🩸</h4>
                <div class="row text-secondary fs-6 justify-content-center g-3">
                    <div class="col-md-3">
                        <div class="py-2 px-3 bg-light rounded-pill border shadow-sm">
                            <span class="fs-5 me-1">❤️</span> Free Health Checkup
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="py-2 px-3 bg-light rounded-pill border shadow-sm">
                            <span class="fs-5 me-1">🏃</span> Burns Calories
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="py-2 px-3 bg-light rounded-pill border shadow-sm">
                            <span class="fs-5 me-1">💓</span> Reduces Heart Risk
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="py-2 px-3 bg-light rounded-pill border shadow-sm">
                            <span class="fs-5 me-1">✨</span> Sense of Purpose
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Stats Section -->
<div class="row text-center mb-5 mt-5">
    <div class="col-md-4 mb-3">
        <div class="p-4 bg-white rounded-4 shadow-soft border h-100 transition-effect">
            <h2 class="display-5 fw-bold text-maroon mb-0">15,000+</h2>
            <p class="text-muted fw-bold mb-0">Registered Donors</p>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="p-4 bg-white rounded-4 shadow-soft border h-100 transition-effect">
            <h2 class="display-5 fw-bold text-maroon mb-0">8,500+</h2>
            <p class="text-muted fw-bold mb-0">Active Blood Banks</p>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="p-4 bg-maroon rounded-4 shadow-soft text-white h-100 transition-effect">
            <h2 class="display-5 fw-bold mb-0">2.5 Lakh+</h2>
            <p class="fw-bold mb-0 opacity-75">Lives Saved</p>
        </div>
    </div>
</div>

<!-- Features Section -->
<div class="row mb-5">
    <div class="col-12 text-center mb-4">
        <h3 class="fw-bold text-dark">Our Core Features</h3>
        <div class="bg-maroon mx-auto" style="height: 4px; width: 60px; border-radius: 2px;"></div>
    </div>
    
    <div class="col-md-4 mb-4">
        <div class="card h-100 border-0 shadow-soft text-center p-3 rounded-4">
            <div class="card-body">
                <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width:70px; height:70px;">
                    <span class="fs-1">🏥</span>
                </div>
                <h5 class="card-title fw-bold text-dark">Blood Directory</h5>
                <p class="card-text text-muted">A comprehensive directory to easily locate active blood camps near you.</p>
            </div>
        </div>
    </div>
    
    <div class="col-md-4 mb-4">
        <div class="card h-100 border-0 shadow-soft text-center p-3 rounded-4 bg-maroon text-white">
            <div class="card-body">
                <div class="bg-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width:70px; height:70px;">
                    <span class="fs-1 fw-bold">🩸</span>
                </div>
                <h5 class="card-title fw-bold">Donation Camps</h5>
                <p class="card-text text-white opacity-75">Track upcoming voluntary blood donation camps occurring in your local district.</p>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card h-100 border-0 shadow-soft text-center p-3 rounded-4">
            <div class="card-body">
                <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width:70px; height:70px;">
                    <span class="fs-1">⚡</span>
                </div>
                <h5 class="card-title fw-bold text-dark">Real-time Emergency</h5>
                <p class="card-text text-muted">Post emergency requests and algorithmically notify matching donors instantly.</p>
            </div>
        </div>
    </div>
</div>

<style>
    .transition-effect { transition: transform 0.3s ease; }
    .transition-effect:hover { transform: translateY(-5px); }
</style>

@endsection
