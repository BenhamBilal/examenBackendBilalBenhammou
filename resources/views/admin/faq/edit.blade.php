<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categorie bewerken: ' . $category->name) }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6">
                    <form method="POST" action="{{ route('admin.faq-categories.update', $category) }}">
                        @csrf @method('PUT')
                        <div>
                            <x-breeze.input-label for="name" :value="__('Naam')" />
                            <x-breeze.text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $category->name)" required />
                            <x-breeze.input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>
                        <div class="mt-6">
                            <x-breeze.primary-button>{{ __('Bijwerken') }}</x-breeze.primary-button>
                            <a href="{{ route('admin.faq-categories.index') }}" class="ml-4 text-sm text-gray-600 hover:underline">Annuleren</a>
                        </div>
                    </form>
                    <!-- Bestaande items -->
                    <div class="mt-8">
                        <h3 class="text-lg font-semibold mb-4">Vragen in deze categorie</h3>
                        @foreach ($category->items as $item)
                            <div class="border rounded p-4 mb-2 flex justify-between items-start">
                                <div>
                                    <p class="font-medium">{{ $item->question }}</p>
                                    <p class="text-gray-600 text-sm mt-1">{{ Str::limit($item->answer, 100) }}</p>
                                </div>
                                <div class="flex gap-2 ml-4">
                                    <a href="{{ route('admin.faq-items.edit', $item) }}" class="text-blue-600 hover:underline text-sm">Bewerk</a>
                                    <form action="{{ route('admin.faq-items.destroy', $item) }}" method="POST" class="inline" onsubmit="return confirm('Zeker weten?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline text-sm">Verwijder</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- Nieuwe vraag toevoegen -->
                    <div class="mt-8 p-4 bg-gray-50 rounded">
                        <h3 class="text-lg font-semibold mb-4">Nieuwe vraag toevoegen</h3>
                        <form method="POST" action="{{ route('admin.faq-items.store') }}">
                            @csrf
                            <input type="hidden" name="faq_category_id" value="{{ $category->id }}">
                            <div>
                                <x-breeze.input-label for="question" :value="__('Vraag')" />
                                <x-breeze.text-input id="question" name="question" type="text" class="mt-1 block w-full" required />
                            </div>
                            <div class="mt-4">
                                <x-breeze.input-label for="answer" :value="__('Antwoord')" />
                                <textarea id="answer" name="answer" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required></textarea>
                            </div>
                            <div class="mt-4">
                                <x-breeze.primary-button>{{ __('Toevoegen') }}</x-breeze.primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
