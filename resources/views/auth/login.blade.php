<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login - CYBERA</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Audiowide&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-['Inter'] antialiased text-white min-h-screen flex flex-col relative selection:bg-[#FFC107] selection:text-[#090F31]">

    <!-- Header -->
    <div class="w-full z-20">
        @include('partials.header')
    </div>

    <!-- Background Image -->
    <div class="fixed inset-0 z-[-1]" style="background-image: url('{{ asset('images/card1.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;"></div>
    
    <!-- Overlay Hitam Kebiruan agar form lebih jelas -->
    <div class="fixed inset-0 z-[-1] bg-[#090F31] opacity-40"></div>

    <!-- Konten Tengah -->
    <div class="flex-grow flex items-center justify-center p-4 z-10">
        
        <!-- Card Login (Glassmorphism Effect) -->
        <div class="w-full max-w-[430px] bg-white/10 backdrop-blur-lg border border-white/20 rounded-[28px] p-8 flex flex-col justify-center shadow-[0_8px_32px_0_rgba(0,0,0,0.3)]">
            
            <div class="w-full mx-auto">
                <!-- Logo -->
                <div class="flex justify-center mb-4">
                    <img src="{{ asset('images/LOGO 1.png') }}" alt="CYBERA Logo" class="h-16 sm:h-20 object-contain">
                </div>

                <!-- Judul -->
                <div class="text-center mb-6">
                    <h2 class="text-xl sm:text-2xl" style="font-family: 'Audiowide', sans-serif;">
                        Masuk ke <span class="text-[#FFC107]">CYBERA</span>
                    </h2>
                </div>

                
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Address -->
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-bold text-white mb-1.5">Email atau Username</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" 
                               class="block w-full bg-transparent border border-white/70 text-white placeholder-white/80 focus:border-[#FFC107] focus:ring-[#FFC107] rounded-md px-3 py-2.5 text-sm transition-colors duration-200" 
                               placeholder="Masukkan email atau username">
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-[#FFC107] text-xs" />
                    </div>

                    <!-- Password -->
                    <div class="mb-1">
                        <label for="password" class="block text-sm font-bold text-white mb-1.5">Password</label>
                        <div class="relative">
                            <input id="password" type="password" name="password" required autocomplete="current-password" 
                                   class="block w-full bg-transparent border border-white/70 text-white placeholder-white/80 focus:border-[#FFC107] focus:ring-[#FFC107] rounded-md px-3 py-2.5 text-sm transition-colors duration-200" 
                                   placeholder="Masukkan Password Anda">
                            
                            <!-- Show / Hide Password Button -->
                            <button type="button" id="togglePassword" class="absolute inset-y-0 right-0 pr-3 flex items-center text-white/80 hover:text-white transition-colors outline-none">
                                <svg id="eyeIcon" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-[#FFC107] text-xs" />
                    </div>

                    <!-- Reset Password Button -->
                    <div class="flex justify-end mb-6">
                        @if (Route::has('password.request'))
                            <button type="button" onclick="document.getElementById('forgotPasswordModal').classList.remove('hidden')" class="text-xs text-red-600 hover:text-red-400 hover:underline transition-colors font-medium">
                                Reset Password?
                            </button>
                        @endif
                    </div>

                    <!-- Login Button -->
                    <button type="submit" class="w-full bg-[#FFC107] hover:bg-yellow-400 text-black font-bold py-2.5 px-4 rounded-md transform hover:scale-[1.02] transition-all duration-200 mb-4 shadow-md text-sm">
                        Login
                    </button>
                    
                    <!-- Google Login Button -->
                    <a href="#" class="w-full bg-white hover:bg-gray-100 text-gray-800 font-bold py-2.5 px-4 rounded-md flex items-center justify-center border border-gray-300 transform hover:scale-[1.02] transition-all duration-200 mb-6 shadow-sm text-sm">
                        <svg class="w-4 h-4 mr-2" viewBox="0 0 24 24">
                            <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                            <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                            <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                            <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                        </svg>
                        Lanjut dengan Google
                    </a>

                    <!-- Register Link -->
                    <p class="text-center text-xs text-gray-300">
                        Belum punya akun? <a href="{{ route('register') }}" class="text-[#FFC107] hover:underline font-bold">Register</a>
                    </p>
                </form>
            </div>
        </div>
    </div>

    <!-- Script for Show/Hide Password -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const togglePassword = document.getElementById('togglePassword');
            const password = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');

            if(togglePassword && password && eyeIcon) {
                togglePassword.addEventListener('click', function () {
                    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                    password.setAttribute('type', type);
                    
                    if (type === 'password') {
                        eyeIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />';
                    } else {
                        eyeIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />';
                    }
                });
            }
        });
    </script>

    @include('partials.forgot-password')
</body>
</html>
