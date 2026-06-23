@extends('layouts.app')

@section('content')

<section class="pt-32 pb-20 px-6">
    <div class="max-w-6xl mx-auto">
        <h1 class="text-4xl font-bold text-gray-800 mb-2">Projects</h1>
        <p class="text-gray-500 mb-12">Semua project yang telah saya kerjakan</p>

        @forelse($projects as $category => $items)
        <div class="mb-16">
            <h2 class="text-xl font-semibold text-blue-600 border-b border-blue-100 pb-2 mb-6">
                {{ $category }}
            </h2>
            <div class="grid md:grid-cols-3 gap-6">
                @foreach($items as $project)
                <div class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm hover:shadow-md transition">
                    @if($project->images->first())
                    <img src="{{ Storage::url($project->images->first()->image_path) }}"
                         alt="{{ $project->title }}"
                         class="w-full h-48 object-cover">
                    @else
                    <div class="w-full h-48 bg-blue-50 flex items-center justify-center text-4xl">
                        💻
                    </div>
                    @endif
                    <div class="p-5">
                        <h3 class="text-lg font-bold text-gray-800 mb-1">{{ $project->title }}</h3>
                        <p class="text-gray-500 text-sm mb-3 line-clamp-2">{{ $project->description }}</p>
                        <p class="text-xs text-gray-400 mb-4">{{ $project->tech_stack }}</p>
                        <a href="{{ route('projects.detail', $project) }}"
                           class="text-blue-600 text-sm font-medium hover:underline">
                            Lihat Detail →
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @empty
        <p class="text-gray-400">Belum ada project.</p>
        @endforelse
    </div>
</section>

@endsection