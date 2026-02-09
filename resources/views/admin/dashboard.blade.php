@extends('layouts.admin')

@section('content')

{{-- 1. Wrapper Utama Alpine JS (Membungkus SEISI HALAMAN) --}}
{{-- Kita pasang x-data disini supaya variabel 'showPasswordModal' bisa diakses DIMANA SAJA di halaman ini --}}
<div x-data="{ showPasswordModal: {{ $errors->any() ? 'true' : 'false' }} }" class="p-6 relative">

    {{-- HEADER & TOMBOL GANTI PASSWORD --}}
    <div class="mb-8 flex flex-col sm:flex-row sm:items-end justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-gray-800 dark:text-white">Hallo Latif</h1>
            <p class="text-gray-500 dark:text-gray-400 mt-1">Welcome back, here is your portfolio summary.</p>
        </div>

        {{-- Tombol Trigger Modal (Sekarang pasti berfungsi karena ada di dalam scope x-data utama) --}}
        <button type="button"
                @click="showPasswordModal = true"
                class="px-4 py-2 bg-rail-dark border border-white/10 rounded-xl text-sm font-bold text-white hover:bg-rail-accent hover:border-rail-accent transition-all flex items-center gap-2 shadow-lg cursor-pointer z-50">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path></svg>
            Ganti Password
        </button>
    </div>

    {{-- STATISTIK CARDS --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8 relative z-10">
        {{-- Card 1: Projects --}}
        <a href="{{ route('admin.projects.index') }}" class="group block p-6 bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-200 dark:border-gray-700 hover:border-indigo-500 dark:hover:border-indigo-500 transition-all duration-300">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-indigo-50 dark:bg-indigo-500/10 rounded-xl text-indigo-600 dark:text-indigo-400 group-hover:bg-indigo-600 group-hover:text-white transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                </div>
                <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Projects</span>
            </div>
            <div class="flex items-baseline gap-2">
                <h3 class="text-3xl font-black text-gray-900 dark:text-white">{{ $totalProjects ?? 0 }}</h3>
                <span class="text-sm text-gray-500">Items</span>
            </div>
        </a>

        {{-- Card 2: Certificates --}}
        <a href="{{ route('admin.certificates.index') }}" class="group block p-6 bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-200 dark:border-gray-700 hover:border-yellow-500 dark:hover:border-yellow-500 transition-all duration-300">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-yellow-50 dark:bg-yellow-500/10 rounded-xl text-yellow-600 dark:text-yellow-400 group-hover:bg-yellow-500 group-hover:text-white transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>
                </div>
                <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Certificates</span>
            </div>
            <div class="flex items-baseline gap-2">
                <h3 class="text-3xl font-black text-gray-900 dark:text-white">{{ $totalCertificates ?? 0 }}</h3>
                <span class="text-sm text-gray-500">Awards</span>
            </div>
        </a>

        {{-- Card 3: Experiences --}}
        <a href="{{ route('admin.experiences.index') }}" class="group block p-6 bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-200 dark:border-gray-700 hover:border-blue-500 dark:hover:border-blue-500 transition-all duration-300">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-blue-50 dark:bg-blue-500/10 rounded-xl text-blue-600 dark:text-blue-400 group-hover:bg-blue-600 group-hover:text-white transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                </div>
                <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Experiences</span>
            </div>
            <div class="flex items-baseline gap-2">
                <h3 class="text-3xl font-black text-gray-900 dark:text-white">{{ $totalExperiences ?? 0 }}</h3>
                <span class="text-sm text-gray-500">Positions</span>
            </div>
        </a>

        {{-- Card 4: Downloads --}}
        <a href="{{ route('admin.resumes.index') }}" class="group block p-6 bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-200 dark:border-gray-700 hover:border-emerald-500 dark:hover:border-emerald-500 transition-all duration-300">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-emerald-50 dark:bg-emerald-500/10 rounded-xl text-emerald-600 dark:text-emerald-400 group-hover:bg-emerald-600 group-hover:text-white transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                </div>
                <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">CV Downloads</span>
            </div>
            <div class="flex items-baseline gap-2">
                <h3 class="text-3xl font-black text-gray-900 dark:text-white">{{ $totalDownloads ?? 0 }}</h3>
                <span class="text-sm text-gray-500">Times</span>
            </div>
        </a>
    </div>

    {{-- QUICK ACTIONS & STATUS --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 relative z-10">
        <div class="p-6 bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-200 dark:border-gray-700">
            <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-4">Quick Actions</h3>
            <div class="flex flex-wrap gap-3">
                <a href="{{ route('admin.projects.create') }}" class="px-4 py-2 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-indigo-600 hover:text-white transition text-sm font-medium">
                    + Add Project
                </a>
                <a href="{{ route('admin.certificates.create') }}" class="px-4 py-2 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-yellow-500 hover:text-white transition text-sm font-medium">
                    + Add Certificate
                </a>
                <a href="{{ route('admin.resumes.index') }}" class="px-4 py-2 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-emerald-600 hover:text-white transition text-sm font-medium">
                    Manage CV
                </a>
            </div>
        </div>

        <div class="p-6 bg-gradient-to-br from-indigo-600 to-purple-700 rounded-2xl shadow-lg text-white">
            <h3 class="text-lg font-bold mb-2">Portfolio Status</h3>
            <p class="text-indigo-100 text-sm mb-4">Your portfolio is currently live and active.</p>
            <div class="flex items-center gap-2 text-xs bg-white/10 w-fit px-3 py-1 rounded-full">
                <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span>
                System Healthy
            </div>
        </div>
    </div>

    {{-- MODAL GANTI PASSWORD (PAKAI TELEPORT) --}}
    <template x-teleport="body">
        <div x-show="showPasswordModal" style="display: none;"
            class="fixed inset-0 z-[9999] flex items-center justify-center p-4 bg-black/80 backdrop-blur-sm"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0">

            {{-- Card Modal --}}
            <div @click.away="showPasswordModal = false"
                class="bg-rail-card w-full max-w-md rounded-2xl border border-white/10 shadow-2xl p-6 relative transform transition-all"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100">

                <h3 class="text-xl font-bold text-white mb-1">Ganti Password</h3>
                <p class="text-gray-400 text-sm mb-6">Amankan akun admin portfolio Anda.</p>

                {{-- Alert Sukses --}}
                @if(session('success'))
                    <div class="mb-4 p-3 bg-green-500/10 border border-green-500/20 text-green-400 text-sm rounded-lg flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('admin.password.update') }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block text-xs font-bold text-gray-400 mb-1">Password Lama</label>
                        <input type="password" name="current_password" required
                            class="w-full bg-rail-dark border border-white/10 rounded-xl px-4 py-3 text-white focus:border-rail-accent focus:ring-1 focus:ring-rail-accent outline-none transition-colors @error('current_password') border-red-500 @enderror">
                        @error('current_password')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-400 mb-1">Password Baru</label>
                        <input type="password" name="password" required
                            class="w-full bg-rail-dark border border-white/10 rounded-xl px-4 py-3 text-white focus:border-rail-accent focus:ring-1 focus:ring-rail-accent outline-none transition-colors @error('password') border-red-500 @enderror">
                        @error('password')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-400 mb-1">Konfirmasi Password Baru</label>
                        <input type="password" name="password_confirmation" required
                            class="w-full bg-rail-dark border border-white/10 rounded-xl px-4 py-3 text-white focus:border-rail-accent focus:ring-1 focus:ring-rail-accent outline-none transition-colors">
                    </div>

                    <div class="flex items-center gap-3 mt-6 pt-4 border-t border-white/5">
                        <button type="button" @click="showPasswordModal = false"
                            class="flex-1 py-3 bg-white/5 hover:bg-white/10 text-gray-300 rounded-xl font-bold transition-colors">
                            Batal
                        </button>
                        <button type="submit"
                            class="flex-1 py-3 bg-gradient-to-r from-rail-accent to-rail-sweet text-white rounded-xl font-bold shadow-lg hover:shadow-purple-500/20 transition-all">
                            Simpan Password
                        </button>
                    </div>
                </form>

                <button type="button" @click="showPasswordModal = false" class="absolute top-4 right-4 text-gray-500 hover:text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
        </div>
    </template>

</div> {{-- Penutup Wrapper Utama Alpine JS --}}
@endsection
