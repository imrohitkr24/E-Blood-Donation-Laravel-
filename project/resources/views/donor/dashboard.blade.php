@extends('layouts.app')

@section('content')
<div class="row mb-4">
    <div class="col-md-12">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Donor Dashboard</h2>
            <span class="badge {{ $donor->availability_status ? 'bg-success' : 'bg-danger' }}">
                {{ $donor->availability_status ? 'Available' : 'Not Available' }}
            </span>
        </div>
        <p class="text-muted">Welcome, {{ $user->name }}. Your Blood Group is <strong>{{ $user->blood_group }}</strong>.</p>
        <hr>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-white"><strong>Update Availability</strong></div>
            <div class="card-body">
                <form action="{{ route('donor.availability') }}" method="POST">
                    @csrf
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" id="availabilitySwitch" name="availability_status" {{ $donor->availability_status ? 'checked' : '' }}>
                        <label class="form-check-label" for="availabilitySwitch">I am available to donate blood</label>
                    </div>
                    <button type="submit" class="btn btn-danger w-100">Save Status</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white"><strong>Incoming Emergency Requests ({{ $user->blood_group }})</strong></div>
            <div class="card-body p-0">
                @if($bloodRequests->count() > 0)
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Patient Name</th>
                                <th>City</th>
                                <th>Hospital</th>
                                <th>Urgency</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bloodRequests as $req)
                            <tr>
                                <td>{{ $req->patient_name }}</td>
                                <td>{{ $req->city }}</td>
                                <td>{{ $req->hospital }}</td>
                                <td>
                                    <span class="badge {{ $req->urgency == 'emergency' ? 'bg-danger' : ($req->urgency == 'urgent' ? 'bg-warning' : 'bg-primary') }}">
                                        {{ ucfirst($req->urgency) }}
                                    </span>
                                </td>
                                <td>{{ $req->created_at->diffForHumans() }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="p-4 text-center text-muted">No pending requests for your blood group.</div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
