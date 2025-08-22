<?php

namespace App\Http\Controllers;

use App\Models\JobApply;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryApplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobApplicant = JobApply::where('user_id', Auth::id())->get(); // gunakan get()
        $user = User::findOrFail(Auth::id());

        return view('customer.jobApply', compact('jobApplicant', 'user'));
    }

}
