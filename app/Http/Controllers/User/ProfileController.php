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
        $request->validate([
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
     * Update avatar profil
     */
    public function updateAvatar(Request $request): RedirectResponse
    {
        $user = $request->user();
        
        // Validasi hanya avatar
        $request->validate([
            'avatar' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'], // max 2MB
        ]);

        // Hapus avatar lama kalau ada
        if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
            Storage::disk('public')->delete($user->avatar);
        }
        
        // Simpan avatar baru
        $avatarPath = $request->file('avatar')->store('avatars', 'public');
        $user->avatar = $avatarPath;
        $user->save();

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
        $request->validate([
            'current_password' => ['required', 'current_password'], // cek password lama
            'password' => ['required', 'confirmed', 'min:8'], // password baru min 8 karakter
        ]);

        // Simpan password baru (dienkripsi)
        $request->user()->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('user.profile')
            ->with('success', 'Password berhasil diperbarui!');
    }

    /**
     * Hapus foto profil
     */
    public function deleteAvatar(Request $request): RedirectResponse
    {
        $user = $request->user();
        
        // Cek apakah ada foto
        if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
            // Hapus file foto
            Storage::disk('public')->delete($user->avatar);
            // Hapus data foto di database
            $user->avatar = null;
            $user->save();
            
            return redirect()->route('user.profile')
                ->with('success', 'Foto profil berhasil dihapus!');
        }

        return redirect()->route('user.profile')
            ->with('error', 'Tidak ada foto profil untuk dihapus!');
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
        if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
            Storage::disk('public')->delete($user->avatar);
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