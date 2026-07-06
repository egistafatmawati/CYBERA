<nav class="bg-primary">
    <div class="max-w-7xl mx-auto flex items-center justify-between px-8 py-5">

        {{-- Logo --}}
        <a href="/">
            <img
                src="{{ asset('images/logo/logo.png') }}"
                alt="CYBERA"
                class="h-12"
            >
        </a>

        {{-- Menu --}}
        <div class="hidden lg:flex items-center gap-10">

            <a href="/" class="text-white hover:text-secondary transition">
                Dashboard
            </a>

            <a href="#" class="text-white hover:text-secondary transition">
                Materi
            </a>

            <a href="#" class="text-white hover:text-secondary transition">
                Simulasi
            </a>

            <a href="#" class="text-white hover:text-secondary transition">
                Quiz
            </a>

        </div>

        {{-- Button --}}
        <div class="flex gap-4">

            <a href="{{ route('login') }}"
                class="border border-secondary rounded-full px-6 py-2 text-secondary hover:bg-secondary hover:text-primary transition">

                Masuk

            </a>

            <a href="{{ route('register') }}"
                class="bg-secondary rounded-full px-6 py-2 text-primary font-semibold">

                Daftar

            </a>

        </div>

    </div>
</nav>