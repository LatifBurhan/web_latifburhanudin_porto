<div class="w-full max-w-6xl mx-auto px-4 pb-32">

    <div class="mb-12 flex flex-col md:flex-row md:items-end justify-between gap-4">
        <div>
            <h2 class="text-3xl md:text-5xl font-bold text-gray-900 dark:text-white">
                Live
                <span
                    class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-500 to-purple-500 dark:from-rail-accent dark:to-rail-sweet">
                    Dashboard.
                </span>
            </h2>
            <p class="text-gray-600 dark:text-gray-400 mt-2 text-sm md:text-base">
                Comprehensive metrics from my Portfolio, GitHub Activity, and MonkeyType API.
            </p>
        </div>
    </div>
    {{-- DASBOARD SENDIRI --}}
    <div class="w-full max-w-6xl mx-auto px-4 mt-20 mb-20">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">

            @php
                $statCardClass = "group relative p-6 rounded-[24px] overflow-hidden transition-all duration-300 hover:-translate-y-1 backdrop-blur-md
                              bg-white/60 border border-gray-200 shadow-xl shadow-gray-200/50
                              dark:bg-rail-card dark:border-white/5 dark:shadow-none";
            @endphp

            <div class="{{ $statCardClass }} hover:border-indigo-500/50 dark:hover:border-rail-accent/50">
                <div
                    class="absolute -right-6 -top-6 w-24 h-24 bg-indigo-500/10 dark:bg-rail-accent/20 blur-[40px] rounded-full group-hover:bg-indigo-500/20 dark:group-hover:bg-rail-accent/30 transition-all">
                </div>

                <div class="relative z-10 flex flex-col items-center text-center">
                    <div
                        class="mb-3 p-3 rounded-2xl bg-indigo-100 text-indigo-600 dark:bg-rail-accent/10 dark:text-rail-accent transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-4xl font-black text-gray-900 dark:text-white mb-1 transition-colors">
                        {{ $totalProjects }}</h3>
                    <p class="text-xs font-bold text-gray-500 dark:text-gray-500 uppercase tracking-widest">Projects</p>
                    <p class="text-[10px] text-gray-400 dark:text-gray-600 mt-1">Completed</p>
                </div>
            </div>

            <div class="{{ $statCardClass }} hover:border-yellow-500/50">
                <div
                    class="absolute -right-6 -top-6 w-24 h-24 bg-yellow-500/10 dark:bg-yellow-500/10 blur-[40px] rounded-full group-hover:bg-yellow-500/20 transition-all">
                </div>

                <div class="relative z-10 flex flex-col items-center text-center">
                    <div
                        class="mb-3 p-3 rounded-2xl bg-yellow-100 text-yellow-600 dark:bg-yellow-500/10 dark:text-yellow-500 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-4xl font-black text-gray-900 dark:text-white mb-1 transition-colors">
                        {{ $totalCertificates }}</h3>
                    <p class="text-xs font-bold text-gray-500 dark:text-gray-500 uppercase tracking-widest">Awards</p>
                    <p class="text-[10px] text-gray-400 dark:text-gray-600 mt-1">Achieved</p>
                </div>
            </div>

            <div class="{{ $statCardClass }} hover:border-blue-500/50">
                <div
                    class="absolute -right-6 -top-6 w-24 h-24 bg-blue-500/10 dark:bg-blue-500/10 blur-[40px] rounded-full group-hover:bg-blue-500/20 transition-all">
                </div>

                <div class="relative z-10 flex flex-col items-center text-center">
                    <div
                        class="mb-3 p-3 rounded-2xl bg-blue-100 text-blue-600 dark:bg-blue-500/10 dark:text-blue-500 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-4xl font-black text-gray-900 dark:text-white mb-1 transition-colors">
                        {{ $totalExperiences }}</h3>
                    <p class="text-xs font-bold text-gray-500 dark:text-gray-500 uppercase tracking-widest">Careers</p>
                    <p class="text-[10px] text-gray-400 dark:text-gray-600 mt-1">Journey</p>
                </div>
            </div>

            <div class="{{ $statCardClass }} hover:border-emerald-500/50">
                <div
                    class="absolute -right-6 -top-6 w-24 h-24 bg-emerald-500/10 dark:bg-emerald-500/10 blur-[40px] rounded-full group-hover:bg-emerald-500/20 transition-all">
                </div>

                <div class="relative z-10 flex flex-col items-center text-center">
                    <div
                        class="mb-3 p-3 rounded-2xl bg-emerald-100 text-emerald-600 dark:bg-emerald-500/10 dark:text-emerald-500 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                        </svg>
                    </div>
                    <h3 class="text-4xl font-black text-gray-900 dark:text-white mb-1 transition-colors">
                        {{ $totalDownloads }}</h3>
                    <p class="text-xs font-bold text-gray-500 dark:text-gray-500 uppercase tracking-widest">Interests
                    </p>
                    <p class="text-[10px] text-gray-400 dark:text-gray-600 mt-1">CV Downloads</p>
                </div>
            </div>

        </div>
    </div>


    {{-- GITHUB CONTRIBUTION --}}
    <div class="mb-20">
        <div class="flex items-center gap-4 mb-8">
            <div
                class="p-3 rounded-xl bg-indigo-100 text-indigo-600 dark:bg-rail-accent/10 dark:text-rail-accent border border-indigo-200 dark:border-rail-accent/20 shadow-lg shadow-indigo-500/10 dark:shadow-none">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" />
                </svg>
            </div>

            <div>
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white">
                    GitHub <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-500 to-purple-500">Contributions</span>
                </h2>
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    Activity over the past year fetched from GitHub API.
                </p>
            </div>
        </div>

        <div
            class="rounded-[24px] p-6 md:p-8 backdrop-blur-md
                    bg-white/60 border border-gray-200 shadow-xl shadow-gray-200/50
                    dark:bg-rail-card/50 dark:border-white/5 dark:shadow-none">

            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
                @php
                    $statCardClass = "p-4 rounded-2xl text-center border
                                      bg-white/80 border-gray-200
                                      dark:bg-[#0d1117]/80 dark:border-white/5";
                @endphp

                <div class="{{ $statCardClass }}">
                    <p class="text-[10px] text-gray-500 dark:text-gray-400 uppercase tracking-widest font-bold mb-1">
                        Total</p>
                    <p id="gh-total" class="text-2xl md:text-3xl font-black text-gray-900 dark:text-white">-</p>
                </div>
                <div class="{{ $statCardClass }}">
                    <p class="text-[10px] text-gray-500 dark:text-gray-400 uppercase tracking-widest font-bold mb-1">
                        This Week</p>
                    <p id="gh-week" class="text-2xl md:text-3xl font-black text-gray-900 dark:text-white">-</p>
                </div>
                <div class="{{ $statCardClass }}">
                    <p class="text-[10px] text-gray-500 dark:text-gray-400 uppercase tracking-widest font-bold mb-1">
                        Best Day</p>
                    <p id="gh-best" class="text-2xl md:text-3xl font-black text-indigo-600 dark:text-rail-accent">-
                    </p>
                </div>
                <div class="{{ $statCardClass }}">
                    <p class="text-[10px] text-gray-500 dark:text-gray-400 uppercase tracking-widest font-bold mb-1">
                        Daily Avg</p>
                    <p id="gh-avg" class="text-2xl md:text-3xl font-black text-gray-900 dark:text-white">-</p>
                </div>
            </div>

            <div class="w-full overflow-x-auto custom-scrollbar pb-2">
                <div class="min-w-[700px]">
                    <div class="flex gap-2 mb-2">
                        <div class="flex flex-col justify-between text-[9px] text-gray-400 h-[112px] pr-2 pt-1">
                            <span>Mon</span>
                            <span>Wed</span>
                            <span>Fri</span>
                        </div>
                        <div id="contributionHeatmap" class="flex-1 grid grid-rows-7 grid-flow-col gap-[3px]"></div>
                    </div>
                </div>
            </div>

            <div id="gh-loading" class="text-center py-10 text-gray-500 animate-pulse text-sm">
                Fetching GitHub Data...
            </div>
        </div>
    </div>

    {{-- BAGIAN MONKEYTYPE --}}
    <div class="w-full mt-12 mb-20">
        <div class="flex items-center gap-4 mb-8">
            <div
                class="p-3 rounded-xl bg-yellow-100 text-yellow-600 dark:bg-yellow-500/10 dark:text-yellow-500 border border-yellow-200 dark:border-yellow-500/20 shadow-lg shadow-yellow-500/10 dark:shadow-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19.428 15.428a2 2 0 00-1.022-.547l-2.384-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z">
                    </path>
                </svg>
            </div>
            <div>
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white">Typing <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-500 to-orange-500">Metrics</span>
                </h2>
                <p class="text-sm text-gray-600 dark:text-gray-400">Real-time statistics fetched from MonkeyType API.
                </p>
            </div>
        </div>

        <div id="mt-loading" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 animate-pulse">
            <div class="h-40 bg-gray-200 dark:bg-white/5 rounded-[28px]"></div>
            <div class="h-40 bg-gray-200 dark:bg-white/5 rounded-[28px]"></div>
            <div class="h-40 bg-gray-200 dark:bg-white/5 rounded-[28px]"></div>
            <div class="h-40 bg-gray-200 dark:bg-white/5 rounded-[28px]"></div>
        </div>

        <div id="mt-content" class="hidden grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

            @php
                $cardBase = "relative p-6 rounded-[28px] overflow-hidden group transition-all duration-300 hover:-translate-y-1 backdrop-blur-md
                             bg-white/60 border border-gray-200 shadow-lg shadow-gray-200/50
                             dark:bg-rail-card dark:border-white/10 dark:shadow-none";
            @endphp

            <div class="{{ $cardBase }} hover:border-indigo-500 dark:hover:border-rail-accent">
                <div
                    class="absolute -right-10 -top-10 w-32 h-32 bg-indigo-500/10 dark:bg-rail-accent/20 blur-[50px] rounded-full transition-all">
                </div>
                <div class="relative z-10">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h4 class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-widest">
                                Sprint Mode</h4>
                            <p class="text-[10px] text-indigo-600 dark:text-rail-accent font-bold mt-1">15 SECONDS</p>
                        </div>
                        <div
                            class="p-2 bg-indigo-100 text-indigo-600 dark:bg-rail-accent/20 dark:text-rail-accent rounded-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="flex items-baseline gap-2">
                        <span id="wpm15"
                            class="text-4xl lg:text-5xl font-black text-gray-900 dark:text-white">-</span>
                        <span class="text-sm text-gray-500 font-bold">WPM</span>
                    </div>
                    <div class="mt-4 flex items-center gap-2">
                        <div class="h-1.5 flex-1 bg-gray-200 dark:bg-gray-800 rounded-full overflow-hidden">
                            <div id="bar15"
                                class="h-full bg-indigo-500 dark:bg-rail-accent w-0 transition-all duration-1000">
                            </div>
                        </div>
                        <span id="acc15" class="text-xs font-bold text-gray-700 dark:text-white">-</span><span
                            class="text-[10px] text-gray-500">% ACC</span>
                    </div>
                </div>
            </div>

            <div class="{{ $cardBase }} hover:border-blue-500">
                <div
                    class="absolute -right-10 -top-10 w-32 h-32 bg-blue-500/10 dark:bg-blue-500/20 blur-[50px] rounded-full transition-all">
                </div>
                <div class="relative z-10">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h4 class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-widest">
                                Sprint Mode</h4>
                            <p class="text-[10px] text-blue-500 dark:text-blue-400 font-bold mt-1">30 SECONDS</p>
                        </div>
                        <div class="p-2 bg-blue-100 text-blue-600 dark:bg-blue-500/20 dark:text-blue-400 rounded-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="flex items-baseline gap-2">
                        <span id="wpm30"
                            class="text-4xl lg:text-5xl font-black text-gray-900 dark:text-white">-</span>
                        <span class="text-sm text-gray-500 font-bold">WPM</span>
                    </div>
                    <div class="mt-4 flex items-center gap-2">
                        <div class="h-1.5 flex-1 bg-gray-200 dark:bg-gray-800 rounded-full overflow-hidden">
                            <div id="bar30" class="h-full bg-blue-500 w-0 transition-all duration-1000"></div>
                        </div>
                        <span id="acc30" class="text-xs font-bold text-gray-700 dark:text-white">-</span><span
                            class="text-[10px] text-gray-500">% ACC</span>
                    </div>
                </div>
            </div>

            <div class="{{ $cardBase }} hover:border-pink-500 dark:hover:border-rail-sweet">
                <div
                    class="absolute -right-10 -top-10 w-32 h-32 bg-pink-500/10 dark:bg-rail-sweet/20 blur-[50px] rounded-full transition-all">
                </div>
                <div class="relative z-10">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h4 class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-widest">
                                Endurance</h4>
                            <p class="text-[10px] text-pink-500 dark:text-rail-sweet font-bold mt-1">60 SECONDS</p>
                        </div>
                        <div
                            class="p-2 bg-pink-100 text-pink-600 dark:bg-rail-sweet/20 dark:text-rail-sweet rounded-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="flex items-baseline gap-2">
                        <span id="wpm60"
                            class="text-4xl lg:text-5xl font-black text-gray-900 dark:text-white">-</span>
                        <span class="text-sm text-gray-500 font-bold">WPM</span>
                    </div>
                    <div class="mt-4 flex items-center gap-2">
                        <div class="h-1.5 flex-1 bg-gray-200 dark:bg-gray-800 rounded-full overflow-hidden">
                            <div id="bar60"
                                class="h-full bg-pink-500 dark:bg-rail-sweet w-0 transition-all duration-1000"></div>
                        </div>
                        <span id="acc60" class="text-xs font-bold text-gray-700 dark:text-white">-</span><span
                            class="text-[10px] text-gray-500">% ACC</span>
                    </div>
                </div>
            </div>

            <div class="{{ $cardBase }} hover:border-yellow-500">
                <div
                    class="absolute -right-10 -top-10 w-32 h-32 bg-yellow-500/10 dark:bg-yellow-500/20 blur-[50px] rounded-full transition-all">
                </div>
                <div class="relative z-10">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h4 class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-widest">
                                Experience</h4>
                            <p class="text-[10px] text-yellow-500 font-bold mt-1">LIFETIME</p>
                        </div>
                        <div
                            class="p-2 bg-yellow-100 text-yellow-600 dark:bg-yellow-500/20 dark:text-yellow-500 rounded-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 002 2h2a2 2 0 002-2z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <div class="flex flex-col gap-1">
                        <div class="flex items-baseline gap-2">
                            <span id="totalTests"
                                class="text-3xl lg:text-3xl font-black text-gray-900 dark:text-white">-</span>
                            <span class="text-[10px] text-gray-500">TESTS</span>
                        </div>
                        <div class="w-full h-[1px] bg-gray-200 dark:bg-white/5 my-2"></div>
                        <div class="flex items-baseline gap-2">
                            <span id="timeTyping"
                                class="text-xl lg:text-xl font-bold text-gray-900 dark:text-white">-</span>
                            <span class="text-[10px] text-gray-500">HOURS</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    // 1. MONKEY TYPE (Sama seperti sebelumnya, hanya memastikan ID cocok)
    document.addEventListener("DOMContentLoaded", function() {
        fetch('/api/monkeytype-stats')
            .then(res => res.ok ? res.json() : Promise.reject(res))
            .then(data => {
                const getStat = (mode, key) => data.pbs[mode]?.[0]?.[key] ? Math.round(data.pbs[mode][0][
                    key
                ]) : 0;
                const formatNum = (num) => num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");

                const updateUI = (idPrefix, wpm, acc) => {
                    const wpmEl = document.getElementById(`wpm${idPrefix}`);
                    const accEl = document.getElementById(`acc${idPrefix}`);
                    const barEl = document.getElementById(`bar${idPrefix}`);
                    if (wpmEl) wpmEl.innerText = wpm || '-';
                    if (accEl) accEl.innerText = acc;
                    if (barEl) barEl.style.width = acc + '%';
                };

                updateUI('15', getStat('15', 'wpm'), getStat('15', 'acc'));
                updateUI('30', getStat('30', 'wpm'), getStat('30', 'acc'));
                updateUI('60', getStat('60', 'wpm'), getStat('60', 'acc'));

                if (data.stats) {
                    const totalEl = document.getElementById('totalTests');
                    const timeEl = document.getElementById('timeTyping');
                    if (totalEl) totalEl.innerText = formatNum(data.stats.completedTests);
                    if (timeEl) timeEl.innerText = (data.stats.timeTyping / 3600).toFixed(1);
                }
                document.getElementById('mt-loading').classList.add('hidden');
                document.getElementById('mt-content').classList.remove('hidden');
            })
            .catch(console.error);
    });

    // 2. GITHUB HEATMAP (Disesuaikan agar kotak kosong warnanya adaptif Light/Dark)
    document.addEventListener("DOMContentLoaded", function() {
        const username = "LatifBurhan";

        fetch(`https://github-contributions-api.jogruber.de/v4/${username}?y=last`)
            .then(res => res.json())
            .then(data => {
                const contributions = data.contributions;

                // ... (Bagian Text Stats biarkan saja) ...
                document.getElementById("gh-total").innerText = data.total.lastYear;
                document.getElementById("gh-best").innerText = Math.max(...contributions.map(d => d.count));
                document.getElementById("gh-avg").innerText = (data.total.lastYear / 365).toFixed(1);
                document.getElementById("gh-week").innerText = contributions.slice(-7).reduce((sum, day) =>
                    sum + day.count, 0);

                const grid = document.getElementById("contributionHeatmap");
                document.getElementById("gh-loading").classList.add("hidden");

                contributions.slice(-364).forEach(day => {
                    const box = document.createElement("div");
                    const count = day.count;

                    let classes =
                        "w-[12px] h-[12px] rounded-[2px] transition-all hover:scale-125 hover:z-10 cursor-pointer ";

                    // === PERBAIKAN WARNA DISINI ===
                    if (count === 0) {
                        // LIGHT MODE: Ganti bg-gray-200 jadi bg-gray-300 (biar lebih kontras/gelap)
                        // DARK MODE: Tetap bg-[#161b22] (biar nyatu sama tema github dark)
                        classes += "bg-gray-300 dark:bg-[#161b22]";
                    } else if (count <= 2) {
                        classes += "bg-indigo-300 dark:bg-rail-accent/40";
                    } else if (count <= 5) {
                        classes += "bg-indigo-500 dark:bg-rail-accent/70";
                    } else {
                        classes += "bg-indigo-700 dark:bg-rail-accent";
                    }

                    box.className = classes;
                    box.title = `${day.date}: ${count} contributions`;
                    grid.appendChild(box);
                });
            })
            .catch(console.error);
    });
</script>
