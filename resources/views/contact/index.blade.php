<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contact') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('status'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">{{ session('status') }}</div>
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form method="POST" action="{{ route('contact.store') }}">
                        @csrf
                        <div>
                            <x-breeze.input-label for="name" :value="__('Naam')" />
                            <x-breeze.text-input id="name" name="name" type="text" class="mt-1 block w-full" required />
                            <x-breeze.input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>
                        <div class="mt-4">
                            <x-breeze.input-label for="email" :value="__('Email')" />
                            <x-breeze.text-input id="email" name="email" type="email" class="mt-1 block w-full" required />
                            <x-breeze.input-error class="mt-2" :messages="$errors->get('email')" />
                        </div>
                        <div class="mt-4">
                            <x-breeze.input-label for="message" :value="__('Bericht')" />
                            <textarea id="message" name="message" rows="5" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required></textarea>
                            <x-breeze.input-error class="mt-2" :messages="$errors->get('message')" />
                        </div>
                        <div class="mt-6">
                            <x-breeze.primary-button>{{ __('Verzenden') }}</x-breeze.primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
