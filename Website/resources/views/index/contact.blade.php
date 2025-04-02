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

@section('title', 'Contact')

@section('content')
<body>
    <div class="el"></div>
        <div class="container mx-auto px-6 py-16">
            <h1 class="text-3xl font-bold text-white mb-6">Neem Contact Op</h1>
            <div class="bg-gray-800 p-8 rounded-lg shadow-lg">
                <form action="{{ route('contact.send') }}" method="POST">
                    @csrf
                    <div class="mb-6">
                        <label for="name" class="block text-lg font-semibold text-gray-300">Naam</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" class="mt-2 p-3 w-full bg-gray-900 text-white border-2 border-gray-300 rounded-lg focus:ring-4 focus:ring-indigo-500 transition-all shadow-lg @error('name') border-red-500 @enderror">
                        @error('name')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="email" class="block text-lg font-semibold text-gray-300">E-mail</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" class="mt-2 p-3 w-full bg-gray-900 text-white border-2 border-gray-300 rounded-lg focus:ring-4 focus:ring-indigo-500 transition-all shadow-lg @error('email') border-red-500 @enderror">
                        @error('email')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="message" class="block text-lg font-semibold text-gray-300">Bericht</label>
                        <textarea id="message" name="message" rows="4" class="mt-2 p-3 w-full bg-gray-900 text-white border-2 border-gray-300 rounded-lg focus:ring-4 focus:ring-indigo-500 transition-all shadow-lg @error('message') border-red-500 @enderror">{{ old('message') }}</textarea>
                        @error('message')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="bg-indigo-500 text-white py-2 px-6 rounded-lg hover:bg-indigo-700 transition-all">Verstuur Bericht</button>
                </form>
            </div>
        </div>
@endsection
</body
