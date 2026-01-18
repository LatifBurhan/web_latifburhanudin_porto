@extends('layouts.app')

@section('content')
    <div x-data="{
            activeTab: 'home',
            tabs: ['home', 'about', 'works', 'dashboard', 'connect'],
            touchStartX: 0,
            touchEndX: 0,

            // Fungsi Ganti Tab
            switchTab(target) {
                this.activeTab = target;
                window.scrollTo({ top: 0, behavior: 'smooth' });
            },

            // Logic Swipe HP
            handleTouchStart(e) { this.touchStartX = e.changedTouches[0].screenX; },
            handleTouchEnd(e) {
                this.touchEndX = e.changedTouches[0].screenX;
                this.handleSwipe();
            },
            handleSwipe() {
                let limit = 50;
                let swipeDist = this.touchEndX - this.touchStartX;
                let currentIndex = this.tabs.indexOf(this.activeTab);

                if (swipeDist < -limit) { // Geser Kiri -> Next
                    if (currentIndex < this.tabs.length - 1) this.switchTab(this.tabs[currentIndex + 1]);
                } else if (swipeDist > limit) { // Geser Kanan -> Prev
                    if (currentIndex > 0) this.switchTab(this.tabs[currentIndex - 1]);
                }
            }
        }"
        @touchstart="handleTouchStart"
        @touchend="handleTouchEnd"
        class="relative w-full h-full min-h-screen overflow-hidden">
        <main class="relative w-full h-screen flex flex-col items-center">

            <div x-show="activeTab === 'home'"
                 style="display: none;"
                 class="absolute inset-0 w-full h-full flex items-center justify-center z-10"
                 x-transition:enter="transition ease-out duration-500 delay-200"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100 scale-100"
                 x-transition:leave-end="opacity-0 scale-95">

                 <div class="w-full max-w-6xl px-6">
                     @include('frontend.sections.home')
                 </div>
            </div>

            <div x-show="activeTab === 'about'"
                 style="display: none;"
                 class="absolute inset-0 w-full h-full overflow-y-auto no-scrollbar pb-32 pt-10 z-10"
                 x-transition:enter="transition ease-out duration-500 delay-200"
                 x-transition:enter-start="opacity-0 translate-y-4"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100 translate-y-0"
                 x-transition:leave-end="opacity-0 -translate-y-4">

                 @include('frontend.sections.about')
            </div>

            <div x-show="activeTab === 'works'"
                 style="display: none;"
                 class="absolute inset-0 w-full h-full overflow-y-auto no-scrollbar pb-32 pt-10 z-10"
                 x-transition:enter="transition ease-out duration-500 delay-200"
                 x-transition:enter-start="opacity-0 translate-y-4"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100 translate-y-0"
                 x-transition:leave-end="opacity-0 -translate-y-4">

                 @include('frontend.sections.projects')
            </div>

            <div x-show="activeTab === 'dashboard'"
                 style="display: none;"
                 class="absolute inset-0 w-full h-full overflow-y-auto no-scrollbar pb-32 pt-10 z-10"
                 x-transition:enter="transition ease-out duration-500 delay-200"
                 x-transition:enter-start="opacity-0 translate-y-4"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100 translate-y-0"
                 x-transition:leave-end="opacity-0 -translate-y-4">

                 @include('frontend.sections.dashboard')
            </div>

            <div x-show="activeTab === 'connect'"
                 style="display: none;"
                 class="absolute inset-0 w-full h-full overflow-y-auto no-scrollbar pb-32 pt-10 z-10"
                 x-transition:enter="transition ease-out duration-500 delay-200"
                 x-transition:enter-start="opacity-0 translate-y-4"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100 translate-y-0"
                 x-transition:leave-end="opacity-0 -translate-y-4">

                 @include('frontend.sections.connect')
            </div>

        </main>

        @include('partials.frontend.bottombar')

    </div>
@endsection
