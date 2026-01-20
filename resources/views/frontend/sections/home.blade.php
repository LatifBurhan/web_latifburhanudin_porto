<div class="w-full max-w-6xl z-10 grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">

    <div
        class="lg:col-span-7 text-center lg:text-left order-2 lg:order-1 relative z-10 flex flex-col items-center lg:items-start">

        <div
            class="absolute -top-20 -left-20 w-72 h-72 bg-purple-600/10 dark:bg-purple-600/20 rounded-full blur-[100px] pointer-events-none">
        </div>
        <div
            class="absolute top-20 right-20 w-64 h-64 bg-pink-500/10 dark:bg-pink-500/10 rounded-full blur-[80px] pointer-events-none">
        </div>

        <div
            class="inline-flex items-center gap-2 px-4 py-2 rounded-full
                    bg-gray-100 border border-gray-200 text-gray-600
                    dark:bg-white/5 dark:border-white/10 dark:text-gray-300
                    backdrop-blur-md shadow-sm dark:shadow-lg mb-6 group hover:bg-gray-200 dark:hover:bg-white/10 transition-all duration-300">
            <span class="relative flex h-2.5 w-2.5">
                <span
                    class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                <span
                    class="relative inline-flex rounded-full h-2.5 w-2.5 bg-green-500 shadow-[0_0_10px_#22c55e]"></span>
            </span>
            <span
                class="text-[11px] md:text-xs font-mono tracking-widest group-hover:text-gray-900 dark:group-hover:text-white transition-colors">
                AVAILABLE FOR HIRE
            </span>
        </div>

        <h1
            class="text-4xl md:text-6xl lg:text-7xl font-black tracking-tight text-gray-900 dark:text-white mb-6 leading-[1.1]">
            Building <br>
            <span class="relative inline-block">
                <span
                    class="text-transparent bg-clip-text bg-gradient-to-r from-purple-600 via-pink-500 to-red-500 dark:from-purple-400 dark:via-pink-500 dark:to-red-500 animate-gradient-x bg-[length:200%_auto]">
                    Digital Impact.
                </span>
                <svg class="absolute -bottom-1 left-0 w-full h-2 text-purple-500/30 dark:text-purple-500/50"
                    viewBox="0 0 100 10" preserveAspectRatio="none">
                    <path d="M0 5 Q 50 10 100 5" stroke="currentColor" stroke-width="2" fill="none" />
                </svg>
            </span>
        </h1>

        <div class="space-y-4 mb-8 relative">
            <h2 class="text-lg md:text-2xl text-gray-600 dark:text-gray-400 font-light">
                Hi, I'm <span
                    class="text-gray-900 dark:text-white font-bold decoration-wavy decoration-purple-500/50 underline-offset-4 hover:underline transition-all">Latif
                    Burhanuddin</span>.
            </h2>
            <p class="text-gray-600 dark:text-gray-400 text-sm md:text-base lg:text-lg max-w-lg leading-relaxed">
                Crafting experiences as a
                <span
                    class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-600 to-blue-600 dark:from-cyan-400 dark:to-blue-500 font-bold">Front-End
                    Developer</span> &
                <span
                    class="text-transparent bg-clip-text bg-gradient-to-r from-pink-600 to-rose-600 dark:from-pink-400 dark:to-rose-500 font-bold">UI/UX
                    Designer</span>.
                Transforming complex problems into intuitive solutions.
            </p>
        </div>

        <div class="flex flex-wrap justify-center lg:justify-start gap-4 mb-10">
            <button @click="switchTab('works')"
                class="group relative px-6 py-3 md:px-8 md:py-3.5 rounded-2xl bg-gradient-to-r from-purple-600 to-pink-600 text-white font-bold shadow-[0_10px_20px_-10px_rgba(168,85,247,0.4)] dark:shadow-[0_10px_40px_-10px_rgba(168,85,247,0.6)] hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 overflow-hidden">
                <div
                    class="absolute inset-0 w-full h-full bg-gradient-to-r from-transparent via-white/20 to-transparent -translate-x-full group-hover:animate-[shine_1.5s_infinite]">
                </div>
                <span class="relative flex items-center gap-2 text-sm md:text-base">
                    View Projects
                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </span>
            </button>

            <button @click="switchTab('connect')"
                class="group px-6 py-3 md:px-8 md:py-3.5 rounded-2xl
                       bg-white border border-gray-200 text-gray-600 hover:bg-gray-50 hover:text-gray-900
                       dark:bg-white/5 dark:border-white/10 dark:text-gray-300 dark:hover:bg-white/10 dark:hover:text-white
                       font-medium transition-all duration-300 transform hover:-translate-y-1">
                <span class="flex items-center gap-2 text-sm md:text-base">
                    Contact Me
                    <svg class="w-4 h-4 opacity-0 group-hover:opacity-100 -translate-x-2 group-hover:translate-x-0 transition-all"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                        </path>
                    </svg>
                </span>
            </button>
        </div>
    </div>

    <div class="lg:col-span-5 relative order-1 lg:order-2 w-full flex justify-center lg:justify-end">

        <div
            class="absolute inset-0 bg-gradient-to-tr from-purple-500 to-pink-500 rounded-full blur-[80px] opacity-20 dark:opacity-20 animate-pulse">
        </div>

        <div
            class="relative w-64 h-64 md:w-80 md:h-80 lg:w-96 lg:h-96 rounded-[40px]
                    bg-white border border-gray-200 shadow-2xl
                    dark:bg-rail-card dark:border-white/10 dark:shadow-neu-dark
                    flex items-center justify-center p-2 z-10 overflow-hidden group transition-colors duration-300">

            <img src="{{ asset('img/me.jpeg') }}" alt="Latif Burhanuddin"
                class="w-full h-full object-cover rounded-[32px] grayscale hover:grayscale-0 transition-all duration-500 group-hover:scale-105">

            <div class="absolute inset-0 rounded-[40px] border border-black/5 dark:border-white/10 pointer-events-none">
            </div>
        </div>

        <div
            class="absolute -bottom-4 right-4 lg:-right-4 px-4 py-3 rounded-xl
                    bg-white/90 border border-gray-200 text-gray-800 shadow-xl
                    dark:bg-black/60 dark:border-white/10 dark:text-gray-200 dark:shadow-2xl
                    backdrop-blur-md z-20 animate-[bounce_3s_infinite]">
            <div class="flex gap-1.5 mb-2">
                <div class="w-2 h-2 rounded-full bg-red-500"></div>
                <div class="w-2 h-2 rounded-full bg-yellow-500"></div>
                <div class="w-2 h-2 rounded-full bg-green-500"></div>
            </div>
            <pre class="text-[10px] font-mono leading-tight">
<span class="text-purple-600 dark:text-purple-400">const</span> <span class="text-yellow-600 dark:text-yellow-200">dev</span> = {
  <span class="text-blue-600 dark:text-blue-300">name</span>: <span class="text-green-600 dark:text-green-300">'Latif'</span>,
  <span class="text-blue-600 dark:text-blue-300">role</span>: <span class="text-green-600 dark:text-green-300">'UI/UX'</span>
};
            </pre>
        </div>

        <div
            class="absolute -top-4 left-4 lg:left-0 p-3 rounded-xl
            bg-white/90 border border-gray-200 shadow-lg
            dark:bg-rail-card/80 dark:border-white/10 dark:shadow-neu-dark
            backdrop-blur-md z-20
            animate-[bounce_4s_infinite]">

            <svg class="w-8 h-8 text-pink-600 dark:text-purple-400" viewBox="0 0 24 24" fill="none"
                xmlns="http://www.w3.org/2000/svg">
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
