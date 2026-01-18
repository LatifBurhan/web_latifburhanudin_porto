@extends('layouts.admin')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="flex items-center gap-4 mb-8">
        <a href="{{ route('admin.certificates.index') }}" class="p-2 rounded-lg bg-white/5 hover:bg-white/10 text-gray-400 transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        </a>
        <h1 class="text-2xl font-bold text-white">Add New Certificate</h1>
    </div>

    <form action="{{ route('admin.certificates.store') }}" method="POST" enctype="multipart/form-data" class="bg-rail-card border border-white/5 p-8 rounded-2xl space-y-6">
        @csrf

        <div>
            <label class="block text-sm font-bold text-gray-300 mb-2">Upload File (Image/PDF)</label>
            <div class="relative border-2 border-dashed border-white/10 rounded-xl p-8 text-center hover:border-rail-accent/50 transition bg-black/20">
                <input type="file" name="file" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" required>
                <div class="text-gray-400 pointer-events-none">
                    <span class="text-rail-accent">Click to upload</span> or drag and drop
                    <p class="text-xs mt-1 text-gray-500">JPG, PNG, PDF (Max 2MB)</p>
                </div>
            </div>
        </div>

        <div>
            <label class="block text-sm font-bold text-gray-300 mb-2">Title / Event Name</label>
            <input type="text" name="title" class="w-full bg-black/20 border border-white/10 rounded-xl p-3 text-white focus:border-rail-accent outline-none transition" placeholder="e.g. Juara 1 Web Design Competition" required>
        </div>

        <div class="grid grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-bold text-gray-300 mb-2">Year</label>
                <input type="number" name="issued_year" class="w-full bg-black/20 border border-white/10 rounded-xl p-3 text-white focus:border-rail-accent outline-none transition" placeholder="2024" required>
            </div>
            <div>
                <label class="block text-sm font-bold text-gray-300 mb-2">Tags / Category</label>
                <input type="text" name="tags" class="w-full bg-black/20 border border-white/10 rounded-xl p-3 text-white focus:border-rail-accent outline-none transition" placeholder="e.g. Seminar, Web, UI/UX">
            </div>
        </div>

        <div>
            <label class="block text-sm font-bold text-gray-300 mb-2">Description / Issuer</label>
            <textarea name="description" rows="3" class="w-full bg-black/20 border border-white/10 rounded-xl p-3 text-white focus:border-rail-accent outline-none transition" placeholder="Penyelenggara: Universitas Duta Bangsa..."></textarea>
        </div>

        <div class="flex items-center gap-4 p-4 rounded-xl bg-white/5 border border-white/5">
            <input type="checkbox" name="is_pinned" id="pin" class="w-5 h-5 rounded bg-black border-white/20 text-rail-accent focus:ring-rail-accent cursor-pointer">
            <label for="pin" class="text-gray-300 cursor-pointer select-none">
                <span class="block font-bold text-white">Pin to Top</span>
                <span class="text-xs text-gray-500">Tampilkan sertifikat ini di urutan paling awal (Highlight).</span>
            </label>
        </div>

        <button type="submit" class="w-full py-4 bg-rail-accent text-white font-bold rounded-xl hover:bg-purple-600 transition shadow-lg shadow-purple-900/20 text-lg">
            Save Certificate
        </button>
    </form>
</div>
@endsection
