<x-app-layout>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Panel - Portfolio</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="bg-gray-100 p-6">
        <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-lg">
            <h1 class="text-2xl font-bold mb-4">Projecten Overzicht</h1>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($projects as $project)
                    <div class="bg-white p-4 border rounded-lg shadow-md hover:shadow-xl transition-shadow">
                        <a href="{{ route('projects.show', $project->id) }}" class="block">
                            <img src="{{ $project->thumbnail }}" alt="{{ $project->title }}" class="w-full h-48 object-cover rounded-md mb-4">
                            <h3 class="text-xl font-semibold text-gray-900">{{ $project->title }}</h3>
                        </a>
                    </div>
                @endforeach
            </div>

            <a href="{{route('create_project')}}" class="bg-green-500 text-white px-4 py-2 rounded inline-block">Nieuw Project Toevoegen</a>
        </div>
    </body>
    </html>


</x-app-layout>
