@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-6 px-4">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Dodaj wizytę</h2>

    <form action="{{ route('appointments.store') }}" method="POST" class="space-y-4">
        @csrf
        
        <!-- Data wizyty -->
        <div>
            <label for="date" class="block text-gray-700 font-medium">Data wizyty</label>
            <input type="date" id="date" name="date" required 
                class="mt-2 p-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
            @error('date') 
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <!-- Godzina wizyty -->
        <div>
            <label for="time" class="block text-gray-700 font-medium">Godzina wizyty</label>
            <input type="time" id="time" name="time" required 
                class="mt-2 p-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
            @error('time') 
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <!-- Usługa -->
        <div>
            <label for="service_id" class="block text-gray-700 font-medium">Usługa</label>
            <select name="service_id" id="service_id" required 
                class="mt-2 p-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                @foreach ($services as $service)
                    <option value="{{ $service->id }}">{{ $service->name }} ({{ $service->price }} zł)</option>
                @endforeach
            </select>
            @error('service_id') 
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <!-- Przycisk zarezerwuj -->
        <div class="flex justify-end">
            <button type="submit" class="bg-indigo-600 text-white py-2 px-6 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">
                Zarezerwuj
            </button>
        </div>
    </form>
</div>

@endsection

