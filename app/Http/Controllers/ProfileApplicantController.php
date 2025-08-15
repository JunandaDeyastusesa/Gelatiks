<?php

namespace App\Http\Controllers;

use App\Models\ProfileApplicant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileApplicantController extends Controller
{

    public function index()
    {
        $profile = ProfileApplicant::where('user_id', Auth::id())->first();
        $user = User::findOrFail(Auth::id());

        return view('customer.profile', compact('profile', 'user'));
    }

    public function create()
    {
        return view('customer.biodata.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'namaLengkap' => 'required|string|max:255',
            'kelahiran'   => 'required|date',
            'kelamin'     => 'required|string',
            'pendidikan'  => 'required|string',
            'category'    => 'required|string',
            'telp'        => 'required|numeric',
            'domisili'    => 'required|string',

            'nama_perusahaan1' => 'required|string',
            'tahun1'           => 'required|string',
            'posisi1'          => 'required|string',
            'produk1'          => 'required|string',
            'alasan1'          => 'required|string',

            'nama_perusahaan2' => 'required|string',
            'tahun2'           => 'required|string',
            'posisi2'          => 'required|string',
            'produk2'          => 'required|string',
            'alasan2'          => 'required|string',

            'nama_perusahaan3' => 'required|string',
            'tahun3'           => 'required|string',
            'posisi3'          => 'required|string',
            'produk3'          => 'required|string',
            'alasan3'          => 'required|string',

            'docCV'       => 'nullable|file|mimes:pdf|max:2048',
            'photo'       => 'nullable|file|mimes:png,jpg,jpeg|max:2048',
        ]);

        $updateData = $request->only([
            'namaLengkap',
            'kelahiran',
            'kelamin',
            'pendidikan',
            'category',
            'telp',
            'domisili',
            'docCV',
            'photo',
        ]);

        if ($request->hasFile('docCV')) {
            $path = $request->file('docCV')->store('cv', 'public');
            $updateData['docCV'] = $path;
        }

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
            $updateData['photo'] = $photoPath;
        }

        $updateData['pengKerja1'] = implode(' | ', [
            $request->nama_perusahaan1,
            $request->tahun1,
            $request->posisi1,
            $request->produk1,
            $request->alasan1,
        ]);

        $updateData['pengKerja2'] = implode(' | ', [
            $request->nama_perusahaan2,
            $request->tahun2,
            $request->posisi2,
            $request->produk2,
            $request->alasan2,
        ]);

        $updateData['pengKerja3'] = implode(' | ', [
            $request->nama_perusahaan3,
            $request->tahun3,
            $request->posisi3,
            $request->produk3,
            $request->alasan3,
        ]);

        $updateData['user_id'] = Auth::id();

        ProfileApplicant::create($updateData);

        return redirect()->route('profile.index')->with('success', 'Biodata berhasil diperbarui.');
    }

    public function edit($id)
    {
        $editBio = ProfileApplicant::findOrFail($id);
        return view('customer.biodata.edit', compact('editBio'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'namaLengkap' => '|required|string|max:255',
            'kelahiran'   => 'sometimes|required|date',
            'kelamin'     => 'sometimes|required|string',
            'pendidikan'  => 'sometimes|required|string',
            'category'    => 'sometimes|required|string',
            'telp'        => 'sometimes|required|string',
            'domisili'    => 'sometimes|required|string',

            'nama_perusahaan1' => 'sometimes|required|string',
            'tahun1'           => 'sometimes|required|string',
            'posisi1'          => 'sometimes|required|string',
            'produk1'          => 'sometimes|required|string',
            'alasan1'          => 'sometimes|required|string',

            'nama_perusahaan2' => 'sometimes|required|string',
            'tahun2'           => 'sometimes|required|string',
            'posisi2'          => 'sometimes|required|string',
            'produk2'          => 'sometimes|required|string',
            'alasan2'          => 'sometimes|required|string',

            'nama_perusahaan3' => 'sometimes|required|string',
            'tahun3'           => 'sometimes|required|string',
            'posisi3'          => 'sometimes|required|string',
            'produk3'          => 'sometimes|required|string',
            'alasan3'          => 'sometimes|required|string',

            'docCV'      => 'nullable|file|mimes:pdf|max:2048',
        ]);

        $data = ProfileApplicant::findOrFail($id);

        $updateData = $request->only([
            'namaLengkap',
            'kelahiran',
            'kelamin',
            'pendidikan',
            'category',
            'telp',
            'domisili',
        ]);

        $updateData['pengKerja1'] = implode(' | ', [
            $request->nama_perusahaan1,
            $request->tahun1,
            $request->posisi1,
            $request->produk1,
            $request->alasan1,
        ]);

        $updateData['pengKerja2'] = implode(' | ', [
            $request->nama_perusahaan2,
            $request->tahun2,
            $request->posisi2,
            $request->produk2,
            $request->alasan2,
        ]);

        $updateData['pengKerja3'] = implode(' | ', [
            $request->nama_perusahaan3,
            $request->tahun3,
            $request->posisi3,
            $request->produk3,
            $request->alasan3,
        ]);

        // Handle file CV
        if ($request->hasFile('docCV')) {
            if ($data->docCV && Storage::disk('public')->exists($data->docCV)) {
                Storage::disk('public')->delete($data->docCV);
            }

            $file = $request->file('docCV');
            $path = $file->store('cv', 'public');
            $updateData['docCV'] = $path;
        }

        $data->update($updateData);

        return redirect()->route('profile.index')->with('success', 'Biodata berhasil diperbarui.');
    }


    public function editAccount($id)
    {
        $editAccnt = User::findOrFail($id);
        return view('customer.Profile.edit', compact('editAccnt'));
    }


    public function updateAccount(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'username' => 'sometimes|required|string|max:255|unique:users,username,' . $user->id,
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $user->username = $request->username ?? $user->username;

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect()->route('profile.index')->with('success', 'Akun berhasil diperbarui.');
    }

    public function editPhoto($id)
    {
        $editPhoto = ProfileApplicant::findOrFail($id);
        return view('customer.profile.editPhoto', compact('editPhoto'));
    }

    public function updatePhoto(Request $request, $id)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $user = Auth::user();
        $profile = ProfileApplicant::where('user_id', $user->id)->firstOrFail();

        if ($profile->photo && Storage::disk('public')->exists($profile->photo)) {
            Storage::disk('public')->delete($profile->photo);
        }

        $photoPath = $request->file('photo')->store('photos', 'public');
        $profile->photo = $photoPath;
        $profile->save();

        return back()->with('success', 'Foto berhasil diperbarui.');
    }
}
