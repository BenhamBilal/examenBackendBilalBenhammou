<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Recepten beheer') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('status'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                    {{ session('status') }}
                </div>
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <a href="{{ route('admin.recipes.create') }}" class="inline-block px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 mb-4">Nieuw recept</a>
                    <table class="w-full text-left">
                        <thead>
                        <tr class="border-b">
                            <th class="py-2">Titel</th>
                            <th class="py-2">Auteur</th>
                            <th class="py-2">Kooktijd</th>
                            <th class="py-2">Acties</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($recipes as $recipe)
                            <tr class="border-b">
                                <td class="py-2">{{ $recipe->title }}</td>
                                <td class="py-2">{{ $recipe->author->name ?? 'Onbekend' }}</td>
                                <td class="py-2">{{ $recipe->cooking_time ? $recipe->cooking_time . ' min' : '-' }}</td>
                                <td class="py-2">
                                    <a href="{{ route('admin.recipes.edit', $recipe) }}" class="text-blue-600 hover:underline">Bewerk</a>
                                    <form action="{{ route('admin.recipes.destroy', $recipe) }}" method="POST" class="inline" onsubmit="return confirm('Zeker weten?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline ml-2">Verwijder</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
