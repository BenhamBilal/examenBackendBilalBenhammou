<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contactberichten') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('status'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">{{ session('status') }}</div>
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <table class="w-full text-left">
                        <thead>
                        <tr class="border-b">
                            <th class="py-2">Naam</th>
                            <th class="py-2">Email</th>
                            <th class="py-2">Status</th>
                            <th class="py-2">Datum</th>
                            <th class="py-2">Acties</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($messages as $msg)
                            <tr class="border-b">
                                <td class="py-2">{{ $msg->name }}</td>
                                <td class="py-2">{{ $msg->email }}</td>
                                <td class="py-2">{{ $msg->is_read ? 'Gelezen' : 'Nieuw' }}</td>
                                <td class="py-2">{{ $msg->created_at->format('d-m-Y H:i') }}</td>
                                <td class="py-2">
                                    <a href="{{ route('admin.contact-messages.show', $msg) }}" class="text-blue-600 hover:underline">Bekijk</a>
                                    <form action="{{ route('admin.contact-messages.destroy', $msg) }}" method="POST" class="inline" onsubmit="return confirm('Zeker weten?')">
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
