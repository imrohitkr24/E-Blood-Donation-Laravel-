@extends('layouts.app')

@section('content')
<div class="row mb-4">
    <div class="col-md-12">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Search Donors</h2>
            <a href="{{ route('recipient.dashboard') }}" class="btn btn-outline-secondary">🔙 Back to Dashboard</a>
        </div>
        <hr>
    </div>
</div>

<div class="card shadow-sm border-0 mb-4">
    <div class="card-body">
        <form action="{{ route('recipient.search') }}" method="GET" class="row g-3 align-items-end">
            <div class="col-md-4">
                <label class="form-label">Blood Group</label>
                <select name="blood_group" class="form-select">
                    <option value="">Any</option>
                    @foreach(['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'] as $bg)
                        <option value="{{ $bg }}" {{ request('blood_group') == $bg ? 'selected' : '' }}>{{ $bg }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label class="form-label">City</label>
                <input type="text" name="city" class="form-control" value="{{ request('city') }}" placeholder="Search by city...">
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-danger w-100">Search</button>
            </div>
        </form>
    </div>
</div>

<!-- Map Section -->
<div class="card shadow-sm border-0 mb-4 overflow-hidden rounded-4">
    <iframe 
        width="100%" 
        height="300" 
        frameborder="0" 
        style="border:0;" 
        allowfullscreen="" 
        loading="lazy" 
        referrerpolicy="no-referrer-when-downgrade"
        src="https://www.google.com/maps?q={{ urlencode(request('city', 'India')) }}+Blood+Bank&output=embed">
    </iframe>
</div>

<div class="card shadow-sm border-0 rounded-4">
    <div class="card-body p-0">
         @if($donors->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Name</th>
                        <th>Blood Group</th>
                        <th>City</th>
                        <th>Contact</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($donors as $donorUser)
                    <tr class="align-middle">
                        <td><strong>{{ $donorUser->name }}</strong></td>
                        <td><span class="badge bg-danger p-2 fs-6">{{ $donorUser->blood_group }}</span></td>
                        <td>📍 {{ $donorUser->city }}</td>
                        <td>
                            @if($donorUser->phone)
                                <div class="d-flex gap-2">
                                    <a href="tel:{{ $donorUser->phone }}" class="btn btn-sm btn-outline-dark rounded-pill shadow-soft" title="Call Donor">
                                        📞 {{ $donorUser->phone }}
                                    </a>
                                    <a href="https://wa.me/91{{ preg_replace('/[^0-9]/', '', $donorUser->phone) }}" target="_blank" class="btn btn-sm btn-success rounded-pill shadow-soft text-white" style="background-color: #25D366; border-color: #25D366;" title="Message on WhatsApp">
                                        💬 WhatsApp
                                    </a>
                                </div>
                            @else
                                <span class="badge bg-secondary">No Phone Provided</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
            <div class="p-3 border-top">
                {{ $donors->links('pagination::bootstrap-5') }}
            </div>
        @else
            <div class="p-5 text-center text-muted">No donors found matching your criteria.</div>
        @endif
    </div>
</div>
@endsection
