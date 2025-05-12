@extends('layouts.sidenav')

@section('title', 'Project Details')

@section('content')
    <!-- De achtergrond met class .el -->
    <div class="el"></div>

    <!-- Je hoofdinhoud -->
    <div class="container px-6">
        <!-- Work header - deze blijft links -->
        <div class="mb-16">
            <h1 class="text-8xl font-bold text-white mb-6">Work<span class="text-purple-500">.</span></h1>
            <div class="flex items-center">
                <div class="w-6 h-0.5 bg-white mr-3"></div>
                <span class="text-white text-xl">Selected projects</span>
            </div>
        </div>
        <!-- Projects grid - deze wordt rechts geplaatst -->
        <div class="grid grid-cols-12 gap-4 ">
            <!-- Lege ruimte links (ongeveer 1/3 van het scherm) -->
            <div class="hidden md:block md:col-span-4"></div>

            <!-- Projecten content (ongeveer 2/3 van het scherm) -->
            <div class="col-span-12 md:col-span-8">
                <div class="relative left-3">
                    @foreach($projects as $index => $project)
                    <a href="{{ route('project_details', $project->id) }}">
                        <div class="content group absolute w-1/2 {{ $index % 2 == 0 ? 'left-0 pr-6' : 'left-1/2 pl-6' }}"
                             style="top: {{ ($index * 200) }}px;">
                            <h2 class="project-title text-xl text-white mb-4">{{ $project->title }}</h2>
                            <div class="rounded-lg mb-8 border-2 border-purple-500 overflow-hidden">
                                <img src="{{ filter_var($project->thumbnail, FILTER_VALIDATE_URL) ? $project->thumbnail : asset('storage/' . $project->thumbnail) }}"
                                     alt="{{ $project->title }}"
                                     class="project-thumbnail w-full aspect-square md:aspect-[4/3] object-cover">
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
