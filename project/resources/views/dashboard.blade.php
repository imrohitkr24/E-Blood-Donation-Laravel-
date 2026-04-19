@extends('layouts.app')
@section('content')
<div class="row mb-4">
    <div class="col-md-12">
        <h2>Dashboard</h2>
        <p class="text-muted">Welcome, <strong>{{ auth()->user()->name }}</strong>. You are logged in as a <span class="badge bg-secondary">{{ ucfirst(auth()->user()->role) }}</span>.</p>
        <hr>
    </div>
</div>

<div class="row">
    <!-- Role specific elements will be loaded here -->
    <div class="col-md-12">
        <div class="card shadow-sm border-0">
            <div class="card-body text-center py-5">
                <h5 class="text-muted">This is your dashboard. Core modules will map here.</h5>
                <a href="/" class="btn btn-primary mt-3">Go to Home</a>
            </div>
        </div>
    </div>
</div>
@endsection
