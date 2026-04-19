<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\BloodRequest;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalDonors = User::where('role', 'donor')->count();
        $totalRequests = BloodRequest::count();
        $pendingRequests = BloodRequest::where('status', 'pending')->count();
        $users = User::latest()->limit(10)->get();

        return view('admin.dashboard', compact('totalDonors', 'totalRequests', 'pendingRequests', 'users'));
    }
}
