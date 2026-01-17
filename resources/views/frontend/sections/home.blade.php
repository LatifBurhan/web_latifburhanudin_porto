<div class="w-full max-w-5xl z-10 flex flex-col md:flex-row items-center justify-between gap-10 md:gap-16">

    <div class="flex-1 text-center md:text-left order-2 md:order-1">

        <div
            class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-rail-card border border-white/5 shadow-neu-dark mb-6">
            <span class="relative flex h-2 w-2">
                <span
                    class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-2 w-2 bg-green-500"></span>
            </span>
            <span class="text-[10px] md:text-xs font-mono text-gray-400 tracking-wider">OPEN TO WORK</span>
        </div>

        <h1 class="text-5xl md:text-7xl font-bold tracking-tight text-text-main mb-4 leading-tight">
            Building <br>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-rail-accent to-rail-sweet">Digital
                Impact.</span>
        </h1>

        <div class="space-y-2 mb-8">
            <h2 class="text-xl md:text-2xl text-text-muted"> Hi, I'm <span class="text-rail-accent font-semibold">Latif
                    Burhanuddin</span>.
            </h2>
            <p class="text-text-muted text-sm md:text-base max-w-lg mx-auto md:mx-0 leading-relaxed">
                A passionate
                <span class="text-text-main font-medium">Front-End Developer</span> &
                <span class="text-text-main font-medium">UI/UX Designer</span>.
                Focusing on scalable web applications and intuitive design systems.
            </p>
        </div>

        <div class="flex flex-wrap justify-center md:justify-start gap-4 mb-10">
            <button @click="activeTab = 'works'"
                class="px-6 py-3 rounded-xl bg-rail-accent text-rail-dark font-bold shadow-[0_0_20px_rgba(102,252,241,0.3)] hover:shadow-[0_0_30px_rgba(102,252,241,0.5)] transition-all transform hover:-translate-y-1">
                View Projects
            </button>
            <button @click="activeTab = 'connect'"
                class="px-6 py-3 rounded-xl bg-rail-card text-text-muted shadow-neu-dark border border-border-soft hover:text-rail-accent transition-all transform hover:-translate-y-1 active:shadow-neu-dark-pressed">
                Contact Me
            </button>
        </div>

        <div class="space-y-3">
            <p class="text-xs font-mono text-gray-500 uppercase tracking-widest">Core Tech Stack</p>
            <div class="flex flex-wrap justify-center md:justify-start gap-3">
                <div
                    class="px-4 py-2 rounded-lg bg-rail-card border border-white/5 shadow-neu-dark text-xs text-gray-400 hover:text-red-500 transition-colors cursor-default">
                    Laravel
                </div>
                <div
                    class="px-4 py-2 rounded-lg bg-rail-card border border-white/5 shadow-neu-dark text-xs text-gray-400 hover:text-cyan-400 transition-colors cursor-default">
                    Tailwind CSS
                </div>
                <div
                    class="px-4 py-2 rounded-lg bg-rail-card border border-white/5 shadow-neu-dark text-xs text-gray-400 hover:text-blue-400 transition-colors cursor-default">
                    React
                </div>
                <div
                    class="px-4 py-2 rounded-lg bg-rail-card border border-white/5 shadow-neu-dark text-xs text-gray-400 hover:text-purple-400 transition-colors cursor-default">
                    Figma
                </div>
                <div
                    class="px-4 py-2 rounded-lg bg-rail-card border border-white/5 shadow-neu-dark text-xs text-gray-400 hover:text-orange-400 transition-colors cursor-default">
                    MySQL
                </div>
            </div>
        </div>
    </div>

    <div class="relative order-1 md:order-2 w-full md:w-auto flex justify-center">

        <div
            class="absolute inset-0 bg-gradient-to-tr from-rail-accent to-purple-600 rounded-full blur-[80px] opacity-20 animate-pulse">
        </div>

        <div
            class="relative w-64 h-64 md:w-80 md:h-80 rounded-[40px] bg-rail-card shadow-neu-dark border border-border-soft flex items-center justify-center p-2 z-10 overflow-hidden group">
            <img src="{{ asset('img/me.jpeg') }}" alt="Latif Burhanuddin"
                class="w-full h-full object-cover rounded-[32px] grayscale hover:grayscale-0 transition-all duration-500 group-hover:scale-105">

            <div class="absolute inset-0 rounded-[40px] border border-white/10 pointer-events-none"></div>
        </div>

        <div
            class="absolute -bottom-6 -right-4 md:-right-10 px-4 py-3 rounded-xl bg-black/60 backdrop-blur-md border border-white/10 shadow-2xl z-20 animate-[bounce_3s_infinite]">
            <div class="flex gap-1.5 mb-2">
                <div class="w-2 h-2 rounded-full bg-red-500"></div>
                <div class="w-2 h-2 rounded-full bg-yellow-500"></div>
                <div class="w-2 h-2 rounded-full bg-green-500"></div>
            </div>
            <pre class="text-[10px] font-mono leading-tight">
<span class="text-purple-400">const</span> <span class="text-yellow-200">developer</span> = {
  <span class="text-blue-300">name</span>: <span class="text-green-300">'Latif'</span>,
  <span class="text-blue-300">role</span>: <span class="text-green-300">'UI/UX Eng'</span>
};
            </pre>
        </div>

        <div
            class="absolute -top-6 -left-4 md:-left-10 p-3 rounded-xl bg-rail-card/80 backdrop-blur-md border border-white/10 shadow-neu-dark z-20">
            <svg class="w-8 h-8 text-rail-accent" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 2L2 7L12 12L22 7L12 2Z" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
                <path d="M2 17L12 22L22 17" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
                <path d="M2 12L12 17L22 12" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
        </div>

    </div>

</div>
