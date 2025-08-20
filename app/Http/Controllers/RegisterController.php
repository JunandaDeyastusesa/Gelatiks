<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\UserRoles;
use Illuminate\Http\Request;
use App\Models\User; // jangan lupa import model User
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function index()
    {
        $EmployeeAccount = User::with('roles')
            ->whereHas('roles', function ($query) {
                $query->where('name', 'Admin')->orWhere('name', 'HRD');
            })->get();
        return view('admin.register.index', compact('EmployeeAccount'));
    }

    public function create()
    {
        $EmployeeAccount = User::with('roles')
            ->whereHas('roles', function ($query) {
                $query->where('name', 'Admin')->orWhere('name', 'HRD');
            })->get();
        return view('admin.register.create', compact('EmployeeAccount'));
    }

    public function store(Request $request)
    {
        // Validasi input dengan custom messages
        $validated = $request->validate([
            'username' => 'required|string|max:255|unique:users,username',
            'email'    => 'required|string|email|max:255|unique:users,email',
            'role'     => 'required|in:Admin,HRD',
            'password' => 'required|string|min:6|confirmed', // confirmed otomatis cek password_confirmation
        ], [
            'username.required' => 'Nama wajib diisi.',
            'username.unique'   => 'Nama sudah terdaftar.',
            'email.required'    => 'Email wajib diisi.',
            'email.email'       => 'Format email tidak valid.',
            'email.unique'      => 'Email sudah terdaftar.',
            'role.required'     => 'Role wajib dipilih.',
            'role.in'           => 'Role yang dipilih tidak valid.',
            'password.required' => 'Password wajib diisi.',
            'password.min'      => 'Password minimal 6 karakter.',
            'password.confirmed' => 'Password dan konfirmasi password tidak cocok.',
        ]);

        // Simpan user
        $user = User::create([
            'id'       => Str::ulid(),
            'username' => $validated['username'],
            'email'    => $validated['email'],
            'role'     => $validated['role'],
            'password' => Hash::make($validated['password']),
        ]);

        // Tambahkan role jika ada tabel roles
        $role = Role::where('name', $validated['role'])->first();
        if ($role) {
            UserRoles::create([
                'user_id' => $user->id,
                'role_id' => $role->id,
            ]);
        }

        return redirect()->route('admin.register.index')->with('success', 'User berhasil didaftarkan.');
    }
}
