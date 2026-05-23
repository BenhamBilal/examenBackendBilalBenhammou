<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Recept bewerken: ' . $recipe->title) }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form method="POST" action="{{ route('admin.recipes.update', $recipe) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div>
                            <x-breeze.input-label for="title" :value="__('Titel')" />
                            <x-breeze.text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title', $recipe->title)" required />
                            <x-breeze.input-error class="mt-2" :messages="$errors->get('title')" />
                        </div>
                        <div class="mt-4">
                            <x-breeze.input-label for="ingredients" :value="__('Ingrediënten')" />
                            <textarea id="ingredients" name="ingredients" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>{{ old('ingredients', $recipe->ingredients) }}</textarea>
                            <x-breeze.input-error class="mt-2" :messages="$errors->get('ingredients')" />
                        </div>
                        <div class="mt-4">
                            <x-breeze.input-label for="content" :value="__('Bereiding')" />
                            <textarea id="content" name="content" rows="6" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>{{ old('content', $recipe->content) }}</textarea>
                            <x-breeze.input-error class="mt-2" :messages="$errors->get('content')" />
                        </div>
                        <div class="mt-4">
                            <x-breeze.input-label for="cooking_time" :value="__('Bereidingstijd (minuten)')" />
                            <x-breeze.text-input id="cooking_time" name="cooking_time" type="number" class="mt-1 block w-full" :value="old('cooking_time', $recipe->cooking_time)" />
                            <x-breeze.input-error class="mt-2" :messages="$errors->get('cooking_time')" />
                        </div>
                        <div class="mt-4">
                            <x-breeze.input-label for="image" :value="__('Afbeelding')" />
                            <input id="image" name="image" type="file" class="mt-1 block w-full">
                            <x-breeze.input-error class="mt-2" :messages="$errors->get('image')" />
                        </div>
                        <div class="mt-6">
                            <x-breeze.primary-button>{{ __('Bijwerken') }}</x-breeze.primary-button>
                            <a href="{{ route('admin.recipes.index') }}" class="ml-4 text-sm text-gray-600 hover:underline">Annuleren</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
