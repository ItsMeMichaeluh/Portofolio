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

@section('title', 'About Me')

@section('content')

<body class="relative bg-gray-700">
    <!-- De achtergrond met class .el -->
    <div class="el"></div>

    <!-- Hoofdcontainer -->
    <div class="container mx-auto px-6">
        <!-- Header sectie -->
        <div class="mb-16">
            <h1 class="text-7xl font-bold text-white mb-6">About<span class="text-purple-500">.</span></h1>
            <div class="flex items-center">
                <div class="w-6 h-0.5 bg-white mr-3"></div>
                <span class="text-white text-xl">Een beetje over mij</span>
            </div>
        </div>

        <!-- Content grid -->
        <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-center">
            <!-- Linker sectie - afbeelding -->
            <div class="md:col-span-4 flex justify-center">
                <div class="w-72 h-72 md:w-80 md:h-80 rounded-2xl border overflow-hidden shadow-lg">
                    <img
                        class="w-full h-full object-cover"
                        src="{{ asset('storage/img/michiel.png') }}"
                        alt="Profielfoto"
                    >
                </div>
            </div>

            <!-- Rechter sectie - tekst -->
            <div class="md:col-span-8 space-y-6 text-white">
                <p class="text-lg">
                    Geboren en opgegroeid in Amsterdam, Nederland, was ik altijd gefascineerd door kunst en technologie. Al op jonge leeftijd ontwikkelde ik een passie voor fotografie, wat me door het hele land bracht op zoek naar de perfecte compositie en verlichting.
                </p>

                <p class="text-lg">
                    Toen het internet steeds meer een onderdeel van ons dagelijks leven werd, ontdekte ik mijn liefde voor webdesign en development. Na het maken van een website voor mijn fotoportfolio was ik verkocht. Hoewel ik nog steeds geniet van fotografie, heeft het me in een nieuwe richting geleid waar ik net zo gepassioneerd over ben.
                </p>

                <p class="text-lg">
                    Voor ik het wist, was ik van het ene project naar het andere aan het werken, en vond ik mezelf in een carrière die ik geweldig vind. Na mijn eerste grote opdracht kocht ik professionele apparatuur waarmee ik mijn design- en programmeervaardigheden kon combineren. Door de jaren heen van lokale projecten en het opbouwen van een netwerk in de creatieve industrie, heb ik verschillende webprojecten voltooid voor bedrijven en kunstenaars.
                </p>

                <p class="text-lg">
                    Tegenwoordig werk ik als freelancer en in vaste dienst bij verschillende bureaus, en blijf ik geïnspireerd en gemotiveerd door het voortdurend veranderende landschap van het web. Ik heb projecten mogen doen voor bekende merken en vele anderen in deze tijd.
                </p>
            </div>
        </div>
    </div>
</body>

</html>

@endsection
