<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\UserRoles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); // sesuaikan
    }

    public function login(Request $request)
    {
        // ✅ Validasi login dengan format email
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ], [
            'email.required'    => 'Email dan Password wajib diisi.',
            'password.required' => 'Email dan Password wajib diisi.',
            'email.email'       => 'Format email tidak valid.',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $role = $user->userRole?->name;

            return match ($role) {
                'Admin'      => redirect('/jobs'),
                'HRD'        => redirect('/applicants'),
                'Applicants' => redirect('/'),
                default      => abort(403),
            };
        }

        return back()->withErrors(['email' => 'Email atau password salah'])
                     ->withInput();
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // ✅ Validasi register dengan format email
        $request->validate([
            'username' => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ], [
            'username.required' => 'Username wajib diisi.',
            'username.max'      => 'Username maksimal 255 karakter.',
            'email.required'    => 'Email wajib diisi.',
            'email.email'       => 'Format email tidak valid.',
            'email.unique'      => 'Email sudah terdaftar.',
            'password.required' => 'Password wajib diisi.',
            'password.min'      => 'Password minimal 6 karakter.',
            'password.confirmed'=> 'Konfirmasi password tidak sesuai.',
        ]);

        $user = User::create([
            'id'       => Str::ulid(),
            'username' => $request->username,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $role = Role::where('name', 'Applicants')->first();

        UserRoles::create([
            'user_id' => $user->id,
            'role_id' => $role->id,
        ]);

        Auth::login($user);

        return redirect('/profile?edit=' . $user->id);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}
