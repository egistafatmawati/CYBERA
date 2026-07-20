<header class="flex items-center justify-between px-8 py-4 {{ request()->routeIs('login', 'register') || request()->is('login', 'register') ? 'bg-transparent' : 'bg-[#090F31]' }} text-[#FFFFFF]" style="font-family: 'Inter', sans-serif;">
    <!-- Logo -->
    <div class="flex items-center">
        <!-- Ganti src dengan path logo Anda (misalnya asset('images/logo.png')) -->
        <img src="{{ asset('images/LOGO 2.png') }}?v={{ time() }}" alt="CYBERA Logo" class="h-12">
    </div>

    <!-- Navigation Links -->
    <nav class="flex items-center space-x-10 text-base font-medium">
        <a href="{{ route('user.dashboard') }}" class="{{ request()->routeIs('user.dashboard') ? 'text-[#FFCC00]' : 'hover:text-[#FFCC00]' }} transition-colors duration-200">Dashboard</a>
        <a href="{{ route('user.materi') }}" class="{{ request()->routeIs('user.materi*') ? 'text-[#FFCC00]' : 'hover:text-[#FFCC00]' }} transition-colors duration-200">Materi</a>
        <a href="{{ route('user.simulasi') }}" class="{{ request()->routeIs('user.simulasi*') ? 'text-[#FFCC00]' : 'hover:text-[#FFCC00]' }} transition-colors duration-200">Simulasi</a>
        <a href="{{ route('user.quiz') }}" class="{{ request()->routeIs('user.quiz*') ? 'text-[#FFCC00]' : 'hover:text-[#FFCC00]' }} transition-colors duration-200">Kuis</a>
    </nav>

    @auth
    <!-- User Actions (Logged In) -->
    <div class="flex items-center space-x-4">
        <!-- Profile Icon -->
        <a href="{{ route('user.profile') }}" class="flex items-center justify-center w-10 h-10 rounded-full border border-gray-300 bg-transparent hover:border-[#FFCC00] hover:text-[#FFCC00] text-gray-200 transition-colors duration-200">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
        </a>

        <!-- Logout Button -->
        <button type="button" onclick="document.getElementById('logoutModal').classList.remove('hidden')" class="px-5 py-2 bg-[#CC0000] hover:bg-red-700 text-[#FFFFFF] rounded-2xl text-base font-medium transition-colors duration-200 shadow-sm">
            Logout
        </button>
    </div>
    @else
    <!-- Guest Actions (Not Logged In) -->
    <div class="flex items-center space-x-4">
        <a href="{{ route('login') }}" class="px-6 py-2 bg-[#00E676] hover:bg-green-500 text-white rounded-md font-semibold transition-colors duration-200">
            Login
        </a>
        <a href="{{ route('register') }}" class="px-6 py-2 bg-[#FFCC00] hover:bg-yellow-500 text-white rounded-md font-semibold transition-colors duration-200">
            Register
        </a>
    </div>
    @endauth

    @include('partials.logout-modal')
</header>
