<!DOCTYPE html>
<html lang="id" class="dark" x-data="{
    darkMode: localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)
}" x-init="$watch('darkMode', val => {
    localStorage.setItem('theme', val ? 'dark' : 'light');
    if (val) document.documentElement.classList.add('dark');
    else document.documentElement.classList.remove('dark');
});
if (darkMode) document.documentElement.classList.add('dark');
else document.documentElement.classList.remove('dark');">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Latif Burhanudin</title>
    <link rel="icon" href="{{ asset('img/favicon.png') }}" type="image/png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body
    class="bg-rail-dark text-text-main transition-colors duration-300 font-sans antialiased overflow-hidden h-screen w-screen selection:bg-rail-accent selection:text-rail-dark relative">

    <div
        class="fixed inset-0 pointer-events-none z-0 transition-opacity duration-500 bg-dot-pattern bg-dot-lg opacity-80">
    </div>

    <div class="fixed top-6 right-6 z-40 flex items-center gap-3" x-data="{
        musicPlaying: false,
        toggleMusic() {
            this.musicPlaying = !this.musicPlaying;
            const audio = this.$refs.bgMusic;
            // Volume diset pelan (20%) biar enak didengar
            audio.volume = 0.2;

            if (this.musicPlaying) {
                audio.play();
            } else {
                audio.pause();
            }
        }
    }">

        <audio x-ref="bgMusic" loop preload="auto">
            <source src="{{ asset('audio/aboutyou1975.mp3') }}" type="audio/mp3">
        </audio>

        <button @click="toggleMusic()"
            class="p-3 rounded-full shadow-lg transition-all duration-300 transform hover:scale-110 active:scale-95
                       bg-white/80 dark:bg-rail-card/80 backdrop-blur-md border border-gray-200 dark:border-white/10
                       text-gray-600 dark:text-rail-accent hover:shadow-xl group relative overflow-hidden">

            <div x-show="musicPlaying"
                class="absolute inset-0 flex items-center justify-center gap-0.5 opacity-20 pointer-events-none">
                <div class="w-1 bg-rail-accent animate-[bounce_1s_infinite] h-3"></div>
                <div class="w-1 bg-rail-accent animate-[bounce_1.2s_infinite] h-5"></div>
                <div class="w-1 bg-rail-accent animate-[bounce_0.8s_infinite] h-3"></div>
            </div>

            <template x-if="musicPlaying">
                <svg class="h-6 w-6 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2
                 s-3-.895-3-2 1.343-2 3-2
                 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2
                 s-3-.895-3-2 1.343-2 3-2
                 3 .895 3 2zM9 10l12-3" />
                </svg>
            </template>

            <template x-if="!musicPlaying">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.586 15H4a1 1 0 01-1-1v-4
                 a1 1 0 011-1h1.586l4.707-4.707
                 C10.923 3.663 12 4.109 12 5v14
                 c0 .891-1.077 1.337-1.707.707
                 L5.586 15z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 14l2-2m0 0l2-2
                 m-2 2l-2-2m2 2l2 2" />
                </svg>
            </template>

        </button>

        <button @click="darkMode = !darkMode"
            class="p-3 rounded-full shadow-lg transition-all duration-300 transform hover:scale-110 active:scale-95
                       bg-white/80 dark:bg-rail-card/80 backdrop-blur-md border border-gray-200 dark:border-white/10
                       text-gray-600 dark:text-rail-accent hover:shadow-xl group">
            <svg x-show="darkMode" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="rotate-90 opacity-0" x-transition:enter-end="rotate-0 opacity-100"
                xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>
            <svg x-show="!darkMode" x-cloak x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="-rotate-90 opacity-0" x-transition:enter-end="rotate-0 opacity-100"
                xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
            </svg>
        </button>
    </div>

    <div class="relative z-10 h-full w-full">
        @yield('content')
    </div>

</body>

</html>
