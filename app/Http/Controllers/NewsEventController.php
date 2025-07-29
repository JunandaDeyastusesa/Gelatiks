<?php

namespace App\Http\Controllers;

use App\Models\NewsEvent;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class NewsEventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $newsEvent = NewsEvent::all();
        return view('admin.newsEvent.index',  compact('newsEvent'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.newsEvent.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required|string|max:255',
            'event_date' => 'required|date',
            'image' => 'required|file|mimes:png,jpg,jpeg|max:10240', // 10MB = 10240 KB
            'content' => 'required|string',
            'status' => 'required|string|max:255'
        ]);

        // Simpan image jika perlu
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('news_images', 'public');
            $validate['image'] = $imagePath;
        }

        NewsEvent::create($validate);

        return redirect()->route('newsEvent.index')->with('success', 'News/Event created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $newsEvent = NewsEvent::findOrFail($id);
        return view('admin.newsEvent.show', compact('newsEvent'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $news = newsEvent::findOrFail($id);
        return view('admin.newsEvent.edit', compact('news'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'title' => 'required|string|max:255',
            'event_date' => 'required|date',
            'image' => 'nullable|file|mimes:png,jpg,jpeg|max:10240', // Boleh kosong saat update
            'content' => 'required|string',
            'status' => 'required|string|max:255'
        ]);

        $news = NewsEvent::findOrFail($id);

        // Jika user upload gambar baru
        if ($request->hasFile('image')) {
            // Hapus gambar lama (jika ada)
            if ($news->image && \Storage::disk('public')->exists($news->image)) {
                \Storage::disk('public')->delete($news->image);
            }

            // Simpan gambar baru
            $imagePath = $request->file('image')->store('news_images', 'public');
            $validate['image'] = $imagePath;
        } else {
            // Jika tidak upload gambar baru, tetap gunakan gambar lama
            unset($validate['image']);
        }

        $news->update($validate);

        return redirect()->route('newsEvent.index')->with('success', 'News/Event updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NewsEvent $newsEvent)
    {
        // Hapus file gambar dari storage jika ada
        if ($newsEvent->image && Storage::disk('public')->exists($newsEvent->image)) {
            Storage::disk('public')->delete($newsEvent->image);
        }

        // Hapus data dari database
        $newsEvent->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('newsEvent.index')->with('success', 'News/Event berhasil dihapus.');
    }
}
