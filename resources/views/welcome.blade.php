<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'ReceptenHub') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="font-sans antialiased">
    <nav class="bg-white/90 backdrop-blur-sm border-b border-gray-200 fixed w-full z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <a href="/" class="text-2xl font-bold text-orange-600">🍳 ReceptenHub</a>
                <div class="flex items-center gap-4">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-gray-600 hover:text-orange-600 font-medium">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-gray-600 hover:text-orange-600 font-medium">Log in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 font-medium">Registreer</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <div class="relative h-[500px] flex items-center justify-center" style="background: linear-gradient(135deg, #ff7e5f, #feb47b);">
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="relative z-10 text-center text-white px-4">
            <h1 class="text-6xl font-bold mb-4 drop-shadow-lg">Welkom bij ReceptenHub</h1>
            <p class="text-xl mb-8 max-w-2xl mx-auto">Ontdek, deel en bewaar je favoriete recepten. Van voorgerechten tot desserts, vind inspiratie voor elke maaltijd.</p>
            <div class="flex justify-center gap-4">
                <a href="{{ route('recipes.index') }}" class="px-8 py-3 bg-white text-orange-600 rounded-full font-semibold hover:bg-orange-50 transition">Bekijk recepten</a>
                <a href="{{ route('faq.index') }}" class="px-8 py-3 bg-orange-700 text-white rounded-full font-semibold hover:bg-orange-800 transition">FAQ</a>
            </div>
        </div>
    </div>

    <div class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Wat bieden wij?</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition">
                    <img src="https://images.unsplash.com/photo-1555939594-58d7cb561ad1?w=600&h=400&fit=crop" alt="Recepten" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">🍽️ Recepten</h3>
                        <p class="text-gray-600">Blader door onze collectie recepten en vind iets lekkers om te koken.</p>
                        <a href="{{ route('recipes.index') }}" class="mt-4 inline-block text-orange-600 font-medium hover:underline">Ontdek meer →</a>
                    </div>
                </div>
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition">
                    <img src="https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?w=600&h=400&fit=crop" alt="FAQ" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">❓ FAQ</h3>
                        <p class="text-gray-600">Veelgestelde vragen over koken, ingrediënten en bereidingstechnieken.</p>
                        <a href="{{ route('faq.index') }}" class="mt-4 inline-block text-orange-600 font-medium hover:underline">Bekijk FAQ →</a>
                    </div>
                </div>
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition">
                    <img src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?w=600&h=400&fit=crop" alt="Contact" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">✉️ Contact</h3>
                        <p class="text-gray-600">Heb je een vraag of opmerking? Laat het ons weten via het contactformulier.</p>
                        <a href="{{ route('contact.index') }}" class="mt-4 inline-block text-orange-600 font-medium hover:underline">Neem contact op →</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-gray-800 text-white py-8 text-center">
        <p>&copy; {{ date('Y') }} ReceptenHub. Alle rechten voorbehouden.</p>
    </footer>
</body>
</html>
