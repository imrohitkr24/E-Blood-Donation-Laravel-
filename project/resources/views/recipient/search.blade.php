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

<div class="card shadow-sm border-0">
    <div class="card-body p-0">
         @if($donors->count() > 0)
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
                    <tr>
                        <td>{{ $donorUser->name }}</td>
                        <td><span class="badge bg-danger">{{ $donorUser->blood_group }}</span></td>
                        <td>{{ $donorUser->city }}</td>
                        <td>{{ $donorUser->phone }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="p-3 border-top">
                {{ $donors->links('pagination::bootstrap-5') }}
            </div>
        @else
            <div class="p-5 text-center text-muted">No donors found matching your criteria.</div>
        @endif
    </div>
</div>
@endsection
