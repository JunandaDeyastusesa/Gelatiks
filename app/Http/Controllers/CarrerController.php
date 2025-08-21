<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobApply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarrerController extends Controller
{
    public function index(Request $request)
    {

        // ambil query search & lokasi dari request
        $search   = $request->input('search');
        $location = $request->input('location');

        // query dasar
        $query = Job::query();

        // filter berdasarkan search (nama pekerjaan)
        if (!empty($search)) {
            $query->where('jobs_name', 'like', '%' . $search . '%');
        }

        // filter berdasarkan lokasi (city)
        if (!empty($location)) {
            $query->where('city', $location);
        }

        // ambil data job setelah difilter
        $viewCarrer = $query->get();

        // ambil daftar lokasi unik untuk dropdown filter
        $locations = Job::select('city')->distinct()->pluck('city');

        
        // tampil 6 job per halaman
        $viewCarrer = Job::orderBy('created_at', 'desc')->paginate(12);
      
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
