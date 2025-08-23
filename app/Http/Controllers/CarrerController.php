<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobApply;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarrerController extends Controller
{
    public function index(Request $request)
    {
        $search   = $request->input('search');
        $location = $request->input('location');

        $query = Job::query();

        // hanya ambil job yang status = Open dan close_date >= hari ini
        $query->where('status', 'Open')
            ->whereDate('close_date', '>',  Carbon::today());

        if (!empty($search)) {
            $query->where('jobs_name', 'like', '%' . $search . '%');
        }

        if (!empty($location)) {
            $query->where('city', $location);
        }

        // paginate dengan 12 item per halaman
        $viewCarrer = $query->orderBy('created_at', 'desc')->paginate(12);

        // simpan parameter search & filter di pagination
        $viewCarrer->appends($request->all());

        // ambil lokasi unik untuk filter
        $locations = Job::select('city')->distinct()->pluck('city');

        return view('customer.carrer', compact('viewCarrer', 'locations'));
    }





    public function show($id)
    {
        $showCarrer = Job::findOrFail($id);
        return view('customer.carrer.show', compact('showCarrer'));
    }

    public function applyNow($id)
    {
        if (!Auth::check()) {
            return back()->with('error', 'Silakan login/register terlebih dahulu untuk melamar pekerjaan.');
        }

        $showcarrer = Job::findOrFail(($id));
        $showProfile = auth()->user()->profile;
        return view('customer.carrer.apply', compact('showcarrer', 'showProfile'));
    }

    public function submitApplyNow(Request $request, $id)
    {
        $request->validate([
            'status' => 'nullable|string|max:255',
        ]);

        $user = Auth::user();
        $profile = $user->profile;

        if (
            !$profile ||
            empty($profile->category) ||
            empty($profile->namaLengkap) ||
            empty($profile->kelahiran) ||
            empty($profile->kelamin) ||
            empty($profile->telp) ||
            empty($profile->pendidikan) ||
            empty($profile->docCV) ||
            empty($profile->photo) ||
            empty($profile->domisili) ||
            empty($profile->pengKerja1)
        ) {
            return redirect()->route('profile.index')->with('error', 'Lengkapi profil Anda terlebih dahulu sebelum melamar pekerjaan.');
        }

        $sudahMelamar = JobApply::where('job_id', $id)
            ->where('user_id', Auth::id())
            ->exists();

        if ($sudahMelamar) {
            return back()->with('error', 'Anda sudah pernah melamar pekerjaan ini.');
        }

        $apply = new JobApply();
        $apply->job_id = $id;
        $apply->user_id = Auth::id();
        $apply->status = 'Waiting Review';
        $apply->save();

        return redirect()->route('carrer.index')->with('success', 'Anda telah melamar pekerjaan ini.');
    }
}
