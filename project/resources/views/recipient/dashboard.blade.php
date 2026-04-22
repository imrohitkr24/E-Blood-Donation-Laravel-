@extends('layouts.app')

@section('content')
<div class="row mb-4">
    <div class="col-md-12">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Recipient Dashboard</h2>
            <a href="{{ route('recipient.search') }}" class="btn btn-outline-danger shadow-sm">🔍 Search Donors</a>
        </div>
        <p class="text-muted">Welcome, {{ auth()->user()->name }}. Manage your blood requests below.</p>
        <hr>
    </div>
</div>

<div class="row">
    <!-- Form to post request -->
    <div class="col-md-4">
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-white"><strong>Post Emergency Request</strong></div>
            <div class="card-body">
                <form action="{{ route('recipient.request') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Patient Name</label>
                        <input type="text" name="patient_name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Required Blood Group</label>
                        <select name="blood_group" class="form-select" required>
                            <option value="">Select...</option>
                            @foreach(['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'] as $bg)
                                <option value="{{ $bg }}">{{ $bg }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">City</label>
                        <input type="text" name="city" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Hospital Name</label>
                        <input type="text" name="hospital" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Urgency Level</label>
                        <select name="urgency" class="form-select" required>
                            <option value="normal">Normal</option>
                            <option value="urgent">Urgent</option>
                            <option value="emergency">Emergency</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-danger w-100">Submit Request</button>
                </form>
            </div>
        </div>
    </div>

    <!-- List of their requests -->
    <div class="col-md-8">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white"><strong>My Blood Requests</strong></div>
            <div class="card-body p-0">
                @if($requests->count() > 0)
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Patient</th>
                                <th>Blood Group</th>
                                <th>Hospital</th>
                                <th>Urgency</th>
                                <th>Status & Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($requests as $req)
                            <tr>
                                <td>{{ $req->patient_name }}</td>
                                <td><strong>{{ $req->blood_group }}</strong></td>
                                <td>{{ $req->hospital }}</td>
                                <td><span class="badge {{ $req->urgency == 'emergency' ? 'bg-danger' : 'bg-primary' }}">{{ ucfirst($req->urgency) }}</span></td>
                                <td>
                                    @if($req->status == 'pending')
                                        <div class="d-flex flex-column align-items-start gap-1">
                                            <span class="badge bg-warning text-dark shadow-sm px-2 py-1">Pending</span>
                                            <form action="{{ route('recipient.request.complete', $req->id) }}" method="POST" class="m-0 p-0" onsubmit="return confirm('Are you sure you have received the blood and want to mark this request as completed? It will no longer be visible to donors.');">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-success rounded-pill shadow-soft mt-1 w-100" style="font-size: 0.8rem; padding: 0.2rem 0.5rem;" title="Mark as Completed">
                                                    ✓ Mark Complete
                                                </button>
                                            </form>
                                        </div>
                                    @else
                                        <span class="badge bg-success shadow-sm px-3 py-2 fs-6">Completed ✨</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="p-4 text-center text-muted">You haven't posted any requests yet.</div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
