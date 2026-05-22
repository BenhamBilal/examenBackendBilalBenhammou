<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Alle recepten') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($recipes as $recipe)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        @if ($recipe->image_path)
                            <img src="{{ asset('storage/' . $recipe->image_path) }}" alt="{{ $recipe->title }}" class="w-full h-48 object-cover">
                        @endif
                        <div class="p-6">
                            <h3 class="text-lg font-semibold">{{ $recipe->title }}</h3>
                            <p class="text-gray-600 text-sm mt-2">
                                Door {{ $recipe->author->name ?? 'Onbekend' }}
                            </p>
                            @if ($recipe->cooking_time)
                                <p class="text-gray-500 text-sm">⏱ {{ $recipe->cooking_time }} min</p>
                            @endif
                            <a href="{{ route('recipes.show', $recipe) }}" class="mt-4 inline-block text-blue-600 hover:underline">
                                Bekijk recept →
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
