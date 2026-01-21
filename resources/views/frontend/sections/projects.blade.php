<div x-data="{

    category: 'website',

    selectedProject: null,



    // 1. INJECT DATA DARI DATABASE KE ALPINE JS

    // Kita gunakan map untuk memperbaiki URL gambar agar bisa dibaca browser

    projects: {{ Js::from($projects) }}.map(project => ({

        ...project,

        image: '/storage/' + project.image // Tambah prefix storage

    }))



}" class="w-full max-w-6xl mx-auto px-6 md:px-8 pb-32" id="works">



    <div class="text-center mb-12">

        <h2 class="text-3xl md:text-5xl font-bold text-text-main mb-6">

            Selected <span

                class="text-transparent bg-clip-text bg-gradient-to-r from-rail-accent to-rail-sweet">Projects.</span>

        </h2>



        <div

            class="inline-flex p-1.5 rounded-full bg-rail-card border border-border-soft shadow-neu-dark flex-wrap justify-center gap-2">

            <button @click="category = 'all'"

                :class="category === 'all' ? 'bg-gradient-to-r from-rail-accent to-rail-sweet text-white shadow-lg' :

                    'text-text-muted hover:text-text-main'"

                class="px-6 py-2 rounded-full text-sm font-medium transition-all duration-300">

                All

            </button>



            <button @click="category = 'website'"

                :class="category === 'website' ? 'bg-gradient-to-r from-rail-accent to-rail-sweet text-white shadow-lg' :

                    'text-text-muted hover:text-text-main'"

                class="px-6 py-2 rounded-full text-sm font-medium transition-all duration-300">

                Website

            </button>

            <button @click="category = 'uiux'"

                :class="category === 'uiux' ? 'bg-gradient-to-r from-rail-accent to-rail-sweet text-white shadow-lg' :

                    'text-text-muted hover:text-text-main'"

                class="px-6 py-2 rounded-full text-sm font-medium transition-all duration-300">

                UI/UX

            </button>

            <button @click="category = 'graphic'"

                :class="category === 'graphic' ? 'bg-gradient-to-r from-rail-accent to-rail-sweet text-white shadow-lg' :

                    'text-text-muted hover:text-text-main'"

                class="px-6 py-2 rounded-full text-sm font-medium transition-all duration-300">

                Graphic

            </button>

        </div>

    </div>



    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-24">

        <template x-for="item in projects.filter(p => category === 'all' || p.category === category)"

            :key="item.id">



            <div @click="selectedProject = item"

                class="group relative rounded-[30px] bg-rail-card border border-border-soft shadow-neu-dark overflow-hidden cursor-pointer hover:-translate-y-2 hover:z-30 hover:shadow-xl transition-all duration-500">



                <div class="h-48 overflow-hidden relative">

                    <div

                        class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent z-10 opacity-60 group-hover:opacity-40 transition-opacity">

                    </div>

                    <img :src="item.image"

                        class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">



                    <div

                        class="absolute inset-0 z-20 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">

                        <span

                            class="px-4 py-2 bg-white/20 backdrop-blur-md border border-white/30 rounded-full text-white text-xs font-bold tracking-wider">

                            VIEW DETAILS

                        </span>

                    </div>



                    <span

                        class="absolute top-3 right-3 z-20 px-2 py-1 bg-black/50 backdrop-blur-sm rounded text-[10px] font-bold text-white uppercase"

                        x-text="item.category"></span>

                </div>



                <div class="p-6">

                    <h3 x-text="item.title" class="text-xl font-bold text-text-main mb-2 line-clamp-1"></h3>

                    <p x-text="item.description" class="text-sm text-text-muted line-clamp-2 mb-4"></p>



                    <div class="flex flex-wrap gap-2">

                        <template x-for="tech in item.tech_stack?.slice(0, 3) || []">

                            <span x-text="tech"

                                class="text-[10px] px-2 py-1 rounded bg-rail-dark border border-border-soft text-rail-accent"></span>

                        </template>

                    </div>

                </div>

            </div>

        </template>

    </div>





    <div x-show="selectedProject" style="display: none;"

    class="fixed inset-0 z-[100] flex items-center justify-center p-4 sm:p-6"

    x-transition:enter="transition ease-out duration-300"

    x-transition:enter-start="opacity-0"

    x-transition:enter-end="opacity-100"

    x-transition:leave="transition ease-in duration-200"

    x-transition:leave-start="opacity-100"

    x-transition:leave-end="opacity-0">



    <div @click="selectedProject = null" class="absolute inset-0 bg-black/90 backdrop-blur-sm"></div>



    <div class="relative w-full max-w-6xl bg-rail-card rounded-[30px] shadow-2xl border border-white/10 overflow-hidden flex flex-col lg:flex-row max-h-[90vh] lg:h-[600px]"

        x-transition:enter="transition ease-out duration-300"

        x-transition:enter-start="opacity-0 scale-95 translate-y-10"

        x-transition:enter-end="opacity-100 scale-100 translate-y-0">



        <button @click="selectedProject = null"

            class="absolute top-4 right-4 z-50 p-2 bg-black/50 hover:bg-red-500 text-white rounded-full transition-all border border-white/20 backdrop-blur-md group">

            <svg class="w-6 h-6 group-hover:rotate-90 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>

            </svg>

        </button>



        <div class="w-full lg:w-[55%] h-64 lg:h-full bg-gray-900 relative group shrink-0">

            <img :src="selectedProject?.image" class="w-full h-full object-cover opacity-90 transition-opacity hover:opacity-100">

            <div class="absolute inset-0 bg-gradient-to-t from-rail-card via-transparent to-transparent lg:bg-gradient-to-r lg:from-transparent lg:to-rail-card"></div>

        </div>



        <div class="w-full lg:w-[45%] flex flex-col bg-rail-card">



            <div class="p-8 lg:p-10 overflow-y-auto custom-scrollbar flex-1">



                <span x-text="selectedProject?.category"

                    class="inline-block px-3 py-1 rounded-full bg-rail-dark text-rail-sweet text-xs font-bold uppercase tracking-wider mb-5 border border-white/10">

                </span>



                <h2 x-text="selectedProject?.title" class="text-3xl md:text-4xl font-bold text-white mb-4 leading-tight"></h2>



                <p x-text="selectedProject?.description" class="text-gray-400 leading-relaxed text-base mb-8"></p>



                <div class="mb-6">

                    <h4 class="text-sm font-bold text-gray-300 uppercase mb-3 flex items-center gap-2">

                        <svg class="w-4 h-4 text-rail-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>

                        Technologies

                    </h4>

                    <div class="flex flex-wrap gap-2">

                        <template x-for="tech in selectedProject?.tech_stack">

                            <span x-text="tech"

                                class="px-3 py-1.5 rounded-lg bg-white/5 border border-white/10 text-rail-accent text-sm font-medium hover:bg-white/10 transition-colors">

                            </span>

                        </template>

                    </div>

                </div>

            </div>



            <div class="p-6 lg:p-8 border-t border-white/5 bg-rail-card/50 backdrop-blur-sm mt-auto">

                <div class="flex flex-col sm:flex-row gap-3">



                    <template x-if="selectedProject?.link_demo">

                        <a :href="selectedProject?.link_demo" target="_blank"

                           class="flex-1 py-3 px-4 rounded-xl bg-gradient-to-r from-rail-accent to-rail-sweet text-white font-bold text-center shadow-lg hover:shadow-purple-500/30 transition-all hover:-translate-y-1 flex items-center justify-center gap-2">

                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>

                            <span>Live Demo</span>

                        </a>

                    </template>



                    <template x-if="selectedProject?.link_github">

                        <a :href="selectedProject?.link_github" target="_blank"

                           class="flex-1 py-3 px-4 rounded-xl bg-white/5 border border-white/10 text-gray-300 font-bold text-center hover:bg-white/10 hover:text-white transition-all flex items-center justify-center gap-2">

                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>

                            <span>Code</span>

                        </a>

                    </template>



                    <template x-if="selectedProject?.link_figma">

                        <a :href="selectedProject?.link_figma" target="_blank"

                           class="flex-1 py-3 px-4 rounded-xl bg-white/5 border border-white/10 text-gray-300 font-bold text-center hover:bg-white/10 hover:text-pink-400 transition-all flex items-center justify-center gap-2">

                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 12.536L12 9 8.464 12.536 12 16.071 15.536 12.536z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9V5.464L15.536 9 12 12.536z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9H8.464L12 5.464z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 16.071L8.464 12.536 12 16.071z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.464 12.536L5 9l3.464-3.536L12 9z" /></svg>

                            <span>Design</span>

                        </a>

                    </template>

                </div>

            </div>



        </div>

    </div>

</div>

</div>

