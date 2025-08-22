<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gallery = Gallery::all();
        return view('admin.gallery.index', compact('gallery'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'  => 'required|string|max:255',
            'image'  => 'required|file|mimes:png,jpg,jpeg|max:5120', // 5MB
            'status' => 'required|string|max:255',
        ], [
            'image.mimes' => 'File harus berupa JPG, JPEG, atau PNG.',
            'image.max'   => 'Ukuran file maksimal 5MB.',
            'image.required' => 'Photo wajib diisi.',
        ]);

        if ($request->hasFile('image')) {
            $photoPath = $request->file('image')->store('gallery_photos', 'public');
            $validated['image'] = $photoPath;
        }

        Gallery::create($validated);

        return redirect()->route('gallery.index')->with('success', 'Gallery item created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('admin.gallery.show', compact('gallery'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('admin.gallery.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title'  => 'required|string|max:255',
            'image'  => 'nullable|file|mimes:png,jpg,jpeg|max:5120',
            'status' => 'required|string|max:255',
        ], [
            'image.mimes' => 'File harus berupa JPG, JPEG, atau PNG.',
            'image.max'   => 'Ukuran file maksimal 5MB.',
        ]);

        $gallery = Gallery::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($gallery->image && Storage::disk('public')->exists($gallery->image)) {
                Storage::disk('public')->delete($gallery->image);
            }

            $imagePath = $request->file('image')->store('gallery_photos', 'public');
            $validated['image'] = $imagePath;
        } else {
            unset($validated['image']);
        }

        $gallery->update($validated);

        return redirect()->route('gallery.index')->with('success', 'Gallery item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        if ($gallery->image && Storage::disk('public')->exists($gallery->image)) {
            Storage::disk('public')->delete($gallery->image);
        }

        $gallery->delete();

        return redirect()->route('gallery.index')->with('success', 'Gallery item deleted successfully.');
    }
}
