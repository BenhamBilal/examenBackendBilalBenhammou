<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $recipe->title }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    @if ($recipe->image_path)
                        <img src="{{ asset('storage/' . $recipe->image_path) }}" alt="{{ $recipe->title }}" class="w-full h-64 object-cover rounded mb-6">
                    @endif
                    <div class="flex gap-4 text-sm text-gray-500 mb-4">
                        <span>Door {{ $recipe->author->name ?? 'Onbekend' }}</span>
                        @if ($recipe->cooking_time)
                            <span>⏱ {{ $recipe->cooking_time }} min</span>
                        @endif
                        @if ($recipe->published_at)
                            <span>{{ $recipe->published_at->format('d-m-Y') }}</span>
                        @endif
                    </div>
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold mb-2">Ingrediënten</h3>
                        <p class="text-gray-700 whitespace-pre-line">{{ $recipe->ingredients }}</p>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold mb-2">Bereiding</h3>
                        <p class="text-gray-700 whitespace-pre-line">{{ $recipe->content }}</p>
                    </div>
                    <a href="{{ route('recipes.index') }}" class="mt-6 inline-block text-blue-600 hover:underline">
                        ← Terug naar overzicht
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
