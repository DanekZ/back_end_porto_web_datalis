@extends('layouts.app')

@section('content')

<section class="pt-32 pb-20 px-6">
    <div class="max-w-4xl mx-auto">

        {{-- Back button --}}
        <a href="{{ route('projects') }}"
           class="text-blue-600 text-sm font-medium hover:underline mb-8 inline-block">
            ← Kembali ke Projects
        </a>

        {{-- Header --}}
        <div class="mb-8">
            <span class="text-xs font-medium text-blue-600 bg-blue-50 px-2 py-1 rounded">
                {{ $project->category }}
            </span>
            <h1 class="text-4xl font-bold text-gray-800 mt-3 mb-2">{{ $project->title }}</h1>
            <p class="text-gray-500">Role: {{ $project->role }}</p>
        </div>

        {{-- Image Gallery --}}
        @if($project->images->count() > 0)
        <div class="mb-8">
            {{-- Main Image --}}
            <img src="{{ Storage::url($project->images->first()->image_path) }}"
                 alt="{{ $project->title }}"
                 class="w-full h-96 object-cover rounded-xl mb-3"
                 id="main-image">

            {{-- Thumbnail --}}
            @if($project->images->count() > 1)
            <div class="flex gap-3">
                @foreach($project->images as $image)
                <img src="{{ Storage::url($image->image_path) }}"
                     alt="{{ $project->title }}"
                     class="w-20 h-20 object-cover rounded-lg cursor-pointer border-2 border-transparent hover:border-blue-600 transition"
                     onclick="document.getElementById('main-image').src = this.src">
                @endforeach
            </div>
            @endif
        </div>
        @else
        <div class="w-full h-64 bg-blue-50 rounded-xl flex items-center justify-center text-6xl mb-8">
            💻
        </div>
        @endif

        {{-- Description --}}
        <div class="bg-white border border-gray-200 rounded-xl p-6 mb-6">
            <h2 class="text-lg font-semibold text-gray-800 mb-3">Deskripsi</h2>
            <p class="text-gray-600 leading-relaxed">{{ $project->description }}</p>
        </div>

        {{-- Tech Stack --}}
        <div class="bg-white border border-gray-200 rounded-xl p-6 mb-6">
            <h2 class="text-lg font-semibold text-gray-800 mb-3">Tech Stack</h2>
            <div class="flex flex-wrap gap-2">
                @foreach(explode(',', $project->tech_stack) as $tech)
                <span class="bg-blue-50 text-blue-600 px-3 py-1 rounded-lg text-sm font-medium">
                    {{ trim($tech) }}
                </span>
                @endforeach
            </div>
        </div>

        {{-- Links --}}
        <div class="flex gap-4">
            @if($project->github_url)
            <a href="{{ $project->github_url }}" target="_blank"
               class="flex items-center gap-2 bg-gray-800 text-white px-6 py-3 rounded-lg hover:bg-gray-900 transition font-medium">
                🐙 GitHub Repository
            </a>
            @endif
            @if($project->demo_url)
            <a href="{{ $project->demo_url }}" target="_blank"
               class="flex items-center gap-2 bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition font-medium">
                🚀 Live Demo
            </a>
            @endif
        </div>

    </div>
</section>

@endsection