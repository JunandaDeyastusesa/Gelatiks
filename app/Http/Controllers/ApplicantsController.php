<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserRoles;
use Illuminate\Http\Request;

class ApplicantsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $applys = User::with(['roles', 'profile'])
            ->whereHas('roles', function ($query) {
                $query->where('role_id', '01K0SJ3PP4NE62PG77K65KDEW8'); // atau ULID kalau id pakai ULID
            })
            ->get();

        return view('admin.applicants.index', compact('applys'));
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
    public function show(string $id)
    {
        // Ambil user berdasarkan ID dan relasi roles + profile
        $applicant = User::with(['roles', 'profile'])->findOrFail($id);

        return view('admin.applicants.show', compact('applicant'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
