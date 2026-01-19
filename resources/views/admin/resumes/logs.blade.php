@extends('layouts.admin')

@section('content')
<div class="p-6">
    <div class="flex items-center gap-4 mb-6">
        <a href="{{ route('admin.resumes.index') }}"
           class="flex items-center gap-2 text-gray-400 hover:text-white transition-colors bg-gray-800 hover:bg-gray-700 border border-gray-700 px-4 py-2 rounded-lg text-sm font-medium">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Back to List
        </a>
        <div class="h-6 w-px bg-gray-700"></div>
        <h2 class="text-xl font-bold text-white">
            Download Logs: <span class="text-indigo-400">{{ $resume->name }}</span>
        </h2>
    </div>

    <div class="bg-gray-800 border border-gray-700 rounded-xl shadow-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="bg-gray-700/50 text-gray-200 uppercase text-xs tracking-wider">
                    <tr>
                        <th class="p-4 font-semibold">Date & Time</th>
                        <th class="p-4 font-semibold">IP Address</th>
                        <th class="p-4 font-semibold">Device / Browser (User Agent)</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                    @forelse($resume->downloads()->latest()->get() as $log)
                    <tr class="hover:bg-gray-700/30 transition-colors">
                        <td class="p-4 text-gray-300 whitespace-nowrap">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                {{ $log->created_at->format('d M Y, H:i') }}
                            </div>
                        </td>
                        <td class="p-4">
                            <span class="font-mono text-xs bg-gray-900 text-indigo-300 px-2 py-1 rounded border border-gray-700">
                                {{ $log->ip_address }}
                            </span>
                        </td>
                        <td class="p-4 text-gray-400 max-w-md truncate" title="{{ $log->user_agent }}">
                            {{ $log->user_agent }}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="p-10 text-center text-gray-500">
                            <div class="flex flex-col items-center gap-2">
                                <svg class="w-10 h-10 text-gray-600 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                                <p>No downloads recorded for this version yet.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
