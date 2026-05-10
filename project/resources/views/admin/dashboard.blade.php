@extends('layouts.app')

@section('content')
<div class="row mb-4">
    <div class="col-md-12">
        <h2>Admin Dashboard</h2>
        <hr>
    </div>
</div>

<div class="row mb-4">
    <div class="col-md-4">
        <div class="card text-white bg-danger mb-3 shadow-sm border-0">
            <div class="card-body">
                <h5 class="card-title">Total Donors</h5>
                <h2 class="display-4">{{ $totalDonors }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-white bg-dark mb-3 shadow-sm border-0">
            <div class="card-body">
                <h5 class="card-title">Total Requests</h5>
                <h2 class="display-4">{{ $totalRequests }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-dark bg-warning mb-3 shadow-sm border-0">
            <div class="card-body">
                <h5 class="card-title">Pending Requests</h5>
                <h2 class="display-4">{{ $pendingRequests }}</h2>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white"><strong>Recent Users</strong></div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table mb-0 table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Blood Group</th>
                            <th>City</th>
                            <th>Joined</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td><span class="badge bg-secondary">{{ ucfirst($user->role) }}</span></td>
                            <td>{{ $user->blood_group ?? '-' }}</td>
                            <td>{{ $user->city }}</td>
                            <td>{{ $user->created_at->format('M d, Y') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
