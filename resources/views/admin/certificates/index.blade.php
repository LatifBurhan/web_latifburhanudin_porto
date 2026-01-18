@extends('layouts.admin')

@section('content')
<div class="flex justify-between items-center mb-8">
    <div>
        <h1 class="text-3xl font-bold text-white">Certificates</h1>
        <p class="text-sm text-gray-400 mt-1">Manage your awards & seminars here.</p>
    </div>
    <a href="{{ route('admin.certificates.create') }}" class="px-5 py-2.5 bg-rail-accent text-white font-bold rounded-xl hover:bg-purple-600 transition shadow-lg shadow-purple-900/20 flex items-center gap-2">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
        Add New
    </a>
</div>

@if(session('success'))
    <div class="mb-6 p-4 bg-green-500/10 border border-green-500/20 text-green-400 rounded-xl flex items-center gap-3">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
        {{ session('success') }}
    </div>
@endif

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($certificates as $cert)
    <div class="bg-rail-card border {{ $cert->is_pinned ? 'border-rail-accent' : 'border-white/5' }} rounded-2xl overflow-hidden group hover:border-white/20 transition-all">
        <div class="h-48 overflow-hidden bg-black/50 relative">
            @if($cert->is_pinned)
                <span class="absolute top-3 right-3 bg-rail-accent text-white text-[10px] font-bold px-2 py-1 rounded-md shadow-lg z-10">PINNED</span>
            @endif

            @if($cert->file_type == 'image')
                <img src="{{ asset('storage/' . $cert->file) }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
            @else
                <div class="w-full h-full flex flex-col items-center justify-center text-gray-500 gap-2">
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                    <span class="text-sm font-bold">PDF Document</span>
                </div>
            @endif
        </div>

        <div class="p-5">
            <h3 class="font-bold text-lg text-white truncate" title="{{ $cert->title }}">{{ $cert->title }}</h3>
            <div class="flex items-center gap-2 mt-2 text-xs text-gray-400">
                <span class="bg-white/5 px-2 py-0.5 rounded border border-white/5">{{ $cert->issued_year }}</span>
                <span class="truncate max-w-[150px]">{{ $cert->tags ?? 'No Tags' }}</span>
            </div>

            <div class="flex gap-3 mt-5 pt-4 border-t border-white/5">
                <a href="{{ route('admin.certificates.edit', $cert->id) }}" class="flex-1 py-2 text-center text-sm font-bold bg-white/5 hover:bg-white/10 text-white rounded-lg transition">Edit</a>

                <form action="{{ route('admin.certificates.destroy', $cert->id) }}" method="POST" onsubmit="return confirm('Yakin hapus ini?');" class="flex-1">
                    @csrf @method('DELETE')
                    <button type="submit" class="w-full py-2 text-center text-sm font-bold bg-red-500/10 hover:bg-red-500/20 text-red-500 rounded-lg transition">Delete</button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
