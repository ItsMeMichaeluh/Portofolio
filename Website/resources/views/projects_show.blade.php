<x-app-layout>

    <div class="max-w-4xl mx-auto bg-white p-8 rounded-xl shadow-lg border-2 border-gray-300">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Project Bewerken</h2>

        <!-- Hyperlink naar het project -->
        <a href="{{ route('projects_show', $project->id) }}"
           class="inline-block bg-indigo-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-indigo-700 transition">
           Bekijk dit project 🔗
        </a>

        <!-- Formulier voor het bewerken van het project -->
        <form action="{{ route('projects.update', $project->id) }}" method="POST" enctype="multipart/form-data" class="mt-6">
            @csrf
            @method('PUT')

            <!-- Titel -->
            <div class="mb-4">
                <label class="block text-lg font-semibold text-gray-700">Titel</label>
                <input type="text" name="title" value="{{ $project->title }}"
                       class="w-full p-3 border-2 border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-indigo-500 transition">
            </div>

            <!-- Inleiding -->
            <div class="mb-4">
                <label class="block text-lg font-semibold text-gray-700">Inleiding</label>
                <textarea name="introduction" rows="3"
                          class="w-full p-3 border-2 border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-indigo-500 transition">{{ $project->introduction }}</textarea>
            </div>

            <!-- Beschrijving -->
            <div class="mb-4">
                <label class="block text-lg font-semibold text-gray-700">Beschrijving</label>
                <textarea name="body" rows="5"
                          class="w-full p-3 border-2 border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-indigo-500 transition">{{ $project->body }}</textarea>
            </div>

            <!-- Technologieën -->
            <div class="mb-6">
                <label class="block text-lg font-semibold text-gray-700">Technologieën</label>
                <div class="mt-2 grid grid-cols-2 md:grid-cols-3 gap-3">
                    @foreach($technologies as $technology)
                        <label class="flex items-center bg-white p-3 rounded-lg shadow-lg border-2 border-gray-300 cursor-pointer hover:border-red-500 transition-all">
                            <input type="checkbox" name="technologies[]" value="{{ $technology->id }}"
                                   class="hidden peer"
                                   @if($project->technologies->contains($technology->id)) checked @endif>
                            <div class="w-5 h-5 border-2 border-gray-400 rounded-md flex items-center justify-center peer-checked:bg-red-600 peer-checked:border-red-600 transition-all">
                                <svg class="w-4 h-4 text-white hidden peer-checked:block" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <span class="ml-3 text-gray-800 font-semibold">{{ $technology->name }}</span>
                        </label>
                    @endforeach
                </div>
            </div>
                <!-- Afbeeldingen -->
                <div class="mb-6">
                    <label class="block text-lg font-semibold text-gray-700">Voeg Foto's Toe</label>
                    <input type="file" name="images[]" accept="image/*" multiple
                           class="mt-2 p-3 w-full bg-white text-gray-800 border-2 border-gray-300 rounded-lg focus:ring-4 focus:ring-indigo-500 transition-all shadow-lg">

                    <div class="mt-3 flex gap-3 flex-wrap">
                        @foreach($project->images as $image)
                            <div class="relative group">
                                <img src="{{ asset('storage/' . $image->path) }}" class="w-24 h-24 rounded-lg shadow-md border">

                                <!-- Formulier om een afbeelding te verwijderen -->
                                <form action="{{ route('projects.images.destroy', [$project->id, $image->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="absolute top-1 right-1 bg-red-600 text-white rounded-full p-1 opacity-0 group-hover:opacity-100 transition">
                                        ❌
                                    </button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>


                <!-- URL en GitHub -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                    <div>
                        <label class="block text-lg font-semibold text-gray-700">Project URL</label>
                        <input type="url" name="url" value="{{ $project->url }}"
                               class="w-full p-3 border-2 border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-indigo-500 transition">
                    </div>
                    <div>
                        <label class="block text-lg font-semibold text-gray-700">GitHub Repo</label>
                        <input type="url" name="github" value="{{ $project->github }} "
                               class="w-full p-3 border-2 border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-indigo-500 transition">
                            </div>
                        </div>

                        <!-- Opslaan -->
                        <div class="flex justify-between">
                            <button type="submit"
                                    class="bg-green-600 text-white px-5 py-2 rounded-lg shadow-md hover:bg-green-700 transition">
                                Opslaan ✅
                            </button>
                        </div>
                    </form>


                    <form action="{{ route('projects.destroy', $project->id) }}" method="POST" onsubmit="return confirm('Weet je zeker dat je dit project wilt verwijderen?')">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="bg-red-600 text-white px-5 py-2 rounded-lg shadow-md hover:bg-red-700 transition">
                            Verwijderen 🗑️
                        </button>
                    </form>
                </div>
            </x-app-layout>
