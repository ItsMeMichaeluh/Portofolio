<x-app-layout>
    <x-slot name="header">
        <h2 class="text-white font-bold text-4xl leading-tight text-center bg-gradient-to-r from-red-500 via-yellow-500 to-red-500 py-4 rounded-lg shadow-lg uppercase animate-pulse">
            🔥 Nieuw Project Toevoegen 🔥
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-900 text-white overflow-hidden shadow-2xl rounded-3xl p-8">
                <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <!-- Titel -->
                    <div>
                        <label for="title" class="block text-2xl font-bold">Titel</label>
                        <input type="text" id="title" name="title" value="{{ old('title') }}" class="mt-2 p-4 w-full border-2 border-red-500 bg-gray-800 text-white rounded-lg shadow-lg focus:ring-4 focus:ring-yellow-500 focus:border-transparent" required>
                    </div>

                    <!-- Inleiding -->
                    <div>
                        <label for="introduction" class="block text-2xl font-bold">Introductie</label>
                        <textarea id="introduction" name="introduction" rows="3" class="mt-2 p-4 w-full border-2 border-yellow-500 bg-gray-800 text-white rounded-lg shadow-lg focus:ring-4 focus:ring-red-500  focus:border-transparent" required>{{ old('introduction') }}</textarea>
                    </div>

                    <!-- Hoofdtekst -->
                    <div>
                        <label for="body" class="block text-2xl font-bold">Beschrijving</label>
                        <textarea id="body" name="body" rows="5" class="mt-2 p-4 w-full border-2 border-red-500 bg-gray-800 text-white rounded-lg shadow-lg focus:ring-4 focus:ring-yellow-500  focus:border-transparent" required>{{ old('body') }}</textarea>
                    </div>

                    <!-- URL's -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="url" class="block text-2xl font-bold">Project URL</label>
                            <input type="url" id="url" name="url" value="{{ old('url') }}" class="mt-2 p-4 w-full border-2 border-yellow-500 bg-gray-800 text-white rounded-lg shadow-lg focus:ring-4 focus:ring-red-500  focus:border-transparent">
                        </div>
                        <div>
                            <label for="github" class="block text-2xl font-bold">GitHub URL</label>
                            <input type="url" id="github" name="github" value="{{ old('github') }}" class="mt-2 p-4 w-full border-2 border-red-500 bg-gray-800 text-white rounded-lg shadow-lg focus:ring-4 focus:ring-yellow-500  focus:border-transparent">
                        </div>
                    </div>

                    <!-- Thumbnail & Images -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="thumbnail" class="block text-2xl font-bold">Thumbnail</label>
                            <input type="file" id="thumbnail" name="thumbnail" accept="image/*" class="mt-2 p-4 w-full border-2 border-yellow-500 bg-gray-800 text-white rounded-lg shadow-lg focus:ring-4 focus:ring-red-500  focus:border-transparent">
                        </div>
                        <div>
                            <label for="images" class="block text-2xl font-bold">Voeg Foto's Toe</label>
                            <input type="file" id="images" name="images[]" accept="image/*" multiple class="mt-2 p-4 w-full border-2 border-red-500 bg-gray-800 text-white rounded-lg shadow-lg focus:ring-4 focus:ring-yellow-500  focus:border-transparent">
                        </div>
                    </div>

                    <!-- Featured -->
                    <div>
                        <label for="featured" class="block text-2xl font-bold">Is dit project uitgelicht?</label>
                        <select id="featured" name="featured" class="mt-2 p-4 w-full border-2 border-yellow-500 bg-gray-800 text-white rounded-lg shadow-lg focus:ring-4 focus:ring-red-500  focus:border-transparent">
                            <option value="1" {{ old('featured') == '1' ? 'selected' : '' }}>Ja</option>
                            <option value="0" {{ old('featured') == '0' ? 'selected' : '' }}>Nee</option>
                        </select>
                    </div>

                    <!-- Technologieën -->
                    <div class="mb-6">
                        <label class="block text-lg font-semibold text-gray-700">Kies Technologieën</label>
                        <div class="mt-2 grid grid-cols-2 md:grid-cols-3 gap-3">
                            @foreach($technologies as $technology)
                                <label class="flex items-center bg-white p-3 rounded-lg shadow-lg border-2 border-gray-300 cursor-pointer hover:border-indigo-500 transition-all">
                                    <input
                                        type="checkbox"
                                        name="technologies[]"
                                        value="{{ $technology->id }}"
                                        class="hidden peer"
                                        @if(isset($project) && $project->technologies->contains($technology->id)) checked @endif
                                    >
                                    <div class="w-5 h-5 border-2 border-gray-400 rounded-md flex items-center justify-center peer-checked:bg-indigo-600 peer-checked:border-indigo-600 transition-all">
                                        <svg class="w-4 h-4 text-white hidden peer-checked:block" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </div>
                                    <span class="ml-3 text-gray-800 font-semibold">{{ $technology->name }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>





                    <!-- Submit Button -->
                    <div class="mt-8 text-center">
                        <button type="submit" class="px-8 py-4 bg-gradient-to-r from-yellow-500 to-red-500 text-black font-bold text-2xl rounded-lg shadow-lg transform hover:scale-105 transition-all  focus:border-transparent">
                            🔥 Project Toevoegen 🔥
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
