@extends('layouts.admin')

@section('content')
<div class="p-6">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800 dark:text-white">Hallo Latif</h1>
        <p class="text-gray-500 dark:text-gray-400 mt-1">Welcome back, here is your portfolio summary.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

        <a href="{{ route('admin.projects.index') }}" class="group block p-6 bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-200 dark:border-gray-700 hover:border-indigo-500 dark:hover:border-indigo-500 transition-all duration-300">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-indigo-50 dark:bg-indigo-500/10 rounded-xl text-indigo-600 dark:text-indigo-400 group-hover:bg-indigo-600 group-hover:text-white transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                </div>
                <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Projects</span>
            </div>
            <div class="flex items-baseline gap-2">
                <h3 class="text-3xl font-black text-gray-900 dark:text-white">{{ $totalProjects }}</h3>
                <span class="text-sm text-gray-500">Items</span>
            </div>
        </a>

        <a href="{{ route('admin.certificates.index') }}" class="group block p-6 bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-200 dark:border-gray-700 hover:border-yellow-500 dark:hover:border-yellow-500 transition-all duration-300">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-yellow-50 dark:bg-yellow-500/10 rounded-xl text-yellow-600 dark:text-yellow-400 group-hover:bg-yellow-500 group-hover:text-white transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>
                </div>
                <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Certificates</span>
            </div>
            <div class="flex items-baseline gap-2">
                <h3 class="text-3xl font-black text-gray-900 dark:text-white">{{ $totalCertificates }}</h3>
                <span class="text-sm text-gray-500">Awards</span>
            </div>
        </a>

        <a href="{{ route('admin.experiences.index') }}" class="group block p-6 bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-200 dark:border-gray-700 hover:border-blue-500 dark:hover:border-blue-500 transition-all duration-300">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-blue-50 dark:bg-blue-500/10 rounded-xl text-blue-600 dark:text-blue-400 group-hover:bg-blue-600 group-hover:text-white transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                </div>
                <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Experiences</span>
            </div>
            <div class="flex items-baseline gap-2">
                <h3 class="text-3xl font-black text-gray-900 dark:text-white">{{ $totalExperiences }}</h3>
                <span class="text-sm text-gray-500">Positions</span>
            </div>
        </a>

        <a href="{{ route('admin.resumes.index') }}" class="group block p-6 bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-200 dark:border-gray-700 hover:border-emerald-500 dark:hover:border-emerald-500 transition-all duration-300">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-emerald-50 dark:bg-emerald-500/10 rounded-xl text-emerald-600 dark:text-emerald-400 group-hover:bg-emerald-600 group-hover:text-white transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                </div>
                <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">CV Downloads</span>
            </div>
            <div class="flex items-baseline gap-2">
                <h3 class="text-3xl font-black text-gray-900 dark:text-white">{{ $totalDownloads }}</h3>
                <span class="text-sm text-gray-500">Times</span>
            </div>
        </a>

    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
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
</div>
@endsection
