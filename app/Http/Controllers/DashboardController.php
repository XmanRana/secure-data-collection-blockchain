<?php

namespace App\Http\Controllers;

use App\Models\DataSubmission;

class DashboardController extends Controller
{
    public function index()
    {
        $submissions = DataSubmission::latest()->paginate(10);

        $stats = [
            'total_submissions' => DataSubmission::count(),
            'validated' => DataSubmission::where('validation_status', 'validated')->count(),
            'pending_review' => DataSubmission::where('validation_status', 'review_needed')->count(),
        ];

        return view('dashboard', [
            'submissions' => $submissions,
            'stats' => $stats,
        ]);
    }
}
