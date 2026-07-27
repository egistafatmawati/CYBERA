<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Exception;

class GoogleAuthController extends Controller
{
    /**
     * Redirect the user to the Google authentication page.
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from Google.
     */
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            
            // Check if user already exists
            $user = User::where('email', $googleUser->getEmail())->first();

            if ($user) {
                // If user exists but is an admin, reject Google login
                if ($user->role === 'admin') {
                    return redirect()->route('login')->withErrors([
                        'email' => 'Akun administrator hanya dapat login menggunakan email dan password.'
                    ]);
                }

                // If user exists and is 'pengguna', update google_id if missing and login
                if (!$user->google_id) {
                    $user->update([
                        'google_id' => $googleUser->getId()
                    ]);
                }

                Auth::login($user);
                return redirect()->route('user.dashboard');
            } else {
                // If user does not exist, create a new 'pengguna' account
                $newUser = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId(),
                    'role' => 'pengguna',
                    'email_verified_at' => now(),
                    // Generate a random password since it's required by the DB schema
                    'password' => Hash::make(Str::random(24)),
                ]);

                Auth::login($newUser);
                return redirect()->route('user.dashboard');
            }

        } catch (Exception $e) {
            return redirect()->route('login')->withErrors([
                'email' => 'Terjadi kesalahan saat login menggunakan Google. Silakan coba lagi.'
            ]);
        }
    }
}
