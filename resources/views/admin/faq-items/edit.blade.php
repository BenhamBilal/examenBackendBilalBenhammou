<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Vraag bewerken') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form method="POST" action="{{ route('admin.faq-items.update', $item) }}">
                        @csrf @method('PUT')
                        <div>
                            <x-breeze.input-label for="question" :value="__('Vraag')" />
                            <x-breeze.text-input id="question" name="question" type="text" class="mt-1 block w-full" :value="old('question', $item->question)" required />
                            <x-breeze.input-error class="mt-2" :messages="$errors->get('question')" />
                        </div>
                        <div class="mt-4">
                            <x-breeze.input-label for="answer" :value="__('Antwoord')" />
                            <textarea id="answer" name="answer" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>{{ old('answer', $item->answer) }}</textarea>
                            <x-breeze.input-error class="mt-2" :messages="$errors->get('answer')" />
                        </div>
                        <div class="mt-6">
                            <x-breeze.primary-button>{{ __('Bijwerken') }}</x-breeze.primary-button>
                            <a href="{{ route('admin.faq-categories.edit', $item->faq_category_id) }}" class="ml-4 text-sm text-gray-600 hover:underline">Annuleren</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
