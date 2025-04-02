<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Portfolio')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/7626928e56.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-gray-900 text-white">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-1/5 bg-black text-gray-200 flex flex-col justify-between p-6 border-r border-gray-700 relative">
            <div>
                <div href="index" class="absolute right-0 top-0 h-full w-[2px] bg-gradient-to-b from-purple-500 to-orange-500"></div>
                <a href="{{ route('index') }}" class="text-3xl font-bold tracking-wider">
                    MICHIEL KALTEREN
                </a>
                <p class="text-xl text-gray-400 mt-1">Software Developer</p>
            </div>

            <nav class="mt-10 space-y-6">
                <a href="{{ route('over') }}"class="block text-2xl font-semibold hover:text-white hover:bg-gray-800 p-2 rounded-lg transition">Over mij</a>
                <a href="{{ route('school') }}" class="block text-2xl font-semibold hover:text-white hover:bg-gray-800 p-2 rounded-lg transition">School</a>
                <a href="{{ route('contact') }}" class="block text-2xl font-semibold hover:text-white hover:bg-gray-800 p-2 rounded-lg transition">Contact</a>
            </nav>
            <footer class="text-sm text-gray-400 mt-6">
                <p class="tracking-wide flex space-x-4 justify-center">
                    <a href="contact"
                       class="fa-solid fa-envelope text-3xl hover:text-white transition"></a>
                    <a href="https://www.linkedin.com/in/michiel-kalteren-b15a36290/"
                       class="fa-brands fa-linkedin-in text-3xl hover:text-white transition"
                       target="_blank"
                       rel="noopener noreferrer"></a>
                    <a href="https://github.com/ItsMeMichaeluh"
                       class="fa-brands fa-github text-3xl hover:text-white transition"
                       target="_blank"
                       rel="noopener noreferrer"></a>
                </p>
            </footer>

        </aside>

        <!-- Main Content -->
        <main class="flex-1 flex items-center justify-center relative">
            @yield('content')
        </main>
    </div>
</body>
</html>
