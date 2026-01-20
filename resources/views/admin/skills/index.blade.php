@extends('layouts.admin')

@section('content')
    <div class="p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-white">Skills & Tech Stack</h2>
            <a href="{{ route('admin.skills.create') }}"
               class="px-4 py-2 bg-purple-600 hover:bg-purple-700 text-white rounded-xl font-bold transition-all shadow-lg hover:shadow-purple-500/30">
                + Add New Skill
            </a>
        </div>

        @if(session('success'))
        <div class="mb-6 p-4 bg-green-500/10 border border-green-500/20 text-green-400 rounded-xl">
            {{ session('success') }}
        </div>
        @endif

        <div class="bg-rail-card border border-white/5 rounded-2xl overflow-hidden shadow-xl">
            <table class="w-full text-left text-gray-400">
                <thead class="bg-black/20 uppercase text-xs font-bold text-gray-300">
                    <tr>
                        <th class="px-6 py-4">Skill Name</th>
                        <th class="px-6 py-4">Category</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5">
                    @forelse($skills as $skill)
                    <tr class="hover:bg-white/5 transition-colors">
                        <td class="px-6 py-4 font-medium text-white">
                            {{ $skill->name }}
                        </td>
                        <td class="px-6 py-4">
                            @if($skill->category == 'tech')
                                <span class="px-3 py-1 text-xs font-bold rounded-full bg-purple-500/20 text-purple-400 border border-purple-500/20">
                                    Tech (Coding)
                                </span>
                            @else
                                <span class="px-3 py-1 text-xs font-bold rounded-full bg-pink-500/20 text-pink-400 border border-pink-500/20">
                                    Design (UI/UX)
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right flex justify-end gap-2">
                            <a href="{{ route('admin.skills.edit', $skill->id) }}"
                               class="p-2 bg-blue-600/10 text-blue-400 hover:bg-blue-600 hover:text-white rounded-lg transition-all">
                                Edit
                            </a>
                            <form action="{{ route('admin.skills.destroy', $skill->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="p-2 bg-red-600/10 text-red-400 hover:bg-red-600 hover:text-white rounded-lg transition-all">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="px-6 py-8 text-center text-gray-500">
                            No skills added yet.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
