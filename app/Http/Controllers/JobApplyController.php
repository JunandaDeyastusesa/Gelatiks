<?php

namespace App\Http\Controllers;

use App\Models\JobApply;
use Illuminate\Http\Request;

class JobApplyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    // public function show(JobApply $jobApply)
    // {
    //     return view('admin.jobs.profileApllicant', compact('jobApply'));
    // }

    public function show(JobApply $jobApply)
    {
        $user = $jobApply->user;
        $profile = $user->profile ?? null;

        $pengKerja1 = $profile && $profile->pengKerja1 ? explode('|', $profile->pengKerja1) : [];
        $pengKerja2 = $profile && $profile->pengKerja2 ? explode('|', $profile->pengKerja2) : [];
        $pengKerja3 = $profile && $profile->pengKerja3 ? explode('|', $profile->pengKerja3) : [];

        return view('admin.jobs.profileApllicant', compact(
            'jobApply',
            'user',
            'profile',
            'pengKerja1',
            'pengKerja2',
            'pengKerja3'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobApply $jobApply)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JobApply $jobApply)
    {
        $request->validate([
            'status' => 'required|string',
        ]);

        $jobApply->update($request->only('status'));

        return redirect()->route('jobApplies.show', $jobApply->id);
    }

    public function RejectStatus(Request $request, JobApply $jobApply)
    {
        $request->validate([
            'status' => 'required|string',
            'keterangan' => 'required|string|max:255',
        ]);

        $jobApply->update($request->only('status', 'keterangan'));

        return redirect()->route('jobApplies.show', $jobApply->id);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobApply $jobApply)
    {
        //
    }
}
