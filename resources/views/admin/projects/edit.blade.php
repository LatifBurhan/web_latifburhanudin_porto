@extends('layouts.admin')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="flex items-center gap-4 mb-8">
        <a href="{{ route('admin.projects.index') }}" class="p-2 rounded-lg bg-white/5 hover:bg-white/10 text-gray-400 transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        </a>
        <h1 class="text-2xl font-bold text-white">Edit Project</h1>
    </div>

    {{-- Alert Error Validasi --}}
    @if ($errors->any())
        <div class="mb-5 bg-red-500/10 border border-red-500/50 rounded-xl p-4">
            <div class="flex items-center gap-3">
                <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <h3 class="font-bold text-red-500">Gagal Update!</h3>
            </div>
            <ul class="mt-2 list-disc list-inside text-sm text-red-400">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data" class="bg-rail-card border border-white/5 p-8 rounded-2xl space-y-6">
        @csrf
        @method('PUT') {{-- WAJIB: Agar dianggap sebagai Update --}}

        <div>
            <label class="block text-sm font-bold text-gray-300 mb-2">Project Thumbnail</label>

            <div class="flex items-start gap-4 mb-4">
                <div class="w-32 h-24 rounded-lg overflow-hidden border border-white/10 bg-black/20">
                    <img src="{{ asset('storage/' . $project->image) }}" class="w-full h-full object-cover" alt="Current Image">
                </div>
                <div class="flex-1">
                    <input type="file" name="image" class="w-full bg-black/20 border border-white/10 rounded-xl p-3 text-gray-300 focus:border-rail-accent outline-none">
                    <p class="text-xs text-gray-500 mt-2">Biarkan kosong jika tidak ingin mengubah gambar.</p>
                </div>
            </div>
            @error('image') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-bold text-gray-300 mb-2">Project Title</label>
                <input type="text" name="title" value="{{ old('title', $project->title) }}" class="w-full bg-black/20 border border-white/10 rounded-xl p-3 text-white focus:border-rail-accent outline-none">
                @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-sm font-bold text-gray-300 mb-2">Category</label>
                <div class="relative">
                    <select name="category" class="w-full bg-black/20 border border-white/10 rounded-xl p-3 text-white focus:border-rail-accent outline-none appearance-none">
                        <option value="website" {{ old('category', $project->category) == 'website' ? 'selected' : '' }}>Website Development</option>
                        <option value="uiux" {{ old('category', $project->category) == 'uiux' ? 'selected' : '' }}>UI/UX Design</option>
                        <option value="graphic" {{ old('category', $project->category) == 'graphic' ? 'selected' : '' }}>Graphic Design</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center px-3 pointer-events-none text-gray-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <label class="block text-sm font-bold text-gray-300 mb-2">Tech Stack</label>
            {{-- implode: Mengubah Array ['Laravel', 'PHP'] menjadi string "Laravel, PHP" --}}
            <input type="text" name="tech_stack" value="{{ old('tech_stack', implode(', ', $project->tech_stack ?? [])) }}" class="w-full bg-black/20 border border-white/10 rounded-xl p-3 text-white focus:border-rail-accent outline-none">
            <p class="text-xs text-gray-500 mt-1">Pisahkan dengan koma (contoh: Laravel, React, MySQL).</p>
        </div>

        <div>
            <label class="block text-sm font-bold text-gray-300 mb-2">Description</label>
            <textarea name="description" rows="4" class="w-full bg-black/20 border border-white/10 rounded-xl p-3 text-white focus:border-rail-accent outline-none">{{ old('description', $project->description) }}</textarea>
            @error('description') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label class="block text-sm font-bold text-gray-300 mb-2">Demo URL</label>
                <input type="url" name="link_demo" value="{{ old('link_demo', $project->link_demo) }}" class="w-full bg-black/20 border border-white/10 rounded-xl p-3 text-white focus:border-rail-accent outline-none">
            </div>
            <div>
                <label class="block text-sm font-bold text-gray-300 mb-2">GitHub URL</label>
                <input type="url" name="link_github" value="{{ old('link_github', $project->link_github) }}" class="w-full bg-black/20 border border-white/10 rounded-xl p-3 text-white focus:border-rail-accent outline-none">
            </div>
            <div>
                <label class="block text-sm font-bold text-gray-300 mb-2">Figma URL</label>
                <input type="url" name="link_figma" value="{{ old('link_figma', $project->link_figma) }}" class="w-full bg-black/20 border border-white/10 rounded-xl p-3 text-white focus:border-rail-accent outline-none">
            </div>
        </div>

        <div class="flex gap-4">
            <button type="submit" class="flex-1 py-4 bg-rail-accent text-white font-bold rounded-xl hover:bg-purple-600 transition shadow-lg">
                Update Project
            </button>
            <a href="{{ route('admin.projects.index') }}" class="px-6 py-4 bg-transparent border border-white/10 text-gray-300 font-bold rounded-xl hover:bg-white/5 transition text-center">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
