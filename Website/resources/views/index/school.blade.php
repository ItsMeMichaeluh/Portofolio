<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>

</head>

@extends('layouts.sidenav')

@section('title', 'Project Details')

@section('content')

<body class="relative bg-gray-700">
    <div class="el absolute inset-0 -z-10"></div>

    <!-- Je hoofdinhoud -->
    <div class="container mx-auto px-6 py-16">
        <!-- Work header - deze blijft links -->
        <div class="mb-16">
            <h1 class="text-8xl font-bold text-white mb-6">Work</h1>
            <div class="flex items-center">
                <div class="w-6 h-0.5 bg-white mr-3"></div>
                <span class="text-white text-xl">Selected projects</span>
            </div>
        </div>

        <!-- Projects grid - deze wordt rechts geplaatst -->
        <div class="grid grid-cols-12 gap-4">
            <!-- Lege ruimte links (ongeveer 1/3 van het scherm) -->
            <div class="hidden md:block md:col-span-4"></div>

            <!-- Projecten content (ongeveer 2/3 van het scherm) -->
            <div class="col-span-12 md:col-span-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                    <!-- Linker kolom projecten -->
                    <div class="space-y-16">
                        @foreach($projects->take(count($projects)/2) as $project)
                            <div>
                                <h2 class="text-xl text-white mb-4">{{ $project->title }}</h2>
                                <div class="rounded-lg overflow-hidden">
                                    <img src="{{ filter_var($project->thumbnail, FILTER_VALIDATE_URL) ? $project->thumbnail : asset('storage/' . $project->thumbnail) }}"
                                         alt="{{ $project->title }}"
                                         class="w-full aspect-square md:aspect-[4/3] object-cover">
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Rechter kolom projecten -->
                    <div class="space-y-16 mt-16 md:mt-24">
                        @foreach($projects->skip(count($projects)/2) as $project)
                            <div>
                                <h2 class="text-xl text-white mb-4">{{ $project->title }}</h2>
                                <div class="rounded-lg overflow-hidden">
                                    <img src="{{ filter_var($project->thumbnail, FILTER_VALIDATE_URL) ? $project->thumbnail : asset('storage/' . $project->thumbnail) }}"
                                         alt="{{ $project->title }}"
                                         class="w-full aspect-square md:aspect-[4/3] object-cover">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>


</html>

@endsection
