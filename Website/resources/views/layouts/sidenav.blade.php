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
        <aside class="w-1/5 bg-black text-gray-200 flex flex-col justify-between p-6 border-r border-gray-700 fixed top-0 left-0 h-screen">
            <div class="bg-gray-900 text-white p-2">
                <!-- Gradient side bar -->
                <div class="absolute right-0 top-0 h-full w-[2px] bg-gradient-to-b from-purple-600 to-orange-500"></div>

                <!-- Name -->
            <a href="index">
                <h2 class="text-5xl font-extrabold tracking-wide text-center font-playfair">
                  <span class="bg-gradient-to-r from-purple-600 to-orange-500 bg-clip-text text-transparent transition-all duration-300 hover:tracking-wider">
                    MICHIEL
                  </span>
                  <span class="ml-2 text-transparent stroke-white stroke-[1.5px] hover:stroke-orange-500 transition-all duration-300">
                    KALTEREN
                  </span>
                </h2>
            </a>
                <!-- Subtitle -->
                <p class="text-gray-400 text-lg text-center mt-2 tracking-wide italic">Creative Developer</p>
              </div>


              <nav class="space-y-4 text-left">
                <a href="{{ route('over') }}"
                   class="block text-3xl font-extrabold font-playfair tracking-wide bg-clip-text text-transparent bg-gradient-to-r from-purple-600 to-orange-500 transition-all duration-300 hover:translate-x-3 hover:brightness-125">
                  Over mij
                </a>
                <a href="{{ route('school') }}"
                   class="block text-3xl font-extrabold font-playfair tracking-wide bg-clip-text text-transparent bg-gradient-to-r from-purple-600 to-orange-500 transition-all duration-300 hover:translate-x-3 hover:brightness-125">
                  School
                </a>
                <a href="{{ route('contact') }}"
                   class="block text-3xl font-extrabold font-playfair tracking-wide bg-clip-text text-transparent bg-gradient-to-r from-purple-600 to-orange-500 transition-all duration-300 hover:translate-x-3 hover:brightness-125">
                  Contact
                </a>
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
        <main class="flex-1 flex justify-center relative ml-[20%]">
            @yield('content')
        </main>
    </div>
</body>
</html>
