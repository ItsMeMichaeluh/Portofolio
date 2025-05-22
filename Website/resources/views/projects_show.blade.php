<x-app-layout>
    <div class="max-w-4xl mx-auto bg-white p-8 rounded-xl shadow-lg border-2 border-gray-300">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Project Bewerken</h2>

        <a href="{{ route('projects_show', $project->id) }}"
           class="inline-block bg-indigo-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-indigo-700 transition">
           Bekijk dit project 🔗
        </a>

        <form action="{{ route('projects.update', $project->id) }}" method="POST" enctype="multipart/form-data" class="mb-10">
            @csrf
            @method('PUT')

            <label class="block text-lg font-semibold text-gray-700 mb-2">Titel</label>
            <input type="text" name="title" value="{{ old('title', $project->title) }}" class="p-3 w-full border border-gray-300 rounded-lg mb-4">

            <label class="block text-lg font-semibold text-gray-700 mb-2">Introductie</label>
            <textarea name="introduction" class="p-3 w-full border border-gray-300 rounded-lg mb-4">{{ old('introduction', $project->introduction) }}</textarea>

            <label class="block text-lg font-semibold text-gray-700 mb-2">Beschrijving</label>
            <textarea name="body" class="p-3 w-full border border-gray-300 rounded-lg mb-4">{{ old('body', $project->body) }}</textarea>

            <label class="block text-lg font-semibold text-gray-700 mb-2">Thumbnail</label>
            <input type="file" name="thumbnail" class="p-3 w-full border border-gray-300 rounded-lg mb-4">

            <!-- Technologieën -->
            <div class="mb-6">
                <label class="block text-lg font-semibold text-gray-700">Technologieën</label>
                <div class="mt-2 grid grid-cols-2 md:grid-cols-3 gap-3">
                    @foreach($technologies as $technology)
                        <label class="flex items-center bg-white p-3 rounded-lg shadow-lg border-2 border-gray-300 cursor-pointer hover:border-red-500 transition-all">
                            <input type="checkbox" name="technologies[]" value="{{ $technology->id }}" class="hidden peer"
                                   @if($project->technologies->contains($technology->id)) checked @endif>
                            <div class="w-5 h-5 border-2 border-gray-400 rounded-md flex items-center justify-center peer-checked:bg-red-600 peer-checked:border-red-600 transition-all">
                                <svg class="w-4 h-4 text-white hidden peer-checked:block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <span class="ml-3 text-gray-800 font-semibold">{{ $technology->name }}</span>
                        </label>
                    @endforeach
                </div>
            </div>

            <!-- ✅ Opslaanknop hoort HIER! -->
            <div class="flex justify-between">
                <button type="submit" class="bg-green-600 text-white px-5 py-2 rounded-lg shadow-md hover:bg-green-700 transition">
                    Opslaan ✅
                </button>
            </div>
        </form>


        <form action="{{ route('projects.images.store', $project->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label class="block text-lg font-semibold text-gray-700">Voeg Foto's Toe</label>
            <input type="file" name="images[]" accept="image/*" multiple class="mt-2 p-3 w-full bg-white border-2 border-gray-300 rounded-lg">
            <button type="submit" class="mt-3 bg-indigo-600 text-white px-4 py-2 rounded-lg shadow hover:bg-indigo-700">
                Upload
            </button>
        </form>
        <!-- 🖼️ Afbeeldingen met delete knoppen -->
        <div class="mt-3 flex gap-3 flex-wrap">
            @foreach($project->images as $image)
                <div class="relative group">
                    <img src="{{ asset('storage/' . $image->path) }}" class="w-24 h-24 rounded-lg shadow-md border">
                    <form action="{{ route('projects.images.destroy', [$project->id, $image->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="absolute top-1 right-1 bg-red-600 text-white rounded-full p-1 opacity-0 group-hover:opacity-100 transition">
                            ❌
                        </button>
                    </form>
                </div>
            @endforeach
        </div>

        <!-- ☠️ PROJECT DELETE -->
        <form action="{{ route('projects.destroy', $project->id) }}" method="POST" onsubmit="return confirm('Weet je zeker dat je dit project wilt verwijderen?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="mt-6 bg-red-600 text-white px-5 py-2 rounded-lg shadow-md hover:bg-red-700 transition">
                Verwijderen 🗑️
            </button>
        </form>
    </div>
</x-app-layout>
