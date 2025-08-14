<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobApply;
use App\Exports\JobsExport;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\JobApplicantsExport;

class JobController extends Controller
{

    public function exportApplicants(Request $request, $id)
    {
        $status = $request->get('status'); // Ambil status dari query string
        return Excel::download(new JobApplicantsExport($id, $status), 'job_applicants_' . $status . '.xlsx');
    }


    public function index()
    {
        $jobs = Job::withCount('applies')->get();
        return view('admin.jobs.index', compact('jobs'));
    }

    // Tampilkan form create
    public function create()
    {
        return view('admin.jobs.create');
    }

    // Simpan data pekerjaan baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'jobs_name' => 'required|string|max:255',
            'store_name' => 'required|string|max:255',
            'type_work' => 'nullable|string|max:255',
            'gender' => 'required|in:Pria,Wanita',
            'city' => 'required|string|max:255',
            'open_position' => 'required|integer',
            'experience' => 'nullable|string|max:255',
            'education' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'close_date' => 'required|date',
            'status' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $validated['id'] = (string) Str::ulid();

        Job::create($validated);

        return redirect()->route('jobs.index')->with('success', 'Job created successfully.');
    }

    // Tampilkan detail pekerjaan
    public function show($id)
    {
        $job = Job::findOrFail($id);
        return view('admin.jobs.show', compact('job'));
    }

    public function showApplicants($id)
    {
        $viewApplicants = JobApply::with(['user.profile'])
            ->where('job_id', $id) // $jobId bisa didapat dari route param atau lainnya
            ->get();
        $navTitle = Job::find($id);

        return view('admin.jobs.applicants', compact('viewApplicants', 'navTitle'));
    }


    // Tampilkan form edit
    public function edit($id)
    {
        $job = Job::findOrFail($id);
        return view('admin.jobs.edit', compact('job'));
    }

    // Update data pekerjaan
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'jobs_name' => 'required|string|max:255',
            'store_name' => 'required|string|max:255',
            'type_work' => 'nullable|string|max:255',
            'gender' => 'required|in:Pria,Wanita',
            'city' => 'required|string|max:255',
            'open_position' => 'required|integer',
            'experience' => 'nullable|string|max:255',
            'education' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'close_date' => 'required|date',
            'status' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $job = Job::findOrFail($id);
        $job->update($validated);

        return redirect()->route('jobs.index')->with('success', 'Job updated successfully.');
    }

    // Hapus data pekerjaan
    public function destroy($id)
    {
        $job = Job::findOrFail($id);
        $job->delete();

        return redirect()->route('jobs.index')->with('success', 'Job deleted successfully.');
    }

    public function exportExcel()
    {
        return Excel::download(new JobsExport, 'jobs.xlsx');
    }
}
