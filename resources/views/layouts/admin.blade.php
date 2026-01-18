<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Latif</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        rail: {
                            dark: '#0a0a0a',
                            card: '#161616',
                            accent: '#8b5cf6', // Ungu Utama
                            sweet: '#ec4899'   // Pink Aksen
                        }
                    }
                }
            }
        }
    </script>
    <style>
        /* Custom Scrollbar agar lebih rapi di admin panel */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #0a0a0a; }
        ::-webkit-scrollbar-thumb { background: #333; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #555; }
    </style>
</head>

<body class="bg-rail-dark text-gray-200 font-sans antialiased">
    <div class="flex min-h-screen">

        <aside class="w-64 bg-rail-card border-r border-white/5 p-6 hidden md:flex flex-col fixed h-full z-50">
            <h2 class="text-2xl font-bold text-white mb-10 flex items-center gap-3">
                <span class="w-3 h-3 bg-rail-accent rounded-full shadow-[0_0_10px_#8b5cf6]"></span>
                Latif Admin
            </h2>

            <nav class="space-y-2 flex-1">

                <a href="{{ route('admin.dashboard') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-300 {{ request()->routeIs('admin.dashboard') ? 'bg-rail-accent text-white shadow-lg shadow-purple-900/20' : 'text-gray-400 hover:bg-white/5 hover:text-white' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                    Dashboard
                </a>

                <a href="{{ route('admin.projects.index') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-300 {{ request()->routeIs('admin.projects.*') ? 'bg-rail-accent text-white shadow-lg shadow-purple-900/20' : 'text-gray-400 hover:bg-white/5 hover:text-white' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    Projects
                </a>

                <a href="{{ route('admin.certificates.index') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-300 {{ request()->routeIs('admin.certificates.*') ? 'bg-rail-accent text-white shadow-lg shadow-purple-900/20' : 'text-gray-400 hover:bg-white/5 hover:text-white' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>
                    Certificates
                </a>
                <a href="{{ route('admin.experiences.index') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-300 {{ request()->routeIs('admin.experiences.*') ? 'bg-rail-accent text-white shadow-lg shadow-purple-900/20' : 'text-gray-400 hover:bg-white/5 hover:text-white' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>
                    Certificates
                </a>

            </nav>

            <div class="pt-6 border-t border-white/5">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="w-full text-left px-4 py-2 text-sm text-red-400 hover:text-red-300 hover:bg-red-500/10 rounded-lg transition font-bold flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>
                        Log Out
                    </button>
                </form>
            </div>
        </aside>

        <main class="flex-1 p-8 md:ml-64 min-h-screen">
            @yield('content')
        </main>

    </div>
</body>

</html>
