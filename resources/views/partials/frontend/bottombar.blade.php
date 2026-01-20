<nav class="fixed bottom-6 left-1/2 transform -translate-x-1/2 z-50 w-auto max-w-full px-4">

    <div class="p-2 rounded-3xl backdrop-blur-xl flex items-center gap-2 transition-all duration-300 shadow-2xl
                /* LIGHT MODE (Tetap sama) */
                bg-white/80 border border-gray-200
                /* DARK MODE (Diperbarui: Glass Effect Lebih Elegan) */
                dark:bg-black/60 dark:border-white/10 dark:shadow-[0_0_30px_rgba(0,0,0,0.6)]">

        <button @click="switchTab('home')"
                class="relative flex items-center justify-center h-12 rounded-2xl transition-all duration-500 ease-[cubic-bezier(0.23,1,0.32,1)] overflow-hidden"
                :class="activeTab === 'home'
                    /* ACTIVE STATE */
                    ? 'w-28 bg-gray-100 text-rail-accent shadow-sm dark:bg-white/10 dark:text-white dark:shadow-[inset_0_1px_0_rgba(255,255,255,0.1)]'
                    /* INACTIVE STATE */
                    : 'w-12 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-white'">

            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 min-w-[24px]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>

            <span class="whitespace-nowrap font-medium text-sm ml-2 transition-opacity duration-300 delay-100"
                  :class="activeTab === 'home' ? 'opacity-100' : 'opacity-0 hidden'">
                Home
            </span>
        </button>

        <button @click="switchTab('about')"
                class="relative flex items-center justify-center h-12 rounded-2xl transition-all duration-500 ease-[cubic-bezier(0.23,1,0.32,1)] overflow-hidden"
                :class="activeTab === 'about'
                    ? 'w-28 bg-gray-100 text-rail-accent shadow-sm dark:bg-white/10 dark:text-white dark:shadow-[inset_0_1px_0_rgba(255,255,255,0.1)]'
                    : 'w-12 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-white'">

            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 min-w-[24px]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
            <span class="whitespace-nowrap font-medium text-sm ml-2 transition-opacity duration-300 delay-100"
                  :class="activeTab === 'about' ? 'opacity-100' : 'opacity-0 hidden'">
                About
            </span>
        </button>

        <button @click="switchTab('works')"
                class="relative flex items-center justify-center h-12 rounded-2xl transition-all duration-500 ease-[cubic-bezier(0.23,1,0.32,1)] overflow-hidden"
                :class="activeTab === 'works'
                    ? 'w-28 bg-gray-100 text-rail-accent shadow-sm dark:bg-white/10 dark:text-white dark:shadow-[inset_0_1px_0_rgba(255,255,255,0.1)]'
                    : 'w-12 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-white'">

            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 min-w-[24px]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
            </svg>
            <span class="whitespace-nowrap font-medium text-sm ml-2 transition-opacity duration-300 delay-100"
                  :class="activeTab === 'works' ? 'opacity-100' : 'opacity-0 hidden'">
                Works
            </span>
        </button>

        <button @click="switchTab('dashboard')"
                class="relative flex items-center justify-center h-12 rounded-2xl transition-all duration-500 ease-[cubic-bezier(0.23,1,0.32,1)] overflow-hidden"
                :class="activeTab === 'dashboard'
                    ? 'w-32 bg-gray-100 text-rail-accent shadow-sm dark:bg-white/10 dark:text-white dark:shadow-[inset_0_1px_0_rgba(255,255,255,0.1)]'
                    : 'w-12 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-white'">

            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 min-w-[24px]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
            </svg>
            <span class="whitespace-nowrap font-medium text-sm ml-2 transition-opacity duration-300 delay-100"
                  :class="activeTab === 'dashboard' ? 'opacity-100' : 'opacity-0 hidden'">
                Dashboard
            </span>
        </button>

        <button @click="switchTab('connect')"
                class="relative flex items-center justify-center h-12 rounded-2xl transition-all duration-500 ease-[cubic-bezier(0.23,1,0.32,1)] overflow-hidden"
                :class="activeTab === 'connect'
                    ? 'w-32 bg-gray-100 text-rail-accent shadow-sm dark:bg-white/10 dark:text-white dark:shadow-[inset_0_1px_0_rgba(255,255,255,0.1)]'
                    : 'w-12 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-white'">

            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 min-w-[24px]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>
            <span class="whitespace-nowrap font-medium text-sm ml-2 transition-opacity duration-300 delay-100"
                  :class="activeTab === 'connect' ? 'opacity-100' : 'opacity-0 hidden'">
                Connect
            </span>
        </button>

    </div>
</nav>
