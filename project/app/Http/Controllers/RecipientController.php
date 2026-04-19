<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BloodRequest;
use App\Models\User;

class RecipientController extends Controller
{
    public function dashboard()
    {
        $requests = auth()->user()->bloodRequests()->latest()->get();
        return view('recipient.dashboard', compact('requests'));
    }

    public function createRequest(Request $request)
    {
        $request->validate([
            'patient_name' => 'required',
            'blood_group' => 'required',
            'city' => 'required',
            'hospital' => 'required',
            'urgency' => 'required|in:normal,urgent,emergency',
        ]);

        auth()->user()->bloodRequests()->create($request->all());

        return back()->with('success', 'Blood request posted successfully.');
    }

    public function searchDonors(Request $request)
    {
        $query = User::where('role', 'donor')
                     ->whereHas('donor', function($q) {
                         $q->where('availability_status', true);
                     });

        if ($request->filled('blood_group')) {
            $query->where('blood_group', $request->blood_group);
        }

        if ($request->filled('city')) {
            $query->where('city', 'like', '%' . $request->city . '%');
        }

        $donors = $query->paginate(10);

        return view('recipient.search', compact('donors'));
    }
}
