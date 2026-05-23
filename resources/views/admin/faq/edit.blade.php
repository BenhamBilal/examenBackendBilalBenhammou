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
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
