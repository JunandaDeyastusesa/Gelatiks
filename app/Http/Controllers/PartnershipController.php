<?php

namespace App\Http\Controllers;

use App\Models\Partnership;
use Illuminate\Http\Request;

class PartnershipController extends Controller

{
    // Tampilkan semua data
    public function index()
    {
        $partnerships = Partnership::all();
        return view('admin.partnership.index',  compact('partnerships'));
    }

    public function create()
    {
        return view('admin.partnership.create');
    }

    public function edit($id)
    {
        $partnership = Partnership::findOrFail($id);
        return view('admin.partnership.edit', compact('partnership'));
    }

    // Simpan data baru
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
                'name' => 'required|string',
                'start_contract' => 'required|date',
                'end_contract' => 'required|date',
                'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120', // validasi file gambar
            ], [

                'image.mimes' => 'File harus berupa JPG, JPEG, atau PNG.',
                'image.max'   => 'Ukuran file maksimal 5MB.',
                'image.required' => 'Photo wajib diisi.',

            ]);

        // Simpan image jika ada
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('partnership_images', 'public');
            $validated['image'] = $imagePath;
        }

        // Simpan ke database
        Partnership::create($validated);

        return redirect()->route('partnership.index')->with('success', 'Partnership created successfully.');
    }


    // Tampilkan satu data berdasarkan ID
    public function show($id)
    {
        $partnership = Partnership::findOrFail($id);
        return view('admin.partnership.show', compact('partnership'));
    }

    // Update data berdasarkan ID
    public function update(Request $request, $id)
    {
        $partnership = Partnership::findOrFail($id);

        $validated = $request->validate([
            'name' => 'sometimes|required|string',
            'start_contract' => 'sometimes|required|date',
            'end_contract' => 'sometimes|required|date',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Kalau ada file baru diupload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('partnership_images', 'public');
            $validated['image'] = $imagePath;
        }

        $partnership->update($validated);

        return redirect()->route('partnership.index')->with('success', 'Partnership updated successfully.');
    }

    // Hapus data berdasarkan ID
    public function destroy($id)
    {
        $partnership = Partnership::findOrFail($id);
        $partnership->delete();

        return response()->json(['message' => 'Deleted successfully']);
    }
}
