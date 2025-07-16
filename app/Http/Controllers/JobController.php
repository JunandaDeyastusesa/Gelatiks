<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua job terbaru
        $jobs = Job::latest()->get();
        return response()->json($jobs, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     // Jika aplikasi menggunakan Blade, kembalikan view di sini.
    //     // return view('jobs.create');
    //     return response()->json(['message' => 'Form create tidak diimplementasikan'], 501);
    // }
    public function create(Request $request)
    {
        return $this->store($request);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'jobs_name'   => 'required|string|max:255',
            'store_name'  => 'required|string|max:255',
            'type_work'   => 'nullable|string|max:255',
            'gender'      => 'required|in:Pria,Wanita',
            'city'        => 'required|string|max:255',
            'qty'         => 'required|integer|min:1',
            'experience'  => 'nullable|string|max:255',
            'education'   => 'nullable|string|max:255',
            'close_date'  => 'required|date|after:today',
            'status'      => 'nullable|string|max:50',
            'description' => 'nullable|string',
        ]);

        $job = Job::create($validated);

        return response()->json($job, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        return response()->json($job, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        // Jika aplikasi menggunakan Blade, kembalikan view di sini.
        // return view('jobs.edit', compact('job'));
        return response()->json(['message' => 'Form edit tidak diimplementasikan'], 501);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Job $job)
    {
        $validated = $request->validate([
            'jobs_name'   => 'sometimes|required|string|max:255',
            'store_name'  => 'sometimes|required|string|max:255',
            'type_work'   => 'sometimes|nullable|string|max:255',
            'gender'      => 'sometimes|required|in:Pria,Wanita',
            'city'        => 'sometimes|required|string|max:255',
            'qty'         => 'sometimes|required|integer|min:1',
            'experience'  => 'sometimes|nullable|string|max:255',
            'education'   => 'sometimes|nullable|string|max:255',
            'close_date'  => 'sometimes|required|date|after:today',
            'status'      => 'sometimes|nullable|string|max:50',
            'description' => 'sometimes|nullable|string',
        ]);

        $job->update($validated);

        return response()->json($job, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        $job->delete();

        return response()->json(['message' => 'Job deleted'], 204);
    }
}
