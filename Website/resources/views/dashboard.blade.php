<x-app-layout>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Panel - Portfolio</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <script src="https://unpkg.com/lucide@latest"></script>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    </head>
    <body class="bg-gradient-to-br from-gray-900 to-gray-800 text-white min-h-screen flex items-center justify-center p-6">

        <div class="container bg-gray-900 text-white mx-auto px-6 py-12">
            <h1 class="text-4xl font-bold text-white mb-10 flex self-center items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-lime-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V7a2 2 0 00-2-2H6a2 2 0 00-2 2v6M4 17h16m-4-4v4m-4-4v4m-4-4v4" />
                </svg>
                Inbox
            </h1>

            <div class="flex flex-col items-center gap-6">
                @foreach($sentEmails as $email)
                    <div x-data="{ open: false }" class="w-[85%] bg-gray-800 rounded-xl shadow-lg overflow-hidden">
                        <!-- Header -->
                        <div @click="open = !open"
                            class="flex justify-between items-center cursor-pointer p-6 hover:bg-gray-700 transition">
                            <div>
                                <h2 class="text-xl font-semibold text-white">{{ $email->name }}</h2>
                                <p class="text-sm text-indigo-400">{{ $email->email }}</p>
                            </div>

                            <!-- Delete button -->
                            <form method="POST" action="{{ route('emails.destroy', $email->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-600 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 hover:animate-shake" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                </button>
                            </form>
                        </div>

                        <!-- Expandable content -->
                        <div
                            x-show="open"
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 max-h-0"
                            x-transition:enter-end="opacity-100 max-h-96"
                            x-transition:leave="transition ease-in duration-200"
                            x-transition:leave-start="opacity-100 max-h-96"
                            x-transition:leave-end="opacity-0 max-h-0"
                            class="overflow-hidden px-6 pb-6 text-gray-300 text-sm"
                        >
                            <p class="mb-3">{{ $email->message }}</p>
                            <span class="text-xs text-gray-500 block">Verzonden {{ $email->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>



        <div class="max-w-screen w-full p-8 rounded-2xl shadow-2xl">
            <h1 class="text-4xl font-extrabold text-orange-500 text-center mb-8 uppercase">🔥 Projecten Overzicht 🔥</h1>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 ">
                @foreach($projects as $project)
                    <div class="bg-gray-900 p-6 rounded-lg shadow-lg fire-glow relative ">
                        <a href="{{ route('projects.show', $project->id) }}" class="block h-full relative border-2 flex flex-col overflow-hidden rounded-lg">
                            <!-- Image -->
                            <img src="{{ asset('storage/' . $project->thumbnail) }}?v={{ time() }}" alt="{{ $project->title }}" class="w-full h-[250px] object-cover rounded-md mb-4 transition-transform duration-500 ease-in-out transform hover:scale-105">


                            <!-- Title -->
                            <h3 class="text-2xl font-bold text-white bg-gradient-to-r from-orange-400 via-red-500 to-yellow-300 p-2 absolute bottom-0 w-full text-center">{{
                            $project->title }}</h3>
                        </a>
                    </div>
                @endforeach
            </div>

            <div class="mt-8 flex justify-center">
                <a href="{{ route('create_project') }}" class="bg-orange-500 text-white px-6 py-3 text-lg font-bold rounded-lg shadow-lg fire-glow">🚀 Nieuw Project Toevoegen 🚀</a>
            </div>
        </div>
    </body>
    </html>
</x-app-layout>
