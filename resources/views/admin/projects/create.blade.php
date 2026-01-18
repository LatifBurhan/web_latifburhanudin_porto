@extends('layouts.admin')

@section('content')
<div class="max-w-3xl mx-auto">
    <h1 class="text-2xl font-bold text-white mb-6">Add New Project</h1>

    {{-- TAMBAHAN: Tampilkan Alert jika ada error validasi --}}
    @if ($errors->any())
        <div class="mb-5 bg-red-500/10 border border-red-500/50 rounded-xl p-4">
            <div class="flex items-center gap-3">
                <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <h3 class="font-bold text-red-500">Gagal Menyimpan!</h3>
            </div>
            <ul class="mt-2 list-disc list-inside text-sm text-red-400">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" class="bg-rail-card border border-white/5 p-8 rounded-2xl space-y-6">
        @csrf

        <div>
            <label class="block text-sm font-bold text-gray-300 mb-2">Project Thumbnail</label>
            <input type="file" name="image" class="w-full bg-black/20 border border-white/10 rounded-xl p-3 text-gray-300 focus:border-rail-accent outline-none">
            {{-- Pesan Error Gambar --}}
            @error('image')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="grid grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-bold text-gray-300 mb-2">Project Title</label>
                <input type="text" name="title" value="{{ old('title') }}" class="w-full bg-black/20 border border-white/10 rounded-xl p-3 text-white focus:border-rail-accent outline-none">
                {{-- Pesan Error Title --}}
                @error('title')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-bold text-gray-300 mb-2">Category</label>
                <div class="relative">
                    <select name="category" class="w-full bg-black/20 border border-white/10 rounded-xl p-3 text-white focus:border-rail-accent outline-none appearance-none">
                        <option value="" disabled selected>Select Category</option>
                        <option value="website" {{ old('category') == 'website' ? 'selected' : '' }}>Website Development</option>
                        <option value="uiux" {{ old('category') == 'uiux' ? 'selected' : '' }}>UI/UX Design</option>
                        <option value="graphic" {{ old('category') == 'graphic' ? 'selected' : '' }}>Graphic Design</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center px-3 pointer-events-none text-gray-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </div>
                </div>
                @error('category')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div>
            <label class="block text-sm font-bold text-gray-300 mb-2">Tech Stack</label>
            <input type="text" name="tech_stack" value="{{ old('tech_stack') }}" class="w-full bg-black/20 border border-white/10 rounded-xl p-3 text-white focus:border-rail-accent outline-none" placeholder="Laravel, React, MySQL">
        </div>

        <div>
            <label class="block text-sm font-bold text-gray-300 mb-2">Description</label>
            <textarea name="description" rows="4" class="w-full bg-black/20 border border-white/10 rounded-xl p-3 text-white focus:border-rail-accent outline-none">{{ old('description') }}</textarea>
            @error('description')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="grid grid-cols-3 gap-4">
            <div>
                <label class="block text-sm font-bold text-gray-300 mb-2">Demo URL</label>
                <input type="url" name="link_demo" value="{{ old('link_demo') }}" class="w-full bg-black/20 border border-white/10 rounded-xl p-3 text-white focus:border-rail-accent outline-none">
            </div>
            <div>
                <label class="block text-sm font-bold text-gray-300 mb-2">GitHub URL</label>
                <input type="url" name="link_github" value="{{ old('link_github') }}" class="w-full bg-black/20 border border-white/10 rounded-xl p-3 text-white focus:border-rail-accent outline-none">
            </div>
            <div>
                <label class="block text-sm font-bold text-gray-300 mb-2">Figma URL</label>
                <input type="url" name="link_figma" value="{{ old('link_figma') }}" class="w-full bg-black/20 border border-white/10 rounded-xl p-3 text-white focus:border-rail-accent outline-none">
            </div>
        </div>

        <button type="submit" class="w-full py-4 bg-rail-accent text-white font-bold rounded-xl hover:bg-purple-600 transition shadow-lg">
            Save Project
        </button>
    </form>
</div>
@endsection
