@extends('layouts.app')

@section('content')

{{-- Hero Section --}}
<section class="min-h-screen flex items-center justify-center pt-20 px-6">
    <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-12 items-center">
        <div>
            <p class="text-blue-600 font-medium mb-2">Hi, saya</p>
            <h1 class="text-5xl font-bold text-gray-800 mb-4">Zidane</h1>
            <p class="text-xl text-gray-500 mb-6">Data Analyst & Web Developer</p>
            <p class="text-gray-600 leading-relaxed mb-8">
                Saya passionate dalam mengolah data menjadi insight yang bermakna
                dan membangun aplikasi web yang fungsional dan profesional.
            </p>
            <div class="flex gap-4">
                <a href="{{ route('projects') }}"
                   class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition font-medium">
                    Lihat Projects
                </a>
                <a href="#contact"
                   class="border border-gray-300 text-gray-700 px-6 py-3 rounded-lg hover:border-blue-600 hover:text-blue-600 transition font-medium">
                    Hubungi Saya
                </a>
            </div>
        </div>
        <div class="flex justify-center">
            <div class="w-64 h-64 rounded-full bg-blue-100 flex items-center justify-center text-6xl">
                👤
            </div>
        </div>
    </div>
</section>

{{-- Skills Section --}}
<section class="py-20 bg-gray-50 px-6">
    <div class="max-w-6xl mx-auto">
        <h2 class="text-3xl font-bold text-gray-800 mb-2">Skills</h2>
        <p class="text-gray-500 mb-12">Teknologi yang saya kuasai</p>

        @foreach($skills as $category => $items)
        <div class="mb-10">
            <h3 class="text-lg font-semibold text-blue-600 mb-4">{{ $category }}</h3>
            <div class="flex flex-wrap gap-3">
                @foreach($items as $skill)
                <span class="bg-white border border-gray-200 text-gray-700 px-4 py-2 rounded-lg text-sm font-medium shadow-sm">
                    {{ $skill->name }}
                </span>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
</section>

{{-- Featured Projects --}}
<section class="py-20 px-6">
    <div class="max-w-6xl mx-auto">
        <h2 class="text-3xl font-bold text-gray-800 mb-2">Featured Projects</h2>
        <p class="text-gray-500 mb-12">Beberapa project terbaru saya</p>

        <div class="grid md:grid-cols-3 gap-6">
            @forelse($projects as $project)
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
                    <span class="text-xs font-medium text-blue-600 bg-blue-50 px-2 py-1 rounded">
                        {{ $project->category }}
                    </span>
                    <h3 class="text-lg font-bold text-gray-800 mt-2 mb-1">{{ $project->title }}</h3>
                    <p class="text-gray-500 text-sm mb-4 line-clamp-2">{{ $project->description }}</p>
                    <a href="{{ route('projects.detail', $project) }}"
                       class="text-blue-600 text-sm font-medium hover:underline">
                        Lihat Detail →
                    </a>
                </div>
            </div>
            @empty
            <p class="text-gray-400 col-span-3">Belum ada project.</p>
            @endforelse
        </div>

        <div class="text-center mt-10">
            <a href="{{ route('projects') }}"
               class="border border-blue-600 text-blue-600 px-6 py-3 rounded-lg hover:bg-blue-600 hover:text-white transition font-medium">
                Lihat Semua Projects
            </a>
        </div>
    </div>
</section>

{{-- Contact Section --}}
<section id="contact" class="py-20 bg-gray-50 px-6">
    <div class="max-w-2xl mx-auto text-center">
        <h2 class="text-3xl font-bold text-gray-800 mb-2">Contact</h2>
        <p class="text-gray-500 mb-8">Tertarik bekerja sama? Hubungi saya!</p>
        <div class="flex justify-center gap-6">
            <a href="mailto:email@kamu.com"
               class="flex items-center gap-2 text-gray-600 hover:text-blue-600 transition">
                📧 Email
            </a>
            <a href="https://github.com/usernamekamu" target="_blank"
               class="flex items-center gap-2 text-gray-600 hover:text-blue-600 transition">
                🐙 GitHub
            </a>
            <a href="https://linkedin.com/in/usernamekamu" target="_blank"
               class="flex items-center gap-2 text-gray-600 hover:text-blue-600 transition">
                💼 LinkedIn
            </a>
        </div>
    </div>
</section>

@endsection