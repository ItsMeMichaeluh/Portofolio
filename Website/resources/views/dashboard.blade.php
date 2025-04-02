<x-app-layout>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Panel - Portfolio</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <style>
            .fire-glow {
                box-shadow: 0 0 20px rgba(255, 69, 0, 0.8);
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }
            .fire-glow:hover {
                transform: scale(1.05);
                box-shadow: 0 0 30px rgba(255, 69, 0, 1);
            }
        </style>
    </head>
    <body class="bg-gradient-to-br from-gray-900 to-gray-800 text-white min-h-screen flex items-center justify-center p-6">

        <div class="container mx-auto px-6 py-16">
            <h1 class="text-3xl font-bold text-white mb-6">Dashboard</h1>

            <!-- E-mail Overzicht (FIRE layout) -->
            <div class="bg-gray-800 p-8 rounded-lg shadow-lg">
                <h2 class="text-xl font-semibold text-white mb-4">Gestuurde E-mails</h2>

                @if($sentEmails->isEmpty())
                    <p class="text-gray-400">Er zijn nog geen e-mails verzonden.</p>
                @else
                    <div class="space-y-6">
                        @foreach($sentEmails as $email)
                            <div class="p-4 bg-gray-700 rounded-lg shadow-lg">
                                <div class="flex justify-between items-center">
                                    <h3 class="text-white font-semibold">{{ $email->name }}</h3>
                                    <span class="text-sm text-gray-400">{{ $email->created_at->diffForHumans() }}</span>
                                </div>
                                <p class="text-gray-300 mt-2">{{ Str::limit($email->message, 100) }}</p>
                                <div class="mt-4">
                                    <p class="text-sm text-gray-400">E-mail: <a href="mailto:{{ $email->email }}" class="text-indigo-500 hover:underline">{{ $email->email }}</a></p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
        
        <div class="max-w-screen w-full bg-gray-950 p-8 rounded-2xl shadow-2xl">
            <h1 class="text-4xl font-extrabold text-orange-500 text-center mb-8 uppercase">🔥 Projecten Overzicht 🔥</h1>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 ">
                @foreach($projects as $project)
                    <div class="bg-gray-900 p-6 rounded-lg shadow-lg fire-glow relative ">
                        <a href="{{ route('projects.show', $project->id) }}" class="block h-full relative border-2 flex flex-col overflow-hidden rounded-lg">
                            <!-- Image -->
                            <img src="{{ asset('storage/' . $project->thumbnail) }}" alt="{{ $project->title }}" class="w-full h-[250px] object-cover rounded-md mb-4 transition-transform duration-500 ease-in-out transform hover:scale-105">

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
