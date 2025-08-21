<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobApply;
use App\Models\Partnership;
use App\Models\ProfileApplicant;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totJobs = Job::count();
        $totApplicants = ProfileApplicant::count();
        $totPartnership = Partnership::count();
        $totAccepted = JobApply::where('status', 'Accepted')->count();
        $applicants = JobApply::orderBy('created_at', 'desc')->take(6)->get();


        // Pie Chart
        $profilePieChart = JobApply::selectRaw('status, COUNT(*) as count')
            ->groupBy('status')
            ->pluck('count', 'status');

        $labels = $profilePieChart->keys();
        $values = $profilePieChart->values();

        // Kirim semua ke view
        return view('admin.dashboard', compact(
            'totApplicants',
            'totJobs',
            'totPartnership',
            'totAccepted',
            'labels',
            'values',
            'applicants'
        ));
    }
}
