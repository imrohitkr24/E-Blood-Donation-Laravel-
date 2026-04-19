<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\BloodRequest;

class DonorController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        $donor = $user->donor;
        $bloodRequests = BloodRequest::where('blood_group', $user->blood_group)
                            ->where('status', 'pending')
                            ->latest()
                            ->get();

        return view('donor.dashboard', compact('user', 'donor', 'bloodRequests'));
    }

    public function updateAvailability(Request $request)
    {
        $donor = Auth::user()->donor;
        $donor->availability_status = $request->has('availability_status');
        $donor->save();

        return back()->with('success', 'Availability status updated successfully.');
    }
}
