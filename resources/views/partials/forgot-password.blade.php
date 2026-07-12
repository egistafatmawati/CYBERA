    <!-- Forgot Password Modal -->
    <div id="forgotPasswordModal" class="hidden">
        <div class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm transition-opacity duration-300">
        
        <div class="relative z-10 w-full max-w-[380px] mx-6 rounded-[28px] bg-[#090F31] border border-white/10 shadow-[0_25px_70px_rgba(0,0,0,.45)] px-6 py-8 flex flex-col">
            
            <!-- Logo -->
            <div class="flex justify-center mb-5">
                <img src="{{ asset('images/LOGO 1.png') }}" alt="CYBERA" class="h-14 object-contain">
            </div>
            
            <!-- Title -->
            <div class="text-center mb-6">
                <h1 class="text-[22px] text-white leading-tight font-normal" style="font-family:'Audiowide',sans-serif;">Reset Password</h1>
            </div>
            
            <!-- Form Reset Password Langsung -->
            <form method="POST" action="#">
                @csrf
                
                <!-- Input Email -->
                <div class="mb-4">
                    <label class="block text-white text-sm font-bold mb-2">Email</label>
                    <input id="reset_email" type="email" name="email" required 
                           class="w-full rounded-md border border-gray-400 bg-transparent text-white placeholder-gray-400 px-4 py-2.5 outline-none focus:border-[#FFC107] focus:ring-1 focus:ring-[#FFC107]" 
                           placeholder="Masukkan email">
                </div>

                <!-- Input Password Baru -->
                <div class="mb-4">
                    <label class="block text-white text-sm font-bold mb-2">Password Baru</label>
                    <div class="relative">
                        <input id="reset_password" type="password" name="password" required 
                               class="w-full rounded-md border border-gray-400 bg-transparent text-white placeholder-gray-400 px-4 py-2.5 pr-12 outline-none focus:border-[#FFC107] focus:ring-1 focus:ring-[#FFC107]" 
                               placeholder="Masukkan password">
                        <button type="button" onclick="const p = document.getElementById('reset_password'); p.type = p.type === 'password' ? 'text' : 'password';" class="absolute inset-y-0 right-0 pr-4 flex items-center text-white/70 hover:text-white outline-none">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Input Verifikasi Password -->
                <div class="mb-6">
                    <label class="block text-white text-sm font-bold mb-2">Verifikasi Password</label>
                    <div class="relative">
                        <input id="reset_password_confirmation" type="password" name="password_confirmation" required 
                               class="w-full rounded-md border border-gray-400 bg-transparent text-white placeholder-gray-400 px-4 py-2.5 pr-12 outline-none focus:border-[#FFC107] focus:ring-1 focus:ring-[#FFC107]" 
                               placeholder="Masukkan password">
                        <button type="button" onclick="const p = document.getElementById('reset_password_confirmation'); p.type = p.type === 'password' ? 'text' : 'password';" class="absolute inset-y-0 right-0 pr-4 flex items-center text-white/70 hover:text-white outline-none">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                    </div>
                </div>
                
                <!-- Buttons -->
                <div class="flex justify-center gap-3">
                    <!-- Kembali -->
                    <button type="button" onclick="document.getElementById('forgotPasswordModal').classList.add('hidden')"
                            class="w-1/2 py-2.5 rounded-xl bg-white text-black text-sm font-bold text-center flex items-center justify-center transition duration-300 hover:bg-gray-200">
                        Kembali
                    </button>
                    <!-- Reset -->
                    <button type="button" onclick="showSuccessModal()"
                            class="w-1/2 py-2.5 rounded-xl bg-[#FFCC00] text-black text-sm font-bold flex items-center justify-center transition duration-300 hover:bg-yellow-400">
                        Reset
                    </button>
                </div>
            </form>
        </div>
        </div>
    </div>

    <!-- Success Modal Popup -->
    <div id="successModal" class="hidden">
        <div class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm transition-opacity duration-300">
        <div class="bg-white rounded-[35px] w-full max-w-[380px] mx-4 px-8 py-10 text-center shadow-2xl relative">
            
            <!-- Icon -->
            <div class="mx-auto mb-6 w-20 h-20 rounded-full bg-[#0CD939] flex items-center justify-center shadow-lg shadow-green-500/30">
                <svg class="w-10 h-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                </svg>
            </div>
            
            <!-- Text -->
            <h2 class="text-xl sm:text-2xl font-bold text-[#0CD939] tracking-wide">
                RESET PASSWORD<br/>BERHASIL!
            </h2>
            
            <!-- Tombol Close (Opsional) -->
            <button onclick="document.getElementById('successModal').classList.add('hidden')" class="absolute top-4 right-5 text-gray-400 hover:text-gray-700 outline-none">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>
        </div>
    </div>
    
    <script>
        function showSuccessModal() {
            // Hide reset modal
            document.getElementById('forgotPasswordModal').classList.add('hidden');
            
            // Show success modal
            const success = document.getElementById('successModal');
            success.classList.remove('hidden');
            
            // Auto close after 4 seconds
            setTimeout(() => {
                success.classList.add('hidden');
            }, 4000);
        }
    </script>
