<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimoniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimoni = Testimoni::all();
        return view('admin.testimoni.index', compact('testimoni'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.testimoni.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'job_title' => 'required|string|max:255',
            'testimony' => 'required|string',
            'image' => 'required|image|mimes:jpeg,jpg,png|max:5120', // Perubahan di sini
            'status' => 'required|in:Published,Draft',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('testimonis', 'public');
        }

        Testimoni::create($validated);

        return redirect()->route('testimoni.index')->with('success', 'Testimoni berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Testimoni $testimoni)
    {
        // Pastikan view ada di resources/views/admin/testimoni/show.blade.php
        return view('admin.testimoni.show', compact('testimoni'));
    }

    public function edit(Testimoni $testimoni)
    {
        // Pastikan view ada di resources/views/admin/testimoni/edit.blade.php
        return view('admin.testimoni.edit', compact('testimoni'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Testimoni $testimoni)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'job_title' => 'required|string|max:255',
            'testimony' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,jpg,png|max:5120', // Perubahan di sini: 5120 KB = 5MB
            'status' => 'required|in:Published,Draft',
        ]);

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($testimoni->image && \Storage::disk('public')->exists($testimoni->image)) {
                \Storage::disk('public')->delete($testimoni->image);
            }

            // Simpan gambar baru
            $validated['image'] = $request->file('image')->store('testimonis', 'public');
        }

        // Update data
        $testimoni->update($validated);

        return redirect()->route('testimoni.index')->with('success', 'Testimoni berhasil diperbarui!');
    }

    public function destroy(Testimoni $testimoni)
    {
        // Hapus file gambar dari storage jika ada
        if ($testimoni->image && Storage::disk('public')->exists($testimoni->image)) {
            Storage::disk('public')->delete($testimoni->image);
        } else {
            // Jika tidak ada gambar, lakukan sesuatu (misalnya, log atau beri tahu)
            // Anda bisa log ini untuk debugging, misalnya:
            // \Log::info('Image not found or path is null for testimoni ID: ' . $testimoni->id);
        }

        // Hapus data dari database
        $testimoni->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('testimoni.index')->with('success', 'Testimoni berhasil dihapus.');
    }
}
