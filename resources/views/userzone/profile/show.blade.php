<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $user->name }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if ($user->profile_photo_path)
                        <img src="{{ asset('storage/' . $user->profile_photo_path) }}" class="w-32 h-32 rounded-full object-cover mb-4">
                    @endif
                    <p><strong>Username:</strong> {{ $user->username ?? 'Geen username' }}</p>
                    @if ($user->birthday)
                        <p><strong>Verjaardag:</strong> {{ $user->birthday->format('d-m-Y') }}</p>
                    @endif
                    @if ($user->about_me)
                        <p><strong>Over mij:</strong></p>
                        <p>{{ $user->about_me }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
