<?php

namespace App\Http\Controllers;

use App\Models\Coverage;
use App\Models\Gallery;
use App\Models\Job;
use App\Models\NewsEvent;
use App\Models\Partnership;
use App\Models\Testimoni;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coverage = Coverage::all();
        $newsEvent = NewsEvent::where('status', 'Published')->orderBy('created_at', 'desc')->take(3)->get();
        $testimoni = Testimoni::where('status', 'Published')->orderBy('created_at', 'desc')->take(3)->get();
        $lgPartner = Partnership::all();
        $gallery = Gallery::where('status', 'Published')->orderBy('created_at', 'desc')->take(7)->get();
        $job = Job::orderBy('created_at', 'desc')->take(3)->get();

        return view('welcome', compact('coverage', 'newsEvent', 'testimoni', 'lgPartner', 'gallery', 'job'));
    }

    public function showGallery()
    {
        $gallery = Gallery::where('status', 'Published')->orderBy('created_at', 'desc')->get();
        return view('customer.gallery', compact('gallery'));
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
        //
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
