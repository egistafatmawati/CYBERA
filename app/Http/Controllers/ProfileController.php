<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    //display profile

    public function edit(Request $request): View
    {
        $viewName = $request->user()->role === 'admin' ? 'admin.profile' : 'user.profile';
        
        return view($viewName, [
            'user' => $request->user(),
        ]);
    }

    //update profile

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        $routeName = $request->user()->role === 'admin' ? 'admin.profile' : 'user.profile';
        return Redirect::route($routeName)->with('status', 'profile-updated');
    }

    //delete user

    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
