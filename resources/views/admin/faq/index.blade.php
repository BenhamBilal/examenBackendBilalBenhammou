<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('FAQ Categorieën') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('status'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">{{ session('status') }}</div>
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <a href="{{ route('admin.faq-categories.create') }}" class="inline-block px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 mb-4">Nieuwe categorie</a>
                    <table class="w-full text-left">
                        <thead>
                        <tr class="border-b">
                            <th class="py-2">Naam</th>
                            <th class="py-2">Aantal vragen</th>
                            <th class="py-2">Acties</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($categories as $category)
                            <tr class="border-b">
                                <td class="py-2">{{ $category->name }}</td>
                                <td class="py-2">{{ $category->items->count() }}</td>
                                <td class="py-2">
                                    <a href="{{ route('admin.faq-categories.edit', $category) }}" class="text-blue-600 hover:underline">Bewerk</a>
                                    <form action="{{ route('admin.faq-categories.destroy', $category) }}" method="POST" class="inline" onsubmit="return confirm('Zeker weten?')">
                                        @csrf @method('DELETE')
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
