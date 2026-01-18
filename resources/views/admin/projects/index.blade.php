@extends('layouts.admin')

@section('content')
<div class="flex justify-between items-center mb-8">
    <h1 class="text-3xl font-bold text-white">My Projects</h1>
    <a href="{{ route('admin.projects.create') }}" class="px-5 py-2.5 bg-rail-accent text-white font-bold rounded-xl hover:bg-purple-600 transition shadow-lg">
        + Add Project
    </a>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($projects as $project)
    <div class="bg-rail-card border border-white/5 rounded-2xl overflow-hidden group">
        <div class="h-48 overflow-hidden relative">
            <img src="{{ asset('storage/' . $project->image) }}" class="w-full h-full object-cover">
            <span class="absolute top-2 right-2 bg-black/70 text-white text-xs px-2 py-1 rounded">
                {{ ucfirst($project->category) }}
            </span>
        </div>
        <div class="p-5">
            <h3 class="font-bold text-lg text-white mb-2">{{ $project->title }}</h3>

            <div class="flex flex-wrap gap-1 mb-4">
                @foreach($project->tech_stack ?? [] as $tech)
                    <span class="text-[10px] px-1.5 py-0.5 bg-white/10 rounded text-gray-300">{{ $tech }}</span>
                @endforeach
            </div>

            <div class="flex gap-2 pt-4 border-t border-white/5">
                <a href="{{ route('admin.projects.edit', $project->id) }}" class="flex-1 py-2 text-center text-sm font-bold bg-blue-500/10 text-blue-400 rounded-lg hover:bg-blue-500/20">Edit</a>
                <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" class="flex-1" onsubmit="return confirm('Delete?');">
                    @csrf @method('DELETE')
                    <button class="w-full py-2 text-center text-sm font-bold bg-red-500/10 text-red-500 rounded-lg hover:bg-red-500/20">Delete</button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
