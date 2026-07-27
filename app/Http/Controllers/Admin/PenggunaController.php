<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PenggunaController extends Controller
{
    public function index()
    {
        $penggunas = User::where('role', 'pengguna')->with('quizResults')->latest()->get();
        $totalTerdaftar = $penggunas->count();
        $totalAktif = $penggunas->whereNotNull('email_verified_at')->count();
        if ($totalAktif === 0) {
            // Jika aplikasi tidak menggunakan email_verified_at, kita anggap semua aktif
            $totalAktif = $totalTerdaftar;
        }

        return view('admin.pengguna', compact('penggunas', 'totalTerdaftar', 'totalAktif'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->route('admin.pengguna')->with('success', 'Data pengguna berhasil diperbarui.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.pengguna')->with('success', 'Pengguna berhasil dihapus.');
    }
}
