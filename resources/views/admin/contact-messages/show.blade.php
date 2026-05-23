<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bericht van ' . $message->name) }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <p><strong>Naam:</strong> {{ $message->name }}</p>
                    <p><strong>Email:</strong> {{ $message->email }}</p>
                    <p><strong>Datum:</strong> {{ $message->created_at->format('d-m-Y H:i') }}</p>
                    <p><strong>Status:</strong> {{ $message->is_read ? 'Gelezen' : 'Nieuw' }}</p>
                    <hr class="my-4">
                    <p><strong>Bericht:</strong></p>
                    <p class="mt-2">{{ $message->message }}</p>
                    <a href="{{ route('admin.contact-messages.index') }}" class="mt-6 inline-block text-blue-600 hover:underline">← Terug</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
