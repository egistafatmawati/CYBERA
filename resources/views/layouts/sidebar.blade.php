<aside class="w-64 fixed inset-y-0 left-0 bg-[#070b24] border-r border-[#1e2a6d] flex flex-col z-50 text-sm font-medium">
    
    <!-- Logo Section -->
    <div class="px-6 py-6 border-b border-[#FFCC00]/50 flex justify-center">
        <a href="{{ route('admin.dashboard') }}" class="block">
            <img src="{{ asset('images/LOGO 2.png') }}?v={{ time() }}" alt="CYBERA Logo" class="h-10 object-contain mx-auto">
        </a>
    </div>

    <!-- Navigation Links -->
    <nav class="flex-grow flex flex-col px-4 py-6 space-y-2 overflow-y-auto">
        
        <!-- Dashboard -->
        <a href="{{ route('admin.dashboard') }}" 
           class="flex items-center gap-4 px-4 py-3 rounded-xl transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-[#FFCC00]/20 text-[#FFCC00]' : 'text-gray-300 hover:bg-[#1e2a6d] hover:text-white' }}">
            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
            </svg>
            <span>Dashboard</span>
        </a>

        <!-- Pengguna -->
        <a href="{{ route('admin.pengguna') }}" 
           class="flex items-center gap-4 px-4 py-3 rounded-xl transition-colors {{ request()->routeIs('admin.pengguna') ? 'bg-[#FFCC00]/20 text-[#FFCC00]' : 'text-gray-300 hover:bg-[#1e2a6d] hover:text-white' }}">
            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
            </svg>
            <span>Pengguna</span>
        </a>

        <!-- Materi -->
        <a href="{{ route('admin.materi.index') }}" 
           class="flex items-center gap-4 px-4 py-3 rounded-xl transition-colors {{ request()->routeIs('admin.materi.*') ? 'bg-[#FFCC00]/20 text-[#FFCC00]' : 'text-gray-300 hover:bg-[#1e2a6d] hover:text-white' }}">
            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
            </svg>
            <span>Materi</span>
        </a>

        <!-- Simulasi -->
        <a href="{{ route('admin.simulasi.index') }}" 
           class="flex items-center gap-4 px-4 py-3 rounded-xl transition-colors {{ request()->routeIs('admin.simulasi.*') ? 'bg-[#FFCC00]/20 text-[#FFCC00]' : 'text-gray-300 hover:bg-[#1e2a6d] hover:text-white' }}">
            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="10" stroke-width="2"></circle>
                <circle cx="12" cy="12" r="6" stroke-width="2"></circle>
                <circle cx="12" cy="12" r="2" stroke-width="2"></circle>
            </svg>
            <span>Simulasi</span>
        </a>

        <!-- Kuis -->
        <a href="{{ route('admin.quiz.index') }}" 
           class="flex items-center gap-4 px-4 py-3 rounded-xl transition-colors {{ request()->routeIs('admin.quiz.*') ? 'bg-[#FFCC00]/20 text-[#FFCC00]' : 'text-gray-300 hover:bg-[#1e2a6d] hover:text-white' }}">
            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
            </svg>
            <span>Kuis</span>
        </a>

        <!-- Profil -->
        <a href="{{ route('admin.profile') }}" 
           class="flex items-center gap-4 px-4 py-3 rounded-xl transition-colors {{ request()->routeIs('admin.profile') ? 'bg-[#FFCC00]/20 text-[#FFCC00]' : 'text-gray-300 hover:bg-[#1e2a6d] hover:text-white' }}">
            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
            </svg>
            <span>Profil</span>
        </a>

    </nav>

    <!-- Logout Section -->
    <div class="p-4 border-t border-[#1e2a6d]">
        <button type="button" onclick="document.getElementById('logoutModal').classList.remove('hidden')" 
           class="flex items-center justify-center gap-3 w-full px-4 py-3 rounded-xl transition-colors text-gray-300 hover:bg-[#CC0000]/20 hover:text-[#CC0000]">
            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
            </svg>
            <span>Keluar</span>
        </button>
    </div>
</aside>
