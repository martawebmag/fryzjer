@extends('layouts.app')

@section('title', 'Lista wizyt')

@section('content')
        <div>
            <h1 class="text-3xl font-semibold mb-4">Lista wizyt</h1>
            <!-- Sprawdzanie komunikatów sukcesu -->
                @if (session('success'))
                <div class="bg-green-700 text-white p-2 rounded-lg mb-4">
                    {{ session('success') }}
                </div>
                @endif

                <!-- Sprawdzanie komunikatów błędów -->
                @if (session('error'))
                <div class="bg-red-600 text-white p-2 rounded-lg mb-4">
                    {{ session('error') }}
                </div>
                @endif

            <table class="min-w-full bg-white shadow-md rounded-md">
                <thead>
                    <tr class="border-b">        
                        <th class="py-2 px-4 text-left">L.p.</th>
                        <th class="py-2 px-4 text-left">Imię</th>
                        <th class="py-2 px-4 text-left">Data</th>
                        <th class="py-2 px-4 text-left">Godzina</th>
                        <th class="py-2 px-4 text-left">Usługa</th>
                        <th class="py-2 px-4 text-left">Czas trwania</th>
                        <th class="py-2 px-4 text-left">Akcje</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($appointments as $appointment)
                        <tr class="border-b hover:bg-gray-100">
                            <td class="py-2 px-4">{{ $appointment->id }}</td>
                            <td class="py-2 px-4">{{ $appointment->user->name }}</td>
                            <td class="py-2 px-4">{{ $appointment->date }}</td>
                            <td class="py-2 px-4">{{ $appointment->time }}</td>
                            <td class="py-2 px-4">{{ $appointment->service->name }}</td>
                            <td class="py-2 px-4">{{ $appointment->service->duration }} min</td>
                            <td class="py-2 px-4">
                                <a href="{{ route('appointments.edit', $appointment) }}" class="text-blue-600 hover:text-blue-900">Edytuj</a>
                                
                                <form action="{{ route('appointments.destroy', $appointment) }}" method="POST" class="inline-block ml-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Czy na pewno chcesz odwołać tę wizytę?');">
                                        Odwołaj
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


        <div class="mt-6">
            <a href="{{ route('appointments.create') }}" class="bg-purple-950 text-white px-4 py-2 rounded-lg shadow-lg hover:bg-purple-700 transition duration-300">
                <i class="fas fa-plus"></i> Dodaj wizytę
            </a>
        </div>
@endsection

