@extends('layouts.admin')

@section('content')
<div class="flex justify-between items-center mb-8">
    <h1 class="text-3xl font-bold text-white">Work Experience</h1>
    <a href="{{ route('admin.experiences.create') }}" class="px-5 py-2.5 bg-rail-accent text-white font-bold rounded-xl hover:bg-purple-600 transition shadow-lg">
        + Add Experience
    </a>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    @foreach($experiences as $exp)
    <div class="bg-rail-card border border-white/5 rounded-2xl p-6 relative group">

        <span class="absolute top-4 right-4 text-[10px] font-bold px-2 py-1 rounded
            {{ $exp->type == 'tech' ? 'bg-rail-accent/20 text-rail-accent' : 'bg-rail-sweet/20 text-rail-sweet' }}">
            {{ $exp->type == 'tech' ? 'TECH EXP' : 'PROFESSIONAL' }}
        </span>

        <h3 class="text-lg font-bold text-white">{{ $exp->role }}</h3>
        <p class="text-sm text-gray-400 mb-2">{{ $exp->company }} • {{ $exp->period }}</p>

        <p class="text-xs text-gray-500 line-clamp-2 mb-4">{{ $exp->description }}</p>

        @if(!empty($exp->tech_stack))
            <div class="flex flex-wrap gap-1 mb-4">
                @foreach($exp->tech_stack as $tech)
                    <span class="text-[10px] px-1.5 py-0.5 bg-white/10 rounded text-gray-400">{{ $tech }}</span>
                @endforeach
            </div>
        @endif

        <div class="flex gap-2 pt-4 border-t border-white/5">
            <a href="{{ route('admin.experiences.edit', $exp->id) }}" class="flex-1 text-center text-sm font-bold text-blue-400 hover:text-blue-300">Edit</a>
            <form action="{{ route('admin.experiences.destroy', $exp->id) }}" method="POST" class="flex-1 text-center" onsubmit="return confirm('Delete?');">
                @csrf @method('DELETE')
                <button class="text-sm font-bold text-red-500 hover:text-red-400">Delete</button>
            </form>
        </div>
    </div>
    @endforeach
</div>
@endsection
