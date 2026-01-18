<div class="w-full max-w-6xl mx-auto px-4 pb-32">

    <div class="mb-12 flex flex-col md:flex-row md:items-end justify-between gap-4">
        <div>
            <h2 class="text-3xl md:text-5xl font-bold text-text-main">
                Coding
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-rail-accent to-rail-sweet">
                    Metrics.
                </span>
            </h2>
            <p class="text-text-muted mt-2">
                Tracked via GitHub & Monkeytype API.
            </p>
        </div>
    </div>

    <div class="mb-12">
        <div class="flex items-center gap-3 mb-6">
            <div class="p-2 rounded-lg bg-rail-accent/10 text-rail-accent border border-rail-accent/20">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
            </div>
            <h3 class="text-lg font-bold text-white">GitHub Activity</h3>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
            <div class="p-6 rounded-[24px] bg-rail-card border border-border-soft shadow-neu-dark">
                <p class="text-gray-400 text-xs uppercase tracking-wider font-bold">Total Contributions</p>
                <div id="gh-loading" class="animate-pulse h-8 w-24 bg-white/10 rounded mt-2"></div>
                <p id="totalContributions" class="text-4xl font-black text-white mt-2 hidden">-</p>
                <p class="text-xs text-rail-accent mt-1">Last Year</p>
            </div>

            <div class="p-6 rounded-[24px] bg-rail-card border border-border-soft shadow-neu-dark">
                <p class="text-gray-400 text-xs uppercase tracking-wider font-bold">Daily Average</p>
                <div id="gh-loading-2" class="animate-pulse h-8 w-24 bg-white/10 rounded mt-2"></div>
                <p id="dailyAverage" class="text-4xl font-black text-white mt-2 hidden">-</p>
                <p class="text-xs text-rail-sweet mt-1">Commits / Day</p>
            </div>

            <div class="md:col-span-1 p-6 rounded-[24px] bg-rail-card border border-border-soft shadow-neu-dark flex flex-col justify-center">
                <p class="text-gray-400 text-xs uppercase tracking-wider font-bold mb-4">Activity Graph</p>
                <div id="contributionGrid" class="flex gap-1 overflow-hidden h-16 items-center opacity-50">
                    </div>
            </div>
        </div>
    </div>

    <div>
        <div class="flex items-center gap-3 mb-6">
            <div class="p-2 rounded-lg bg-yellow-500/10 text-yellow-500 border border-yellow-500/20">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.384-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
            </div>
            <h3 class="text-lg font-bold text-white">Typing Speed</h3>
        </div>

        <div id="mt-loading" class="text-gray-400 animate-pulse">Loading Monkeytype data...</div>

        <div id="mt-stats" class="hidden grid grid-cols-1 md:grid-cols-4 gap-6">
            <div class="p-6 rounded-[24px] bg-rail-card border border-border-soft shadow-neu-dark group hover:border-rail-accent transition-all">
                <p class="text-gray-400 text-xs uppercase tracking-wider font-bold">15s Sprint</p>
                <div class="flex items-baseline gap-1 mt-2">
                    <p id="wpm15" class="text-4xl font-black text-white">-</p>
                    <span class="text-sm text-rail-accent font-bold">WPM</span>
                </div>
                <div class="w-full bg-rail-dark h-1 mt-3 rounded-full overflow-hidden">
                    <div id="acc15-bar" class="h-full bg-rail-accent w-0 transition-all duration-1000"></div>
                </div>
            </div>

            <div class="p-6 rounded-[24px] bg-rail-card border border-border-soft shadow-neu-dark group hover:border-rail-sweet transition-all">
                <p class="text-gray-400 text-xs uppercase tracking-wider font-bold">60s Endurance</p>
                <div class="flex items-baseline gap-1 mt-2">
                    <p id="wpm60" class="text-4xl font-black text-white">-</p>
                    <span class="text-sm text-rail-sweet font-bold">WPM</span>
                </div>
                <div class="w-full bg-rail-dark h-1 mt-3 rounded-full overflow-hidden">
                    <div id="acc60-bar" class="h-full bg-rail-sweet w-0 transition-all duration-1000"></div>
                </div>
            </div>

            <div class="p-6 rounded-[24px] bg-rail-card border border-border-soft shadow-neu-dark">
                <p class="text-gray-400 text-xs uppercase tracking-wider font-bold">Total Tests</p>
                <p id="totalTests" class="text-4xl font-black text-white mt-2">-</p>
                <p class="text-xs text-yellow-500 mt-1">Tests Completed</p>
            </div>

            <div class="p-6 rounded-[24px] bg-rail-card border border-border-soft shadow-neu-dark">
                <p class="text-gray-400 text-xs uppercase tracking-wider font-bold">Experience</p>
                <p id="timeTyping" class="text-4xl font-black text-white mt-2">-</p>
                <p class="text-xs text-gray-500 mt-1">Hours Typing</p>
            </div>
        </div>
    </div>

</div>

<script>
    // --- 1. FETCH MONKEYTYPE ---
    fetch("/api/monkeytype")
        .then(res => res.json())
        .then(data => {
            const pbs = data.pbs.data; // Data Personal Bests
            const stats = data.stats.data; // Data Statistik Umum

            // Helper untuk mengambil WPM (Safety check pakai ?.)
            const wpm15 = pbs["15"]?.[0]?.wpm ? Math.round(pbs["15"][0].wpm) : "-";
            const acc15 = pbs["15"]?.[0]?.acc ? Math.round(pbs["15"][0].acc) : 0;

            const wpm60 = pbs["60"]?.[0]?.wpm ? Math.round(pbs["60"][0].wpm) : "-";
            const acc60 = pbs["60"]?.[0]?.acc ? Math.round(pbs["60"][0].acc) : 0;

            // Update DOM
            document.getElementById("wpm15").innerText = wpm15;
            document.getElementById("acc15-bar").style.width = acc15 + "%";

            document.getElementById("wpm60").innerText = wpm60;
            document.getElementById("acc60-bar").style.width = acc60 + "%";

            document.getElementById("totalTests").innerText = stats.completedTests.toLocaleString();

            // Hitung Jam Mengetik (timeTyping dalam detik)
            const hours = (stats.timeTyping / 3600).toFixed(1);
            document.getElementById("timeTyping").innerText = hours;

            // Tampilkan Container
            document.getElementById("mt-loading").classList.add("hidden");
            document.getElementById("mt-stats").classList.remove("hidden");
        })
        .catch(err => {
            console.error(err);
            document.getElementById("mt-loading").innerText = "Failed to load Monkeytype data.";
        });

    // --- 2. FETCH GITHUB ---
    fetch("https://github-contributions-api.jogruber.de/v4/LatifBurhan?y=last")
        .then(res => res.json())
        .then(data => {
            const total = data.total.lastYear;
            const daily = (total / 365).toFixed(1);

            document.getElementById("totalContributions").innerText = total;
            document.getElementById("dailyAverage").innerText = daily;

            // Hapus Loading
            document.getElementById("gh-loading").classList.add("hidden");
            document.getElementById("gh-loading-2").classList.add("hidden");
            document.getElementById("totalContributions").classList.remove("hidden");
            document.getElementById("dailyAverage").classList.remove("hidden");

            // Generate Mini Graph (Hanya ambil 30 hari terakhir biar rapi)
            const grid = document.getElementById("contributionGrid");
            const last30Days = data.contributions.slice(-30);

            last30Days.forEach(day => {
                const count = day.count;
                let color = "bg-white/5"; // Default (0 kontribusi)
                // Ubah warna jadi UNGU (Theme Rail)
                if (count > 0) color = "bg-purple-900";
                if (count > 3) color = "bg-purple-700";
                if (count > 6) color = "bg-purple-500";
                if (count > 10) color = "bg-purple-400";

                const cell = document.createElement("div");
                cell.className = `w-2 h-8 rounded-sm ${color}`;
                cell.title = `${day.date}: ${count} contributions`;
                grid.appendChild(cell);
            });
        });
</script>
