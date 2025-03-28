<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Portfolio')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/7626928e56.js" crossorigin="anonymous"></script>
</head>
<body class="bg-gray-900 text-white">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-1/5 bg-black text-gray-200 flex flex-col justify-between p-6 border-r border-gray-700 relative">
            <div>
                <div class="absolute right-0 top-0 h-full w-[2px] bg-gradient-to-b from-purple-500 to-orange-500"></div>
                <h1 class="text-2xl font-bold tracking-wider">MICHIEL KALTEREN</h1>
                <p class="text-sm text-gray-400 mt-1">Software Developer</p>
            </div>
            <nav class="mt-10 space-y-6">
                <a href="#" class="block text-lg font-semibold hover:text-white hover:bg-gray-800 p-2 rounded-lg transition">Over mij</a>
                <a href="#" class="block text-lg font-semibold hover:text-white hover:bg-gray-800 p-2 rounded-lg transition">School</a>
                <a href="#" class="block text-lg font-semibold hover:text-white hover:bg-gray-800 p-2 rounded-lg transition">Contact</a>
            </nav>
            <footer class="text-sm text-gray-400 mt-6">
                <p class="tracking-wide">
                    <i href="#" class="fa-solid fa-envelope cursor-pointer"></i> &bull;
                    <i href="#" class="fa-brands fa-linkedin-in cursor-pointer"></i> &bull;
                    <a href="https://github.com/ItsMeMichaeluh"
                      class="fa-brands fa-github cursor-pointer"
   target="_blank"
   rel="noopener noreferrer">
</a>

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
