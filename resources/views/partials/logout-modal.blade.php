<!-- Logout Modal Popup -->
<div id="logoutModal" class="hidden">
    <div class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm transition-opacity duration-300">
        <div class="bg-white rounded-[28px] w-[350px] mx-4 px-6 py-8 text-center shadow-2xl relative">
            
            <!-- Icon -->
            <div class="mx-auto mb-4 w-16 h-16 rounded-full bg-[#CC0000] flex items-center justify-center shadow-lg">
                <svg class="w-8 h-8 text-white ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <!-- Icon outline untuk logout/sign-out -->
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                </svg>
            </div>
            
            <!-- Title -->
            <h2 class="text-[20px] font-bold text-black mb-2" style="font-family: 'Inter', sans-serif;">Konfirmasi Keluar</h2>
            
            <!-- Description -->
            <p class="text-gray-500 text-sm mb-8" style="font-family: 'Inter', sans-serif;">Apakah Anda yakin ingin keluar dari akun ini?</p>
            
            <!-- Buttons -->
            <div class="flex justify-center gap-3">
                <button type="button" onclick="document.getElementById('logoutModal').classList.add('hidden')" class="w-1/2 py-2.5 rounded-xl bg-black text-white text-sm font-bold transition duration-300 hover:bg-gray-800">
                    Batal
                </button>
                <form method="POST" action="{{ route('logout') }}" class="w-1/2 m-0">
                    @csrf
                    <button type="submit" class="w-full py-2.5 rounded-xl bg-[#CC0000] text-white text-sm font-bold transition duration-300 hover:bg-red-700">
                        Keluar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
