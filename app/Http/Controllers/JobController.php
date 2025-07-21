<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class JobController extends Controller
{
    // Tampilkan semua data pekerjaan
    public function index()
    {
        $jobs = Job::all();
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

        $validated['id'] = Str::ulid(); // Buat ULID secara manual
        $validated['type_work'] = $validated['type_work'] ?? 'WFO - Full Time';
        $validated['status'] = $validated['status'] ?? 'Open';

        Job::create($validated);

        return redirect()->route('jobs.index')->with('success', 'Job created successfully.');
    }

    // Tampilkan detail pekerjaan
    public function show($id)
    {
        $job = Job::findOrFail($id);
        return view('jobs.show', compact('job'));
    }

    // Tampilkan form edit
    public function edit($id)
    {
        $job = Job::findOrFail($id);
        return view('jobs.edit', compact('job'));
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
}
