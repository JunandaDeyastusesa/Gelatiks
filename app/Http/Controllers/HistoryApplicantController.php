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


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        //
    }
}
