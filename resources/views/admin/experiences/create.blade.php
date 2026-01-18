@extends('layouts.admin')

@section('content')
<div class="max-w-2xl mx-auto">
    <h1 class="text-2xl font-bold text-white mb-6">Add New Experience</h1>

    <form action="{{ route('admin.experiences.store') }}" method="POST" class="bg-rail-card border border-white/5 p-8 rounded-2xl space-y-6">
        @csrf

        <div>
            <label class="block text-sm font-bold text-gray-300 mb-2">Experience Type</label>
            <div class="grid grid-cols-2 gap-4">
                <label class="cursor-pointer">
                    <input type="radio" name="type" value="tech" class="peer hidden" checked>
                    <div class="p-3 rounded-xl border border-white/10 bg-black/20 text-center text-gray-400 peer-checked:bg-rail-accent peer-checked:text-white peer-checked:border-rail-accent transition-all">
                        Tech Experience
                    </div>
                </label>
                <label class="cursor-pointer">
                    <input type="radio" name="type" value="professional" class="peer hidden">
                    <div class="p-3 rounded-xl border border-white/10 bg-black/20 text-center text-gray-400 peer-checked:bg-rail-sweet peer-checked:text-white peer-checked:border-rail-sweet transition-all">
                        Professional Work
                    </div>
                </label>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-bold text-gray-300 mb-2">Role / Position</label>
                <input type="text" name="role" class="w-full bg-black/20 border border-white/10 rounded-xl p-3 text-white focus:border-rail-accent outline-none" placeholder="e.g. Web Developer" required>
            </div>
            <div>
                <label class="block text-sm font-bold text-gray-300 mb-2">Company / Organization</label>
                <input type="text" name="company" class="w-full bg-black/20 border border-white/10 rounded-xl p-3 text-white focus:border-rail-accent outline-none" placeholder="e.g. PT Telkom" required>
            </div>
        </div>

        <div>
            <label class="block text-sm font-bold text-gray-300 mb-2">Period / Date</label>
            <input type="text" name="period" class="w-full bg-black/20 border border-white/10 rounded-xl p-3 text-white focus:border-rail-accent outline-none" placeholder="e.g. Jun 2024 - Present" required>
        </div>

        <div>
            <label class="block text-sm font-bold text-gray-300 mb-2">Tech Stack / Skills (Optional)</label>
            <input type="text" name="tech_stack" class="w-full bg-black/20 border border-white/10 rounded-xl p-3 text-white focus:border-rail-accent outline-none" placeholder="Laravel, MySQL, Excel (Pisahkan dengan koma)">
        </div>

        <div>
            <label class="block text-sm font-bold text-gray-300 mb-2">Description</label>
            <textarea name="description" rows="3" class="w-full bg-black/20 border border-white/10 rounded-xl p-3 text-white focus:border-rail-accent outline-none" required></textarea>
        </div>

        <button type="submit" class="w-full py-4 bg-rail-accent text-white font-bold rounded-xl hover:bg-purple-600 transition shadow-lg">
            Save Experience
        </button>
    </form>
</div>
@endsection
