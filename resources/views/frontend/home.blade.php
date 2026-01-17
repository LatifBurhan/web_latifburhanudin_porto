@extends('layouts.app')

@section('content')
    <div x-data="{ activeTab: 'home' }" class="relative w-full h-full flex flex-col items-center justify-center">

        <main class="relative w-full max-w-6xl h-[85vh] flex items-center justify-center px-6">

            <div x-show="activeTab === 'home'" x-transition:enter="transition ease-out duration-500"
                x-transition:enter-start="opacity-0 scale-95 translate-x-10"
                x-transition:enter-end="opacity-100 scale-100 translate-x-0"
                class="absolute inset-0 flex items-center justify-center">
                @include('frontend.sections.home')
            </div>

            <div x-show="activeTab === 'about'" style="display: none;" x-transition:enter="transition ease-out duration-500"
                x-transition:enter-start="opacity-0 scale-95 translate-x-10"
                x-transition:enter-end="opacity-100 scale-100 translate-x-0"
                class="absolute inset-0 overflow-y-auto no-scrollbar pb-32 pt-10">
            </div>

            <div x-show="activeTab === 'works'" style="display: none;" x-transition:enter="transition ease-out duration-500"
                x-transition:enter-start="opacity-0 scale-95 translate-x-10"
                x-transition:enter-end="opacity-100 scale-100 translate-x-0"
                class="absolute inset-0 overflow-y-auto no-scrollbar pb-32 pt-10">

                @include('frontend.sections.projects')

            </div>

            <div x-show="activeTab === 'dashboard'" style="display: none;"
                x-transition:enter="transition ease-out duration-500"
                x-transition:enter-start="opacity-0 scale-95 translate-x-10"
                x-transition:enter-end="opacity-100 scale-100 translate-x-0"
                class="absolute inset-0 overflow-y-auto no-scrollbar pb-32 pt-10">

                @include('frontend.sections.dashboard')

            </div>

            <div x-show="activeTab === 'connect'" style="display: none;"
                x-transition:enter="transition ease-out duration-500"
                x-transition:enter-start="opacity-0 scale-95 translate-x-10"
                x-transition:enter-end="opacity-100 scale-100 translate-x-0"
                class="absolute inset-0 overflow-y-auto no-scrollbar pb-32 pt-10">
                <h1 class="text-3xl font-bold text-center text-rail-light">Hubungi Saya</h1>
            </div>

            <div x-show="activeTab === 'about'" style="display: none;" x-transition:enter="transition ease-out duration-500"
                x-transition:enter-start="opacity-0 scale-95 translate-x-10"
                x-transition:enter-end="opacity-100 scale-100 translate-x-0"
                class="absolute inset-0 overflow-y-auto no-scrollbar pb-32 pt-10">

                @include('frontend.sections.about')

            </div>



        </main>

        @include('partials.frontend.bottombar')

    </div>
@endsection
