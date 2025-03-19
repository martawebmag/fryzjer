@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-5 text-center text-2xl">Lista usług</h2>

        <!-- Sprawdzanie komunikatów sukcesu -->
        @if (session('success'))
        <div class="bg-green-600 text-white p-2 rounded-lg mb-4">
            {{ session('success') }}
        </div>
        @endif

        <!-- Sprawdzanie komunikatów błędów -->
        @if (session('error'))
        <div class="bg-red-600 text-white p-2 rounded-lg mb-4">
            {{ session('error') }}
        </div>
        @endif

    <a href="{{ route('services.create') }}" class="bg-purple-950 text-white px-4 py-2 rounded-lg shadow-lg hover:bg-purple-700 transition duration-300">Dodaj usługę</a>

    <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden mt-6">
        <thead>
            <tr class="bg-gray-100 text-gray-600">
                <th class="py-3 px-6 text-left">Nazwa</th>
                <th class="py-3 px-6 text-left">Cena</th>
                <th class="py-3 px-6 text-left">Czas trwania (min)</th>
                <th class="py-3 px-6 text-center">Akcje</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($services as $service)
                <tr class="border-b hover:bg-gray-50">
                    <td class="py-3 px-6">{{ $service->name }}</td>
                    <td class="py-3 px-6">{{ $service->price }} zł</td>
                    <td class="py-3 px-6">{{ $service->duration }} min</td>
                    <td class="py-3 px-6 text-center">
                        <a href="{{ route('services.edit', $service->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600 text-sm">Edytuj</a>
                        <form action="{{ route('services.destroy', $service->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 text-sm" onclick="return confirm('Czy na pewno chcesz usunąć usługę?')">Usuń</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
</div>
@endsection
