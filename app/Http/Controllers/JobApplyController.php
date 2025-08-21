<?php

namespace App\Http\Controllers;

use App\Models\JobApply;
use Illuminate\Http\Request;

class JobApplyController extends Controller
{

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

}
