<?php

namespace App\Http\Controllers;

use App\Models\Coverage;
use Illuminate\Http\Request;

class CoverageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
  {
        $cover = Coverage::all();
        return view('admin.coverage.index',  compact('cover'));
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

    /**
     * Display the specified resource.
     */
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
      {
        $cover = Coverage::findOrFail($id);
        return view('admin.coverage.edit', compact('cover'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    // Validasi input dari form
    $validated = $request->validate([
        'qty_province' => 'required|string|max:255',
        'qty_clients' => 'required|integer|min:0',
        'qty_experience' => 'required|integer|min:0',
    ]);

    // Temukan data Coverage berdasarkan ID
    $coverage = Coverage::findOrFail($id);

    // Update data ke database
    $coverage->update($validated);

    // Redirect dengan pesan sukses
    return redirect()->route('coverage.index')->with('success', 'Coverage updated successfully.');
}



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coverage $coverage)
    {
        //
    }
}
