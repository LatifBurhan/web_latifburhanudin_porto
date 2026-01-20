@extends('layouts.admin')

@section('content')
    <div class="p-6 max-w-7xl mx-auto">

        <div class="flex flex-col md:flex-row justify-between items-end md:items-center mb-8 gap-4">
            <div>
                <h2 class="text-3xl font-bold text-white tracking-tight">Inbox</h2>
                <p class="text-gray-400 text-sm mt-1">Daftar pesan masuk dari formulir website.</p>
            </div>

            <div class="flex items-center gap-3 px-4 py-2 bg-rail-card border border-white/10 rounded-full shadow-lg">
                <div class="w-2 h-2 rounded-full bg-purple-500 animate-pulse"></div>
                <span class="text-gray-300 text-sm font-medium">
                    Total: <span class="text-white font-bold">{{ $contacts->count() }}</span> Pesan
                </span>
            </div>
        </div>

        @if(session('success'))
        <div x-data="{ show: true }" x-show="show" class="mb-6 p-4 bg-green-500/10 border border-green-500/20 text-green-400 rounded-xl flex justify-between items-center">
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <span>{{ session('success') }}</span>
            </div>
            <button @click="show = false" class="text-green-400 hover:text-green-300"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg></button>
        </div>
        @endif

        <div class="grid grid-cols-1 gap-4">
            @forelse($contacts as $contact)
            <div class="group bg-rail-card hover:bg-white/5 border border-white/5 hover:border-purple-500/30 rounded-2xl p-5 transition-all duration-300 relative overflow-hidden">

                <div class="absolute top-0 right-0 w-32 h-32 bg-purple-500/5 rounded-full blur-3xl -mr-16 -mt-16 pointer-events-none"></div>

                <div class="flex flex-col md:flex-row gap-5 relative z-10">

                    <div class="flex items-start gap-4 min-w-[250px]">
                        <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-gray-700 to-gray-900 border border-white/10 flex items-center justify-center text-white font-bold text-lg shadow-inner">
                            {{ substr($contact->name, 0, 1) }}
                        </div>

                        <div class="flex flex-col">
                            <h3 class="text-white font-bold text-lg leading-tight group-hover:text-purple-400 transition-colors">
                                {{ $contact->name }}
                            </h3>
                            <a href="mailto:{{ $contact->email }}" class="text-sm text-gray-400 hover:text-white transition-colors flex items-center gap-1 mt-1">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                {{ $contact->email }}
                            </a>
                            <span class="text-xs text-gray-600 mt-2 font-mono">
                                {{ $contact->created_at->format('d M Y, H:i') }}
                            </span>
                        </div>
                    </div>

                    <div class="flex-1 bg-black/20 rounded-xl p-4 border border-white/5">
                        <p class="text-gray-300 text-sm leading-relaxed whitespace-pre-line">"{{ $contact->message }}"</p>
                    </div>

                    <div class="flex md:flex-col items-center justify-center gap-2 md:border-l md:border-white/5 md:pl-4">

                        <form action="{{ route('admin.messages.destroy', $contact->id) }}" method="POST" onsubmit="return confirm('Hapus pesan ini permanen?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="p-2 text-gray-400 hover:text-red-400 hover:bg-red-500/10 rounded-lg transition-all" title="Hapus Pesan">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            </button>
                        </form>
                    </div>

                </div>
            </div>
            @empty
            <div class="text-center py-24 flex flex-col items-center justify-center border-2 border-dashed border-white/5 rounded-3xl">
                <div class="w-16 h-16 bg-white/5 rounded-full flex items-center justify-center mb-4 text-gray-500">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                </div>
                <h3 class="text-white font-bold text-lg">Kotak Masuk Kosong</h3>
                <p class="text-gray-500 text-sm mt-1">Belum ada pesan baru dari pengunjung website.</p>
            </div>
            @endforelse
        </div>
    </div>
@endsection
