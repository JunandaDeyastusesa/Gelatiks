<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; // jangan lupa import model User

class RegisterController extends Controller
{
    public function index()
    {
        return view('admin.register.index');
    }

    public function create()
    {
        // ini return partial modal view (tanpa @extends)
        return view('admin.register.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'phone'    => 'required|string|max:15',
            'role'     => 'required|in:admin,hr',
            'password' => 'required|string|min:6',
        ]);

        User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'phone'    => $validated['phone'],
            'role'     => $validated['role'],
            'password' => bcrypt($validated['password']),
        ]);

        return redirect()->back()->with('success', 'User berhasil didaftarkan.');
    }
}
