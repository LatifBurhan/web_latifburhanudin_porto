@extends('layouts.admin')

@section('content')
<div class="p-6">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold text-white">Manage CV / Resume</h2>
    </div>

    <div class="bg-gray-800 border border-gray-700 p-6 rounded-xl shadow-lg mb-8">
        <h3 class="text-lg font-semibold text-gray-200 mb-4 border-b border-gray-700 pb-2">Upload New Version</h3>

        <form action="{{ route('admin.resumes.store') }}" method="POST" enctype="multipart/form-data" class="flex flex-col md:flex-row gap-4 items-end">
            @csrf

            <div class="flex-1 w-full">
                <label class="block text-sm font-medium text-gray-400 mb-2">Version Name</label>
                <input type="text" name="name" placeholder="e.g. CV Fullstack 2026"
                    class="w-full bg-gray-900 border border-gray-700 text-white p-2.5 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all" required>
            </div>

            <div class="flex-1 w-full">
                <label class="block text-sm font-medium text-gray-400 mb-2">PDF File</label>
                <input type="file" name="file" accept=".pdf"
                    class="w-full text-sm text-gray-400
                    file:mr-4 file:py-2.5 file:px-4
                    file:rounded-lg file:border-0
                    file:text-sm file:font-semibold
                    file:bg-gray-700 file:text-white
                    hover:file:bg-gray-600
                    cursor-pointer bg-gray-900 border border-gray-700 rounded-lg" required>
            </div>

            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium px-6 py-2.5 rounded-lg transition-colors shadow-lg shadow-indigo-500/30">
                Upload & Publish
            </button>
        </form>
    </div>

    <div class="bg-gray-800 border border-gray-700 rounded-xl shadow-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-gray-700/50 text-gray-200 uppercase text-xs tracking-wider">
                    <tr>
                        <th class="p-4 font-semibold">Version Name</th>
                        <th class="p-4 font-semibold">Status</th>
                        <th class="p-4 font-semibold">Downloads</th>
                        <th class="p-4 font-semibold">Uploaded Date</th>
                        <th class="p-4 font-semibold text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                    @forelse($resumes as $cv)
                    <tr class="hover:bg-gray-700/30 transition-colors">
                        <td class="p-4 font-medium text-white">
                            <div class="flex items-center gap-3">
                                <div class="p-2 bg-red-500/10 text-red-500 rounded-lg">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 2H7a2 2 0 00-2 2v15a2 2 0 002 2z"></path></svg>
                                </div>
                                {{ $cv->name }}
                            </div>
                        </td>
                        <td class="p-4">
                            @if($cv->is_active)
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-green-500/10 text-green-400 border border-green-500/20">
                                    <span class="w-1.5 h-1.5 rounded-full bg-green-400 animate-pulse"></span>
                                    ACTIVE
                                </span>
                            @else
                                <form action="{{ route('admin.resumes.activate', $cv->id) }}" method="POST">
                                    @csrf
                                    <button class="text-xs font-medium text-gray-500 hover:text-white border border-gray-600 hover:border-gray-400 px-3 py-1 rounded-full transition-all">
                                        Set as Active
                                    </button>
                                </form>
                            @endif
                        </td>
                        <td class="p-4">
                            <div class="flex items-center gap-2">
                                <span class="text-lg font-bold text-white">{{ $cv->downloads_count }}</span>
                                <span class="text-xs text-gray-500">times</span>
                                <a href="{{ route('admin.resumes.logs', $cv->id) }}" class="ml-2 p-1.5 rounded-md hover:bg-gray-700 text-blue-400 hover:text-blue-300 transition-colors" title="View Logs">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                </a>
                            </div>
                        </td>
                        <td class="p-4 text-sm text-gray-400">
                            {{ $cv->created_at->format('d M Y, H:i') }}
                        </td>
                        <td class="p-4 text-right">
                            <form action="{{ route('admin.resumes.destroy', $cv->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this CV?');" class="inline-block">
                                @csrf @method('DELETE')
                                <button class="p-2 text-gray-400 hover:text-red-400 hover:bg-red-500/10 rounded-lg transition-all" title="Delete">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="p-8 text-center text-gray-500">
                            No resume uploaded yet.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
