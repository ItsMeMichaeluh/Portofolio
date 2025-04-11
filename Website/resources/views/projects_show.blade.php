<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>

</head>


<body>

    <div class="flex h-screen items-center justify-center relative overflow-hidden">
        <div class="fixed top-6 left-6 z-50">
            <a href="{{ route('school') }}" class="block bg-black/30 hover:bg-black/50 backdrop-blur-md p-3 rounded-full transition-all duration-300 transform hover:scale-110 shadow-lg group">
                <svg class="w-6 h-6 text-white group-hover:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </a>
        </div>

        <div class="absolute inset-0 animated-bg"></div>

        <!-- Floating geometric shapes for visual interest -->
        <div class="absolute w-64 h-64 rounded-full bg-purple-500/10 blur-3xl -top-20 -left-20"></div>
        <div class="absolute w-80 h-80 rounded-full bg-purple-700/10 blur-3xl -bottom-20 -right-20"></div>

        <!-- Hero content -->
        <div class="relative z-10 text-center max-w-4xl px-6">
            <h1 class="text-6xl md:text-7xl font-bold text-white mb-4 glow-text animate__animated animate__fadeInDown">
                {{ $project->title }}
            </h1>
            <div class="flex justify-center mb-8">
                <div class="h-1 w-32 bg-gradient-to-r from-purple-600 to-orange-500 rounded-full animate__animated animate__fadeIn animate__delay-1s"></div>
            </div>
            <p class="text-xl md:text-2xl text-gray-200 font-light animate__animated animate__fadeIn animate__delay-1s leading-relaxed">
                {{ $project->introduction }}
            </p>
        </div>

        <!-- Fixed scroll indicator positioning -->
        <div class="absolute bottom-10 left-0 right-0 flex justify-center z-20 animate__animated animate__fadeIn animate__delay-2s">
            <div class="animate-bounce bg-slate-800/60 p-2 rounded-full shadow-lg">
                <svg class="w-8 h-8 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                </svg>
            </div>
        </div>
    </div>

    <div class="animated-bg min-h-screen">
        <!-- Project Description Section -->
        <div class="max-w-5xl mx-auto px-6 py-24 relative">
            <div class="absolute inset-0 bg-black/30 backdrop-blur-lg rounded-3xl"></div>

            <!-- Project Details Card -->
            <div class="relative z-10 bg-slate-900/60 rounded-2xl p-8 shadow-2xl border border-slate-700/50 parallax-section">
                <div class="flex flex-col md:flex-row gap-10">
                    <div class="w-full md:w-3/4">
                        <h2 class="text-2xl font-bold text-purple-400 mb-6 animate__animated animate__fadeIn">Project Details</h2>

                        <div class="prose prose-lg prose-invert max-w-none mb-10 animate__animated animate__fadeIn animate__delay-1s">
                            <div class="text-gray-200 leading-relaxed space-y-4">
                                {!! nl2br(e($project->body)) !!}
                            </div>
                        </div>
                    </div>

                    <div class="w-full md:w-1/4">
                        <div class="sticky top-10">
                            <h2 class="text-2xl font-bold text-purple-400 mb-6 animate__animated animate__fadeIn">Technologies</h2>
                            <div class="flex flex-wrap gap-2 animate__animated animate__fadeIn animate__delay-2s">
                                @foreach($project->technologies as $tech)
                                    <span class="bg-gradient-to-r from-purple-700 to-purple-600 text-white px-4 py-2 rounded-full text-sm transition transform hover:scale-105 hover:from-purple-600 hover:to-purple-500 shadow-lg font-medium">
                                        {{ $tech->name }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Screenshots Gallery -->
        @if ($project->images->count())
        <div class="max-w-6xl mx-auto px-6 py-16 relative">
            <h2 class="text-3xl font-bold text-center text-white mb-12 glow-text animate__animated animate__fadeIn">
                Project <span class="text-purple-400">Gallery</span>
            </h2>

            <div class="relative overflow-hidden rounded-2xl shadow-2xl border border-slate-700/50">
                <div class="flex gap-4 snap-x snap-mandatory overflow-x-auto image-gallery p-6 bg-slate-900/60 backdrop-blur-lg animate__animated animate__fadeIn">
                    @foreach($project->images as $image)
                    <div class="w-full md:w-1/2 lg:w-1/3 flex-shrink-0 snap-center p-2 transform transition duration-500 hover:scale-[1.02]">
                        <div class="overflow-hidden rounded-xl shadow-xl border border-slate-700/50 aspect-video">
                            <img src="{{ asset('storage/' . $image->path) }}" alt="Screenshot"
                                 class="w-full h-full object-cover object-center transition duration-700 hover:scale-110">
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Navigation indicators -->
                <div class="flex justify-center mt-6 mb-2 gap-2">
                    @foreach($project->images as $index => $image)
                    <button class="w-3 h-3 rounded-full bg-purple-500/50 hover:bg-purple-400 transition"></button>
                    @endforeach
                </div>
            </div>
        </div>
        @endif
    </div>

</body>
</html>

