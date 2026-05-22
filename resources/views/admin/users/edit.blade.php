<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gebruiker bewerken: ' . $user->name) }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form method="POST" action="{{ route('admin.users.update', $user) }}">
                        @csrf
                        @method('PUT')
                        <div>
                            <x-breeze.input-label for="name" :value="__('Naam')" />
                            <x-breeze.text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required />
                            <x-breeze.input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>
                        <div class="mt-4">
                            <x-breeze.input-label for="email" :value="__('Email')" />
                            <x-breeze.text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required />
                            <x-breeze.input-error class="mt-2" :messages="$errors->get('email')" />
                        </div>
                        <div class="mt-4">
                            <label class="inline-flex items-center">
                                <input type="checkbox" name="is_admin" value="1" class="rounded border-gray-300" {{ $user->is_admin ? 'checked' : '' }}>
                                <span class="ms-2 text-sm text-gray-600">{{ __('Admin') }}</span>
                            </label>
                        </div>
                        <div class="mt-6">
                            <x-breeze.primary-button>{{ __('Bijwerken') }}</x-breeze.primary-button>
                            <a href="{{ route('admin.users.index') }}" class="ml-4 text-sm text-gray-600 hover:underline">Annuleren</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
