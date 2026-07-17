<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ProfileController extends Controller
{
    /**
     * Tampilkan halaman profil user
     */
    public function edit(Request $request): View
    {
        \Log::info("Profile loaded. User ID: " . $request->user()->id . ", Foto: " . ($request->user()->foto ?? 'NULL'));
        // Kirim data user ke view
        return view('user.profile', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update profil user (hanya name dan email)
     */
    public function update(Request $request): RedirectResponse
    {
        $user = $request->user();
        
        // Validasi input hanya name dan email
        $request->validateWithBag('profileUpdate', [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
        ]);

        // Update nama dan email
        $user->name = $request->name;
        $user->email = $request->email;

        // Reset verifikasi email jika email berubah
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        // Kembali dengan pesan sukses
        return redirect()->route('user.profile')
            ->with('success', 'Profil berhasil diperbarui!');
    }

    /**
     * Update foto profil
     */
    public function updateFoto(Request $request): RedirectResponse
    {
        $user = $request->user();
        
        // Validasi hanya foto
        $request->validateWithBag('fotoUpdate', [
            'foto' => [
                'required',
                'image',
                'mimes:jpeg,png,jpg,gif',
                'max:5120'
            ],
        ], [
            'foto.required' => 'Foto wajib dipilih.',
            'foto.image'    => 'Foto harus berupa gambar.',
            'foto.mimes'    => 'Foto harus berformat JPG, JPEG, PNG, atau GIF.',
            'foto.max'      => 'Ukuran foto maksimal 5 MB.',
        ]);

        // Hapus foto lama kalau ada
        if ($user->foto && Storage::disk('public')->exists($user->foto)) {
            Storage::disk('public')->delete($user->foto);
        }
        
        // Simpan foto baru
        $fotoPath = $request->file('foto')->store('foto', 'public');
        
        $user->update(['foto' => $fotoPath]);
        $user->refresh();

        // Kembali dengan pesan sukses
        return redirect()->route('user.profile')
            ->with('success', 'Foto profil berhasil diperbarui!');
    }

    /**
     * Update password user
     */
    public function updatePassword(Request $request): RedirectResponse
    {
        // Validasi password
        $request->validateWithBag('passwordUpdate', [
            'current_password' => ['required', 'current_password'], // cek password lama
            'password' => ['required', 'confirmed', 'min:8'], // password baru min 8 karakter
        ]);

        // Simpan password baru (dienkripsi)
        $request->user()->update([
            'password' => Hash::make($request->password),
        ]);

        return back()->with('success', 'Password berhasil diperbarui!');
    }

    /**
     * Hapus foto profil
     */
    public function deleteFoto(Request $request): RedirectResponse
    {
        $user = $request->user();

        // Cek apakah ada foto
        if ($user->foto && Storage::disk('public')->exists($user->foto)) {
            // Hapus file foto
            Storage::disk('public')->delete($user->foto);
            // Set foto menjadi null di database
            $user->update(['foto' => null]);
            $user->refresh();
            
            return redirect()->route('user.profile')
                ->with('success', 'Foto profil berhasil dihapus!');
        }

        return redirect()->route('user.profile')
            ->with('error', 'Belum ada foto profil yang dapat dihapus.');
    }

    /**
     * Hapus akun user
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Validasi password untuk keamanan
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        // Hapus foto profil juga
        if ($user->foto && Storage::disk('public')->exists($user->foto)) {
            Storage::disk('public')->delete($user->foto);
        }

        // Logout dan hapus akun
        Auth::logout();
        $user->delete();

        // Bersihkan session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}