<div x-data="{
    category: 'website',
    selectedProject: null,

    // DATA PROJECT (Sesuaikan dengan data asli Anda)
    projects: [
        {
            id: 1,
            title: 'Desa Digital System',
            category: 'website',
            image: 'https://images.unsplash.com/photo-1517292987719-0369a794ec0f?q=80&w=1000&auto=format&fit=crop',
            desc: 'Sistem informasi manajemen administrasi desa untuk mempermudah pembuatan KTP, KK, dan surat pengantar secara online.',
            tech: ['Laravel', 'Bootstrap 5', 'MySQL'],
            links: { demo: '#', github: '#', figma: null }
        },
        {
            id: 2,
            title: 'Coffee Shop Mobile App',
            category: 'uiux',
            image: 'https://images.unsplash.com/photo-1555774698-0b77e0d5fac6?q=80&w=1000&auto=format&fit=crop',
            desc: 'Desain antarmuka aplikasi pemesanan kopi dengan fitur pickup dan delivery. Terinspirasi dari pengalaman saya sebagai Barista.',
            tech: ['Figma', 'Prototyping', 'User Research'],
            links: { demo: null, github: null, figma: '#' }
        },
        {
            id: 3,
            title: 'Karang Taruna Poster',
            category: 'graphic',
            image: 'https://images.unsplash.com/photo-1626785774573-4b7993125486?q=80&w=1000&auto=format&fit=crop',
            desc: 'Desain poster dan banner untuk event tahunan Karang Taruna Tunas Muda. Fokus pada tipografi bold dan warna energik.',
            tech: ['Canva', 'Photoshop'],
            links: { demo: '#', github: null, figma: null }
        },
        {
            id: 4,
            title: 'E-Commerce Dashboard',
            category: 'website',
            image: 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&w=1000&auto=format&fit=crop',
            desc: 'Dashboard admin untuk mengelola stok barang, pesanan masuk, dan laporan keuangan bulanan UMKM.',
            tech: ['React JS', 'Tailwind', 'Node JS'],
            links: { demo: '#', github: '#', figma: null }
        }
    ],


}" class="w-full max-w-6xl mx-auto px-6 md:px-8 pb-32"> <div class="text-center mb-12">
        <h2 class="text-3xl md:text-5xl font-bold text-text-main mb-6">
            Selected <span class="text-transparent bg-clip-text bg-gradient-to-r from-rail-accent to-rail-sweet">Projects.</span>
        </h2>

        <div class="inline-flex p-1.5 rounded-full bg-rail-card border border-border-soft shadow-neu-dark">
            <button @click="category = 'website'"
                    :class="category === 'website' ? 'bg-gradient-to-r from-rail-accent to-rail-sweet text-white shadow-lg' : 'text-text-muted hover:text-text-main'"
                    class="px-6 py-2 rounded-full text-sm font-medium transition-all duration-300">
                Website
            </button>
            <button @click="category = 'uiux'"
                    :class="category === 'uiux' ? 'bg-gradient-to-r from-rail-accent to-rail-sweet text-white shadow-lg' : 'text-text-muted hover:text-text-main'"
                    class="px-6 py-2 rounded-full text-sm font-medium transition-all duration-300">
                UI/UX
            </button>
            <button @click="category = 'graphic'"
                    :class="category === 'graphic' ? 'bg-gradient-to-r from-rail-accent to-rail-sweet text-white shadow-lg' : 'text-text-muted hover:text-text-main'"
                    class="px-6 py-2 rounded-full text-sm font-medium transition-all duration-300">
                Graphic
            </button>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-24">
        <template x-for="item in projects.filter(p => p.category === category)" :key="item.id">

            <div @click="selectedProject = item"
                 class="group relative rounded-[30px] bg-rail-card border border-border-soft shadow-neu-dark overflow-hidden cursor-pointer hover:-translate-y-2 hover:z-30 hover:shadow-xl transition-all duration-500">

                <div class="h-48 overflow-hidden relative">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent z-10 opacity-60 group-hover:opacity-40 transition-opacity"></div>
                    <img :src="item.image" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">

                    <div class="absolute inset-0 z-20 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <span class="px-4 py-2 bg-white/20 backdrop-blur-md border border-white/30 rounded-full text-white text-xs font-bold tracking-wider">
                            VIEW DETAILS
                        </span>
                    </div>
                </div>

                <div class="p-6">
                    <h3 x-text="item.title" class="text-xl font-bold text-text-main mb-2 line-clamp-1"></h3>
                    <p x-text="item.desc" class="text-sm text-text-muted line-clamp-2 mb-4"></p>

                    <div class="flex flex-wrap gap-2">
                        <template x-for="tech in item.tech.slice(0, 3)">
                            <span x-text="tech" class="text-[10px] px-2 py-1 rounded bg-rail-dark border border-border-soft text-rail-accent"></span>
                        </template>
                    </div>
                </div>
            </div>
        </template>
    </div>



    <div x-show="selectedProject"
         style="display: none;"
         class="fixed inset-0 z-[100] flex items-center justify-center px-4"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0">

        <div @click="selectedProject = null" class="absolute inset-0 bg-black/60 backdrop-blur-md"></div>

        <div class="relative w-full max-w-4xl bg-rail-card rounded-[40px] shadow-2xl border border-border-soft overflow-hidden flex flex-col md:flex-row max-h-[90vh]"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 scale-90 translate-y-10"
             x-transition:enter-end="opacity-100 scale-100 translate-y-0">

            <button @click="selectedProject = null" class="absolute top-4 right-4 z-50 p-2 bg-black/20 hover:bg-red-500/80 rounded-full text-white transition-colors backdrop-blur-sm">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>

            <div class="w-full md:w-1/2 h-64 md:h-auto bg-gray-900 relative">
                <img :src="selectedProject?.image" class="w-full h-full object-cover opacity-90">
                <div class="absolute inset-0 bg-gradient-to-t from-rail-card md:bg-gradient-to-r md:from-transparent md:to-rail-card"></div>
            </div>

            <div class="w-full md:w-1/2 p-8 md:p-10 flex flex-col overflow-y-auto">
                <span x-text="selectedProject?.category" class="inline-block w-fit px-3 py-1 rounded-full bg-rail-dark text-rail-sweet text-xs font-bold uppercase tracking-wider mb-4 border border-border-soft"></span>
                <h2 x-text="selectedProject?.title" class="text-3xl font-bold text-text-main mb-4 leading-tight"></h2>
                <p x-text="selectedProject?.desc" class="text-text-muted leading-relaxed mb-6"></p>

                <div class="mb-8">
                    <h4 class="text-sm font-bold text-text-main uppercase mb-3">Tools & Tech</h4>
                    <div class="flex flex-wrap gap-2">
                        <template x-for="tech in selectedProject?.tech">
                            <span x-text="tech" class="px-3 py-1.5 rounded-lg bg-rail-dark border border-rail-accent/20 text-rail-accent text-xs font-medium"></span>
                        </template>
                    </div>
                </div>

                <div class="mt-auto flex gap-4">
                    <template x-if="selectedProject?.links?.demo || selectedProject?.links?.figma">
                        <a :href="selectedProject?.links?.demo || selectedProject?.links?.figma" target="_blank"
                           class="flex-1 py-3 rounded-xl bg-gradient-to-r from-rail-accent to-rail-sweet text-white font-bold text-center shadow-lg hover:shadow-glow transition-all transform hover:-translate-y-1 flex items-center justify-center gap-2">
                            <svg x-show="selectedProject?.category === 'website'" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                            <svg x-show="selectedProject?.category !== 'website'" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                            <span x-text="selectedProject?.category === 'website' ? 'Live Demo' : 'View Design'"></span>
                        </a>
                    </template>
                    <template x-if="selectedProject?.links?.github">
                        <a :href="selectedProject?.links?.github" target="_blank"
                           class="flex-1 py-3 rounded-xl bg-rail-dark border border-border-soft text-text-muted font-bold text-center hover:text-text-main hover:border-rail-accent transition-all flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                            Source Code
                        </a>
                    </template>
                </div>
            </div>
        </div>
    </div>

</div>
