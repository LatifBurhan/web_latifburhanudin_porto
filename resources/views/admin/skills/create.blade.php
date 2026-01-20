@extends('layouts.admin')

@section('content')
    <div class="p-6 max-w-2xl mx-auto">
        <div class="flex items-center gap-4 mb-6">
            <a href="{{ route('admin.skills.index') }}" class="text-gray-400 hover:text-white transition-colors">
                &larr; Back
            </a>
            <h2 class="text-2xl font-bold text-white">Add New Skill</h2>
        </div>

        <div class="bg-rail-card border border-white/5 rounded-2xl p-6 shadow-xl">
            <form action="{{ route('admin.skills.store') }}" method="POST" class="space-y-6">
                @csrf

                <div class="space-y-2">
                    <label class="text-sm font-bold text-gray-300 uppercase">Skill Name</label>
                    <input type="text" name="name" required placeholder="e.g. Laravel, React, Figma"
                        class="w-full bg-rail-dark border border-white/10 text-white rounded-xl px-4 py-3 focus:outline-none focus:border-purple-500 focus:ring-1 focus:ring-purple-500 transition-all">
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-bold text-gray-300 uppercase">Category</label>
                    <div class="grid grid-cols-2 gap-4">
                        <label class="cursor-pointer">
                            <input type="radio" name="category" value="tech" class="peer sr-only" checked>
                            <div
                                class="p-4 rounded-xl bg-rail-dark border border-white/10 text-center peer-checked:border-purple-500 peer-checked:bg-purple-500/10 peer-checked:text-purple-400 transition-all hover:bg-white/5">
                                <span class="font-bold">Tech / Coding</span>
                                <p class="text-xs text-gray-500 mt-1">Purple Accent</p>
                            </div>
                        </label>

                        <label class="cursor-pointer">
                            <input type="radio" name="category" value="design" class="peer sr-only">
                            <div
                                class="p-4 rounded-xl bg-rail-dark border border-white/10 text-center peer-checked:border-pink-500 peer-checked:bg-pink-500/10 peer-checked:text-pink-400 transition-all hover:bg-white/5">
                                <span class="font-bold">Design / Tools</span>
                                <p class="text-xs text-gray-500 mt-1">Pink Accent</p>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="space-y-2">
                    <label class="text-sm font-bold text-gray-300 uppercase">Accent Color</label>
                    <div class="flex items-center gap-4">
                        <input type="color" name="color" value="#8b5cf6"
                            class="h-12 w-24 bg-rail-dark border border-white/10 rounded-xl cursor-pointer p-1">
                        <span class="text-gray-500 text-sm">Click color box to pick a color</span>
                    </div>
                </div>
                <button type="submit"
                    class="w-full py-3 bg-purple-600 hover:bg-purple-700 text-white font-bold rounded-xl transition-all shadow-lg hover:shadow-purple-500/30">
                    Save Skill
                </button>
            </form>
        </div>
    </div>
@endsection
