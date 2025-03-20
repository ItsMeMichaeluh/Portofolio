<x-app-layout>
    <x-slot name="header">
        <h2 class="text-white font-semibold text-3xl text-gray-900 leading-tight">
            {{ __('Nieuw Project Toevoegen') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg p-6">
                <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Titel -->
                    <div class="mb-6">
                        <label for="title" class="block text-lg font-semibold text-gray-700">Titel</label>
                        <input type="text" id="title" name="title" value="{{ old('title') }}" class="mt-2 p-3 w-full border border-gray-300 rounded-md shadow-md focus:outline-none focus:ring-2 focus:ring-indigo-600" required>
                        @error('title')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Inleiding -->
                    <div class="mb-6">
                        <label for="introduction" class="block text-lg font-semibold text-gray-700">Introductie</label>
                        <textarea id="introduction" name="introduction" rows="4" class="mt-2 p-3 w-full border border-gray-300 rounded-md shadow-md focus:outline-none focus:ring-2 focus:ring-indigo-600" required>{{ old('introduction') }}</textarea>
                        @error('introduction')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Hoofdtekst -->
                    <div class="mb-6">
                        <label for="body" class="block text-lg font-semibold text-gray-700">Beschrijving</label>
                        <textarea id="body" name="body" rows="6" class="mt-2 p-3 w-full border border-gray-300 rounded-md shadow-md focus:outline-none focus:ring-2 focus:ring-indigo-600" required>{{ old('body') }}</textarea>
                        @error('body')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- URL -->
                    <div class="mb-6">
                        <label for="url" class="block text-lg font-semibold text-gray-700">Project URL</label>
                        <input type="url" id="url" name="url" value="{{ old('url') }}" class="mt-2 p-3 w-full border border-gray-300 rounded-md shadow-md focus:outline-none focus:ring-2 focus:ring-indigo-600">
                        @error('url')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- GitHub URL -->
                    <div class="mb-6">
                        <label for="github" class="block text-lg font-semibold text-gray-700">GitHub URL</label>
                        <input type="url" id="github" name="github" value="{{ old('github') }}" class="mt-2 p-3 w-full border border-gray-300 rounded-md shadow-md focus:outline-none focus:ring-2 focus:ring-indigo-600">
                        @error('github')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="images" class="block text-lg font-semibold text-gray-700">Voeg Foto's Toe</label>
                            <input type="file" id="images" name="images[]" accept="image/*" multiple class="mt-2 p-3 w-full bg-white text-gray-800 border-2 border-gray-300 rounded-lg focus:ring-4 focus:ring-indigo-500 transition-all shadow-lg">
                            @error('images')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        
                    <!-- Thumbnail -->
                    <div class="mb-6">
                        <label for="thumbnail" class="block text-lg font-semibold text-gray-700">Thumbnail</label>
                        <input type="file" id="thumbnail" name="thumbnail" accept="image/*" class="mt-2 p-3 w-full border border-gray-300 rounded-md shadow-md focus:outline-none focus:ring-2 focus:ring-indigo-600">
                        @error('thumbnail')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Featured -->
                    <div class="mb-6">
                        <label for="featured" class="block text-lg font-semibold text-gray-700">Is dit project uitgelicht?</label>
                        <select id="featured" name="featured" class="mt-2 p-3 w-full border border-gray-300 rounded-md shadow-md focus:outline-none focus:ring-2 focus:ring-indigo-600">
                            <option value="1" {{ old('featured') == '1' ? 'selected' : '' }}>Ja</option>
                            <option value="0" {{ old('featured') == '0' ? 'selected' : '' }}>Nee</option>
                        </select>
                        @error('featured')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Technologieën -->
                    <div class="mb-6">
                        <label for="technologies" class="block text-lg font-semibold text-gray-700">Technologieën</label>
                        <select id="technologies" name="technologies[]" multiple class="mt-2 p-3 w-full border border-gray-300 rounded-md shadow-md focus:outline-none focus:ring-2 focus:ring-indigo-600">
                            {{-- Voeg hier je technologieën toe, bijvoorbeeld uit een array --}}
                        </select>
                        @error('technologies')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Foto's toevoegen -->

                    <!-- Submit Button -->
                    <div class="text-white mt-6">
                        <button type="submit" class="text-white px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Project Toevoegen</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
