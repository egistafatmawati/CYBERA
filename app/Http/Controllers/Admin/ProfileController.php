<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function edit(Request $request)
    {
        return view('admin.profile', [
            'user' => $request->user(),
        ]);
    }

    public function update(Request $request)
    {
        $user = $request->user();

        $request->validate([
            'name' => ['required','string','max:255'],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();

        return redirect()
            ->route('admin.profile')
            ->with('success','Profil berhasil diperbarui.');
    }

    public function updatePassword(Request $request)
    {
        $user = $request->user();

        $request->validate([
            'current_password' => [
                'required',
                'current_password',
            ],
            'password' => [
                'required',
                'confirmed',
                'min:8',
            ],
        ]);

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()
            ->route('admin.profile')
            ->with('success','Password berhasil diperbarui.');
    }

}