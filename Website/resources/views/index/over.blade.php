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
<body class="bg-gray-900 text-white">
    <div class="el flex h-screen">


        <!-- Main Content -->
        <main class="flex-1 flex items-center justify-center relative">
            <div class="text-center">
                <h2 class="text-6xl font-bold">Hello!</h2>
                <p class="mt-4 text-lg text-gray-300 max-w-lg mx-auto">
                    I'm a freelance Creative Developer, currently creating cutting-edge digital experiences
                    with the fantastic team at <a href="#" class="text-white font-semibold">Mighty</a>.
                </p>
                <a href="#" class="mt-6 inline-block px-6 py-3 bg-white text-black font-semibold rounded-lg shadow-md hover:bg-gray-300 transition">
                    View Work →
                </a>
            </div>

            <!-- Background Animation Placeholder -->
            <div class="absolute inset-0 bg-cover bg-center opacity-10">
                <!-- Hier zou je een SVG of animatie kunnen plaatsen -->
            </div>
        </main>
    </div>
</body>
</html>

@endsection
