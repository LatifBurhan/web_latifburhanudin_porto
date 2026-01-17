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
    <title>Latif Portfolio</title>

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

<body class="bg-rail-dark text-text-main transition-colors duration-300 font-sans antialiased overflow-hidden h-screen w-screen selection:bg-rail-accent selection:text-rail-dark relative">

    <div class="fixed inset-0 pointer-events-none z-0 transition-opacity duration-500 bg-dot-pattern bg-dot-lg opacity-80"></div>

    <div class="fixed top-6 right-6 z-50">
        <button @click="darkMode = !darkMode"
                class="p-3 rounded-full shadow-lg transition-all duration-300 transform hover:scale-110 active:scale-95
                       bg-white/80 dark:bg-rail-card/80 backdrop-blur-md border border-gray-200 dark:border-white/10
                       text-gray-600 dark:text-rail-accent hover:shadow-xl group">
            <svg x-show="darkMode" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="rotate-90 opacity-0" x-transition:enter-end="rotate-0 opacity-100" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
            <svg x-show="!darkMode" x-cloak x-transition:enter="transition ease-out duration-300" x-transition:enter-start="-rotate-90 opacity-0" x-transition:enter-end="rotate-0 opacity-100" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" /></svg>
        </button>
    </div>

    <div class="relative z-10 h-full w-full">
        @yield('content')
    </div>

</body>

</html>
